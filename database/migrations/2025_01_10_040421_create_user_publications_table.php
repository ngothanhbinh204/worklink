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
        // Các ấn phẩm
        Schema::create('user_publications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
           $table->string('title');
           $table->string('publisher')->nullable();
             $table->date('publication_date');
             $table->text('description')->nullable();
              $table->string('link')->nullable();
             $table->timestamps();


             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_publications');
    }
};
