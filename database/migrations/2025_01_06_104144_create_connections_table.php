<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('connections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('connection_type_id'); // Loại kết nối
            $table->unsignedBigInteger('sender_id'); // Người gửi kết nối
            $table->unsignedBigInteger('receiver_id'); // Người nhận kết nối
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending'); // Trạng thái kết nối
            $table->text('message')->nullable(); // Tin nhắn kết nối
            $table->timestamps();

            // FK
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('connection_type_id')->references('id')->on('connection_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('connections');
    }
};
