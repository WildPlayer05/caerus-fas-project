<?php

namespace Database\Factories;

use App\Models\Building;
use Illuminate\Database\Eloquent\Factories\Factory;

class BuildingFactory extends Factory
{
    protected $model = Building::class;

    public function definition(): array
    {
        return [
            'city' => $this->faker->city(),
            'CAP' => $this->faker->numerify('#####'),
            'street' => $this->faker->streetName(),
            'civicNumber' => $this->faker->buildingNumber(),
            'idU' => 32, // puoi cambiarlo o collegarlo a User::factory()
            'nEmployees' => $this->faker->numberBetween(1, 200),
            'surface' => $this->faker->randomFloat(2, 50, 5000),
        ];
    }
}
