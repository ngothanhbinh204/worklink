<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\BasicInfo;
use App\Models\ContactInfo;
class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // ----- Permissions -----
        // NOTE: Chú thích rõ ràng để dễ hiểu và tùy chỉnh
        // Chú thích chung:
        // - prefix: tên chức năng (ví dụ: profile, post, skill)
        // - action: hành động (ví dụ: create, view, update, delete)

        $permissions = []; // Initialize an empty array for storing permissions

        // User Permissions
        $permissions = array_merge($permissions, ['user_create', 'user_view', 'user_update', 'user_delete', 'user_list', 'user_manage_roles']);

        // Profile Permissions
        $permissions = array_merge($permissions, ['profile_create', 'profile_view', 'profile_update', 'profile_delete', 'profile_list', 'profile_manage_privacy']);

        // Connection Permissions
        $permissions = array_merge($permissions, ['connection_send_invite', 'connection_accept_invite', 'connection_remove', 'connection_list']);

        // Follow Permissions
        $permissions = array_merge($permissions, ['follow_user', 'unfollow_user', 'list_followers']);

        // Post Permissions
        $permissions = array_merge($permissions, ['post_create', 'post_view', 'post_update', 'post_delete', 'post_list', 'post_comment', 'post_like', 'post_share']);

        // Skill Permissions
        $permissions = array_merge($permissions, ['skill_add', 'skill_view', 'skill_edit', 'skill_remove', 'skill_list']);

        // Message Permissions
        $permissions = array_merge($permissions, ['message_send', 'message_view', 'message_reply', 'message_delete']);

        //  Permissions cho các trang trong welink
        $permissions = array_merge($permissions, ['welink_page_create', 'welink_page_view', 'welink_page_update', 'welink_page_delete', 'welink_page_list', 'welink_page_manage_content', 'welink_page_view_analytics']);

        // Permissions cho các nhóm trong welink
        $permissions = array_merge($permissions, ['welink_group_create', 'welink_group_view', 'welink_group_update', 'welink_group_delete', 'welink_group_list', 'welink_group_manage_member', 'welink_group_manage_content']);

        // General Permissions
        $permissions = array_merge($permissions, ['settings_manage', 'report_view', 'dashboard_view']);

        // Create permissions
        foreach ($permissions as $permission) {
            $existingPermission = Permission::where('name', $permission)->where('guard_name', 'api')->first();

            if ($existingPermission) {
                $this->command->info('Permission ' . $permission . ' đã tồn tại');
            }

            Permission::create(['name' => $permission, 'guard_name' => 'api']);
        }

        // ----- Roles -----
        // Chú thích chung:
        // - Các role sẽ có những quyền hạn khác nhau

        // Super Admin Role
        $superAdminRole = Role::create(['name' => 'super-admin', 'guard_name' => 'api']);
        $superAdminRole->givePermissionTo(Permission::all()); // All permissions

        // Admin Role
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'api']);
        $adminRole->givePermissionTo(['profile_view', 'profile_update', 'profile_list', 'profile_manage_privacy', 'post_create', 'post_view', 'post_update', 'post_delete', 'post_list', 'post_comment', 'post_like', 'post_share', 'skill_add', 'skill_view', 'skill_edit', 'skill_remove', 'skill_list', 'connection_send_invite', 'connection_accept_invite', 'connection_remove', 'connection_list', 'follow_user', 'unfollow_user', 'list_followers', 'welink_page_create', 'welink_page_view', 'welink_page_update', 'welink_page_delete', 'welink_page_list', 'welink_page_manage_content', 'welink_page_view_analytics', 'welink_group_create', 'welink_group_view', 'welink_group_update', 'welink_group_delete', 'welink_group_list', 'welink_group_manage_member', 'welink_group_manage_content', 'message_send', 'message_view', 'message_reply', 'message_delete', 'settings_manage', 'report_view', 'dashboard_view', 'user_view', 'user_update', 'user_list', 'user_manage_roles']);

        // Content Creator Role (tương tự editor nhưng tập trung vào bài đăng)
        $contentCreatorRole = Role::create(['name' => 'content-creator', 'guard_name' => 'api']);
        $contentCreatorRole->givePermissionTo(['profile_view', 'post_create', 'post_view', 'post_update', 'post_list', 'post_comment', 'post_like', 'post_share', 'skill_view', 'welink_page_view', 'welink_page_list', 'welink_page_manage_content', 'welink_group_view', 'welink_group_list', 'welink_group_manage_content']);

        // Moderator Role (tương tự moderator nhưng tập trung vào bài đăng,group)
        $moderatorRole = Role::create(['name' => 'moderator', 'guard_name' => 'api']);
        $moderatorRole->givePermissionTo(['post_view', 'post_update', 'post_list', 'post_comment', 'skill_view', 'welink_page_view', 'welink_page_list', 'welink_page_manage_content', 'welink_group_view', 'welink_group_list', 'welink_group_manage_content', 'welink_group_manage_member']);

        // Recruiter Role
        $recruiterRole = Role::create(['name' => 'recruiter', 'guard_name' => 'api']);
        $recruiterRole->givePermissionTo(['profile_view', 'profile_list']);

        // Basic User Role
        $basicUserRole = Role::create(['name' => 'user', 'guard_name' => 'api']);
        $basicUserRole->givePermissionTo(['profile_view', 'profile_update', 'post_view', 'post_list', 'skill_view', 'connection_send_invite', 'connection_accept_invite', 'connection_list', 'follow_user', 'message_send', 'message_view', 'message_reply', 'dashboard_view']);

        // ----- Create Users -----

        // Super Admin User
        $superAdminUser = User::create([
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $superAdminUser->assignRole($superAdminRole);
        BasicInfo::factory()->create(['user_id' => $superAdminUser->id]);
        ContactInfo::factory()->create(['user_id' => $superAdminUser->id]);
        // Admin User
        $adminUser = User::create([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $adminUser->assignRole($adminRole);
        BasicInfo::factory()->create(['user_id' => $adminUser->id]);
        ContactInfo::factory()->create(['user_id' => $adminUser->id]);

        // Content Creator User
        $contentCreatorUser = User::create([
            'email' => 'contentcreator@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $contentCreatorUser->assignRole($contentCreatorRole);
        BasicInfo::factory()->create(['user_id' => $contentCreatorUser->id]);
        ContactInfo::factory()->create(['user_id' => $contentCreatorUser->id]);

        // Moderator User
        $moderatorUser = User::create([
            'email' => 'moderator@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $moderatorUser->assignRole($moderatorRole);
        BasicInfo::factory()->create(['user_id' => $moderatorUser->id]);
        ContactInfo::factory()->create(['user_id' => $moderatorUser->id]);

        // Recruiter User
        $recruiterUser = User::create([
            'email' => 'recruiter@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $recruiterUser->assignRole($recruiterRole);
        BasicInfo::factory()->create(['user_id' => $recruiterUser->id]);
        ContactInfo::factory()->create(['user_id' => $recruiterUser->id]);
        // Basic User
        $basicUser = User::create([
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $basicUser->assignRole($basicUserRole);
        BasicInfo::factory()->create(['user_id' => $basicUser->id]);
        ContactInfo::factory()->create(['user_id' => $basicUser->id]);

        $this->command->info('Roles and Permissions seeded successfully.');
    }
}
