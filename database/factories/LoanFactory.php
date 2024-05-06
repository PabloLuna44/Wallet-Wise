<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //'amount', 'interestRate', 'status', 'paymentDate'
        return [
            'amount' => $this->faker->randomFloat(2, 100, 10000),
            'interest_rate' => $this->faker->randomFloat(2, 1, 10),
            'status' => $this->faker->randomElement(['Pendiente', 'Pagada', 'Vencido']),
            'payment_date' => $this->faker->date(),
        ];
    }
}
