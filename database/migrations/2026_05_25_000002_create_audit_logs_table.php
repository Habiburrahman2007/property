<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration: create_audit_logs_table
 *
 * Provides an immutable append-only trail of all CREATE, UPDATE,
 * and DELETE actions performed on property records.
 *
 * Notable design decisions:
 *  - No `updated_at` — audit rows must never be mutated after insert.
 *  - `changes_payload` is JSON (nullable) to capture before/after state;
 *    NULL is intentionally valid for CREATE actions (no prior state).
 *  - FK on `user_id`     : CASCADE on UPDATE, RESTRICT on DELETE
 *      → preserves audit history even when an admin is disabled.
 *  - FK on `property_id` : CASCADE on UPDATE, CASCADE on DELETE
 *      → audit trail is removed alongside a hard-deleted property.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('audit_logs', function (Blueprint $table) {
            // Primary key
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY

            // Actor — which admin triggered the action
            $table->unsignedBigInteger('user_id');

            // Target Property — which property was affected (nullable to support other module actions)
            $table->unsignedBigInteger('property_id')->nullable();

            // Action verb (e.g., Created Property, Updated Admin, Deleted Listing, System Login, Modified Settings)
            $table->string('action', 50);

            // Module (e.g., Properties, Admin Management, Authentication, Settings)
            $table->string('module', 50);

            // Target description (e.g., Villa Senopati A1, Role: Manager, Global Tax Rate)
            $table->string('target', 255)->nullable();

            // Client IP address initiating the action
            $table->string('ip_address', 45)->nullable();

            // Before/after state snapshot; NULL is valid for CREATE actions
            $table->json('changes_payload')->nullable();

            // Insert timestamp only — rows are append-only, no updated_at
            $table->timestamp('created_at')->useCurrent();

            // ---------------------------------------------------------
            // Indexes for common query patterns
            // ---------------------------------------------------------
            $table->index('user_id');
            $table->index('property_id');
            $table->index('action');
            $table->index('created_at');

            // ---------------------------------------------------------
            // Foreign key: user_id → users(id)
            //   ON UPDATE CASCADE  — keep logs consistent if user ID changes
            //   ON DELETE RESTRICT — do NOT allow deleting a user with audit history
            // ---------------------------------------------------------
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            // ---------------------------------------------------------
            // Foreign key: property_id → properties(id)
            //   ON UPDATE CASCADE — keep logs consistent if property ID changes
            //   ON DELETE CASCADE — remove logs when a property is hard-deleted
            // ---------------------------------------------------------
            $table->foreign('property_id')
                  ->references('id')
                  ->on('properties')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};
