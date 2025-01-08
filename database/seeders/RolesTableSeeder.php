<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Role::create([
        //     'name' => 'admin',
        //     'description' => 'Quyền quản trị hệ thống',
        // ]);

        // Role::create([
        //     'name' => 'user',
        //     'description' => 'Người dùng hệ thống',
        // ]);

        // Role::create([
        //     'name' => 'recruiter',
        //     'description' => 'Nhà tuyển dụng ', // Người tuyển dụng (công ty) : Chỉ quản lý quy trình tuyển dụng.
        // ]);

        // Role::create([
        //     'name' => 'employer',
        //     'description' => 'Người sử dụng lao động', // Người sử dụng lao động (công ty) : Quản lý cả quy trình tuyển dụng và nhân viên.
        // ]);

    }
}