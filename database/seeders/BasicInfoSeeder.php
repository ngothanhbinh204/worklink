<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\BasicInfo;

class BasicInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Lặp qua từng người dùng và tạo thông tin cơ bản tương ứng
         User::all()->each(function ($user) {
            BasicInfo::factory()->create([
                'user_id' => $user->id,
                'first_name' => fake()->firstName(),
                'last_name' => fake()->lastName(),
                'bio' => fake()->sentence(),
            ]);
        });
    }
}