<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserPublication>
 */
class UserPublicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'publisher' => $this->faker->company,
            'publication_date' => $this->faker->date(),
            'description' => $this->faker->paragraph,
            'link' => $this->faker->url,
        ];
    }
}