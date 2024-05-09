<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create()->id,
            'balance' => $this->faker->randomFloat(2, 5000, 10000),
            'account_type' => $this->faker->randomElement(['HSBC', 'Banamex', 'Bancomer', 'Santander']),              
        ];
    }
}
