<?php

namespace Database\Seeders;

use FTP\Connection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Connection as UserConnection;

class ConnectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserConnection::factory()->count(10)->create();
    }
}