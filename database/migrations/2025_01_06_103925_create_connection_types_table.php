<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('connection_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // tên loại kết nối
            $table->text('description')->nullable(); // mô tả kết nối
            $table->timestamps();
        });

        DB::table('connection_types')->insert([
            ['name' => 'friend', 'description' => 'Kết bạn'],
            ['name' => 'follower', 'description' => 'Theo dõi'],
            ['name' => 'professional', 'description' => 'Kết nối chuyên nghiệp'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('connection_types');
    }
};
