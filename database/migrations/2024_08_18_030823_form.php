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
        Schema::create('forms', function (Blueprint $table) {
            // Change the 'id' column to store a 5-digit number without auto-increment
            $table->unsignedBigInteger('id')->primary();  // Set 'id' as primary without auto-increment

            // Foreign keys for admin_id, user_id, office_id
            $table->foreignId('admin_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('office_id')->constrained('users')->onDelete('cascade');

            // Other fields
            $table->string('client');
            $table->string('sex');
            $table->integer('age');
            $table->string('region');
            $table->string('service');
            $table->integer('ccone');
            $table->integer('cctwo');
            $table->integer('ccthree');
            $table->integer('sqdzero');
            $table->integer('sqdone');
            $table->integer('sqdtwo');
            $table->integer('sqdthree');
            $table->integer('sqdfour');
            $table->integer('sqdfive');
            $table->integer('sqdsix');
            $table->integer('sqdseven');
            $table->integer('sqdeight');
            $table->text('suggest')->nullable();
            $table->string('contact')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
