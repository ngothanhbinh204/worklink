<?php

namespace Database\Factories;
use App\Models\Connection;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Connection>
 */
class ConnectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Connection::class;
    public function definition(): array
    {
        return [
            'sender_id' => User::factory(),
            'receiver_id' => User::factory(),
            'status' => $this->faker->randomElement(['pending', 'accepted', 'rejected']), // trạng thái
            'connection_type_id' => $this->faker->numberBetween(1, 3), // loại kết nối
            'message' => $this->faker->text(100), // tin nhắn
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}