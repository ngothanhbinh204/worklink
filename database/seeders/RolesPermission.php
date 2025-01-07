<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesPermission extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // Tạo Permissions
        Permission::create(['name' => 'create_post', 'guard_name' => 'api']);
        Permission::create(['name' => 'comment', 'guard_name' => 'api']);
        Permission::create(['name' => 'like_post', 'guard_name' => 'api']);
        Permission::create(['name' => 'apply_for_job', 'guard_name' => 'api']);
        Permission::create(['name' => 'create_job_post', 'guard_name' => 'api']);
        Permission::create(['name' => 'view_applicants', 'guard_name' => 'api']);
        Permission::create(['name' => 'manage_users', 'guard_name' => 'api']);
        Permission::create(['name' => 'manage_roles', 'guard_name' => 'api']);

        // Tạo Roles
        Role::create(['name' => 'admin', 'guard_name' => 'api']);
        Role::create(['name' => 'recruiter', 'guard_name' => 'api']);
        Role::create(['name' => 'job_seeker', 'guard_name' => 'api']);
        Role::create(['name' => 'basic_user', 'guard_name' => 'api']);

        // Gán Permissions cho Roles
        // Admin

        $adminRole = Role::findByName('admin', 'api');
        $recuitRole = Role::findByName('recruiter', 'api');
        $jobSeekerRole = Role::findByName('job_seeker', 'api');
        $basicUserRole = Role::findByName('basic_user', 'api');

        // Gán quyền
        $adminRole->givePermissionTo([
            'manage_users', 'manage_roles', 'create_job_post', 'view_applicants'
        ]);

        $recuitRole->givePermissionTo([
            'create_job_post', 'view_applicants'
        ]);

        $jobSeekerRole->givePermissionTo([
             'create_post', 'comment', 'like_post','apply_for_job'
        ]);

        $basicUserRole->givePermissionTo([
            'create_post', 'comment', 'like_post'
        ]);
    }
}
