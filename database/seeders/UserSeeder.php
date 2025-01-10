<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Role;
use App\Models\Connection;
class UserConnectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create roles
        $roles = ['super-admin', 'admin', 'content-creator', 'moderator', 'recruiter', 'user'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Create users and assign roles
        User::factory()->count(6)->create()->each(function ($user, $index) use ($roles) {
            $user->assignRole($roles[$index % count($roles)]);

            // Add email prefix based on role
            $roleName = $roles[$index % count($roles)];
            $user->email = $roleName . '@gmail.com';
            $user->save();
        });
    }
}
