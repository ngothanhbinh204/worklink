<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Connection;
class UserConnectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // Tạo 2 người dùng với thông tin cơ bản
        $user1 = User::factory()->create();
        $user1->basicInfo()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
        ]);

        $user2 = User::factory()->create();
        $user2->basicInfo()->create([
            'first_name' => 'Jane',
            'last_name' => 'Smith',
        ]);

        // Create connection between user1 and user2

        Connection::create([
            'sender_id' => $user1->id,
            'receiver_id' => $user2->id,
            'connection_type_id' => 1,
        ]);

        $connection = Connection::first();

        // In ra thông tin để kiểm tra
        $connection = Connection::first();
        echo "Sender: " . ($connection->sender->basicInfo?->first_name ?? 'N/A') . " " . ($connection->sender->basicInfo?->last_name ?? 'N/A') . "\n";
        echo "Receiver: " . ($connection->receiver->basicInfo?->first_name ?? 'N/A') . " " . ($connection->receiver->basicInfo?->last_name ?? 'N/A') . "\n";
    }
}
