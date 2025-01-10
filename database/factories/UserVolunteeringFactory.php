<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserVolunteering>
 */
class UserVolunteeringFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'organization_name' => $this->faker->company,
            'role' => $this->faker->jobTitle,
            'location' => $this->faker->city(),
            'start_date' => $this->faker->dateTimeBetween('-5 year', 'now')->format('Y-m-d'),
            'end_date' => $this->faker->dateTimeBetween('now', '+5 year')->format('Y-m-d'),
            'description' => $this->faker->paragraph,
        ];
    }
}