<?php

namespace Database\Seeders;

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

        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()
            ->withPersonalTeam()
            ->create([
                'name'=> 'Test User',
                'email'=>'test@example.com'
            ]);
    }
}
