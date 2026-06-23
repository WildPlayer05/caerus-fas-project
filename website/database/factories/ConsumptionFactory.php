<?php
namespace Database\Factories;

use App\Models\Consumption;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsumptionFactory extends Factory
{
    protected $model = Consumption::class;

    public function definition(): array
    {
        return [
            'idB' => 32, // oppure Building::factory()
            'date' => $this->faker->date(),
            'KW' => $this->faker->randomFloat(2, 10, 500),
            'mc' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}