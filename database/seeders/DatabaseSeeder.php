<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Loan;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Database\Factories\UserFactory; // Agrega esta línea

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class
        ]);

        User::factory(10)
        ->has(Loan::factory()->count(3))
        ->has(
            Account::factory()
            ->count(3)
            ->has(Transaction::factory()->count(3))
            )
        
        ->create();
        

        User::factory()
            ->withPersonalTeam()
            ->create([
                'name'=> 'Test User',
                'email'=>'test@example.com'
            ]);


        
    }
}
