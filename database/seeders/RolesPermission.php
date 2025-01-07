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
        //
        // Tạo danh sách permissions
        $permissions = [
            'view_users', 'create_user', 'update_user', 'delete_user',
            'ban_user', 'unban_user',
            'view_user_profile', 'edit_user_profile', 'verify_user',
            'assign_roles', 'remove_roles', 'view_roles',
            'view_posts', 'delete_user_post', 'approve_user_post', 'flag_user_post',
            'view_user_activity', 'delete_user_comment', 'ban_user_interaction'
        ];

        // Duyệt và tạo từng permission
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'api']);
        }

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);
        // Gán quyền cho vai trò admin
        $adminRole->syncPermissions($permissions);
        // Tạo tài khoản admin mẫu
        $admin = User::where('email', 'admin@gmail.com')->first();
        if ($admin) {
            $admin->assignRole($adminRole);
        }

        // Tạo user

        $user = User::where('email', 'user@gmail.com')->first();
        if ($user) {
            $user->assignRole($userRole);
        }
    }
}
