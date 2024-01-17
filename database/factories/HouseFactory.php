<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\House>
 */
class HouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'price' => fake()->randomFloat(2,10000,200000),
            'bedrooms' => fake()->numberBetween(1,6),
            'bathrooms' => fake()->numberBetween(1,3),
            'storeys' => fake()->numberBetween(1,3),
            'garages' => fake()->numberBetween(1,3),
        ];
    }
}
