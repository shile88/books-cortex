<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->colorName(),
            'page_count' => fake()->numberBetween(50,150),
            'year' => fake()->numberBetween(1950, 2023),
            'letter_id'=>fake()->numberBetween(1,3),
            'language_id' =>fake()->numberBetween(1,4),
            'binding_id' =>fake()->numberBetween(1,2),
            'format_id' =>fake()->numberBetween(1,3),
            'publisher_id' =>fake()->numberBetween(1,3),
        ];
    }
}
