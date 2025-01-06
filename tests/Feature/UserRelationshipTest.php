<?php

namespace Tests\Feature;

use App\Models\Connection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserRelationshipTest extends TestCase
{


    public function test_user_has_sent_connections() {
        // Tạo một user mới
        $user = User::factory()->create();

        $connections = Connection::factory()->create([
            'sender_id' => $user->id,
        ]);
        $this->assertTrue($user->sentConnections->contains($connections));
    }
}