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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile')->unique()->nullable();
            $table->string('img')->nullable();
            $table->string('cover_img')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_active')->default(true);
            $table->enum('type_account', ['email', 'gmail']);
            $table->string('otp')->nullable();
            $table->timestamp('otp_expires_at')->nullable();
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('country_id');
            $table->string('uid')->nullable();
            $table->rememberToken();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
