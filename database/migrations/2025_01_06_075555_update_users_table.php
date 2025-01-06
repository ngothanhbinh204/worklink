<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop trường 'name' và thêm trường 'first_name' và 'last_name'

            $table->dropColumn('name');

            // $table->string('first_name')->after('id')->nullable();
            // $table->string('last_name')->after('first_name')->nullable();

            // Thông tin cá nhân
            // $table->string('phone')->nullable(); // Số điện thoại
            $table->string('avatar')->nullable(); // Ảnh đại diện
            $table->string('cover_photo')->nullable(); // Ảnh bìa
            $table->string('headline')->nullable(); // Tiêu đề hồ sơ (Ví dụ: Developer, Designer, ...)
            $table->text('bio')->nullable(); // Giới thiệu bản thân
            $table->string('location')->nullable(); // Địa chỉ

            // Trạng thái & vai trò
            $table->boolean('active')->default(true); // Trạng thái hoạt động
            $table->string('role')->default('user'); // Vai trò (ví dụ: admin, user)

            // Indexes tối ưu tìm kiếm
            if (!Schema::hasIndex('users', 'users_email_index')) {
                $table->index('email', 'users_email_index'); // Index cho email
            }
            if (!Schema::hasIndex('users', 'users_active_index')) {
                $table->index('active', 'users_active_index'); // Index cho trạng thái hoạt động
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->after('id')->nullable();
        });

        DB::table('users')->update([
            'name' => DB::raw("CONCAT(first_name, ' ', last_name)"),
        ]);
        Schema::table('users', function (Blueprint $table) {
            // Xóa các index nếu chúng tồn tại
            if (Schema::hasIndex('users', 'users_email_index')) {
                $table->dropIndex('users_email_index');
            }
            if (Schema::hasIndex('users', 'users_active_index')) {
                $table->dropIndex('users_active_index');
            }
            $table->dropColumn(['first_name', 'last_name', 'phone', 'avatar', 'cover_photo', 'headline', 'bio', 'location', 'active', 'role']);
        });
    }
};
