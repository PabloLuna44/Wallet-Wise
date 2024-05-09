<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'amount' => $this->faker->randomFloat(2, 100, 5000),
            'date_time' => $this->faker->date(),
            'transaction_type' => $this->faker->randomElement(['Depósito','Retiro','Transferencia','Pago']),
            'account_id' => Account::factory()->create()->id,
        ];
    }
}
