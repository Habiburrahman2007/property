<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration: create_users_table
 *
 * Replaces the default Laravel users table with a custom schema
 * designed for admin and superadmin authentication.
 *
 * Also re-creates the password_reset_tokens and sessions tables
 * that ship with Laravel's default stub, so they remain intact.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // ---------------------------------------------------------
        // users
        // Purpose: Store admin and superadmin authentication data.
        //          `is_active` disables accounts without hard deletion,
        //          preserving referential integrity for foreign keys.
        // ---------------------------------------------------------
        Schema::create('users', function (Blueprint $table) {
            // Primary key
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY

            // Authentication credentials
            $table->string('email', 255)->unique();   // Unique login identifier
            $table->string('password', 255);          // bcrypt-hashed password

            // Access control
            $table->enum('role', ['admin', 'superadmin']); // Permission level
            $table->boolean('is_active')->default(true);    // FALSE = disabled, not deleted

            // Audit timestamps (auto-managed by Laravel / DB)
            $table->timestamps(); // created_at & updated_at (both CURRENT_TIMESTAMP)
        });

        // ---------------------------------------------------------
        // password_reset_tokens — Laravel default, kept as-is
        // ---------------------------------------------------------
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // ---------------------------------------------------------
        // sessions — Laravel default, kept as-is
        // ---------------------------------------------------------
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
