<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
class RolesPermission extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //
        // Define Permissions
        $permissions = ['manage users', 'manage roles', 'manage jobs', 'create job posts', 'edit own job posts', 'delete own job posts', 'view applications', 'send messages', 'moderate content', 'view premium content'];

        // Duyệt và tạo từng permission
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'api']);
        }

        // $adminRole = Role::firstOrCreate(['name' => 'Admin'], ['guard_name' => 'api']);
        // $userRole = Role::firstOrCreate(['name' => 'User'],);
        // $adminRole->syncPermissions($permissions);
        // $admin = User::where('email', 'admin@gmail.com')->first();
        // if ($admin) {
        //     $admin->assignRole($adminRole);
        // }
        // $user = User::where('email', 'user@gmail.com')->first();
        // if ($user) {
        //     $user->assignRole($userRole);
        // }

         // Define Roles and assign Permissions
         $roles = [
            'Admin' => [
                'manage users',
                'manage roles',
                'manage jobs',
                'moderate content',
            ],
            'Recruiter' => [
                'create job posts',
                'edit own job posts',
                'delete own job posts',
                'view applications',
                'send messages',
            ],
            'Job Seeker' => [
                'view applications',
                'send messages',
            ],
            'Moderator' => [
                'moderate content',
            ],
            'Premium Member' => [
                'view premium content',
                'send messages',
            ],
            'Guest' => [],
        ];


        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'api']);
            $role->syncPermissions($rolePermissions);
        }
    }
}
