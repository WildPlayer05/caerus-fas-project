<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    protected $model = Supplier::class;

    public function definition(): array
    {
        return [
            'ragSoc' => $this->faker->company(),
            'email' => $this->faker->unique()->companyEmail(),

            // meglio hashata
            'password' => bcrypt('password'),

            'IBAN' => $this->faker->iban(),

            'authorized' => $this->faker->boolean(),
        ];
    }
}