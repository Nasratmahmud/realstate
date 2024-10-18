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
            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->string('country', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->text('address')->nullable();
            $table->string('phoneNumber', 255)->nullable();
            $table->string('avatar', 255)->nullable();
            $table->enum('role', ["admin","user"])->default('user')->comment('admin: Admin, user: User');
            $table->enum('status', ["0","1"])->default('1')->comment('0: Inactive, 1: Active');
            $table->string('remember_token', 255)->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_table');
    }
};
