<?php

namespace App\Actions\Fortify;

use App\Models\User;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;


    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */

    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'profile_photo_path' => ['sometimes', 'image'],
        ])->validate();


        


        $imagePath = null;

        if (isset($input['profile_photo_path'])){
            $filePath = $input['profile_photo_path'];
            $fileHash = hash_file('sha256', $filePath->getRealPath());
            $fileExtension = $filePath->getClientOriginalExtension();
            $fileName = $fileHash . '.' . $fileExtension;
            $imagePath = $filePath->storeAs('profile-photos', $fileName, 'public');
        }



        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'profile_photo_path' => $imagePath,
        ]);
    }
}
