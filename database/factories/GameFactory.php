<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->text(25),
            'cover_art' => '',
            'developer' => fake()->text(25),
            'release_year' => rand(2000,2024),
            'genre' => fake()->text(25),
        ];
    }
}
