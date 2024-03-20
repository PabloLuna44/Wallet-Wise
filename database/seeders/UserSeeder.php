<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Juan Pablo',
            'email' => 'juan@gmail.com',
            'password' => '123456789',
        ]);

        User::create([
            'name' => 'Alan',
            'email' => 'alan@gmail.com',
            'password' => '123456789',
        ]);

        // User::factory()
        //     ->count(50)
        //     ->create();
    }
}
