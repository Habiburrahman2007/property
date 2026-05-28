<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Migration: create_properties_table
 *
 * Stores property listing data including physical attributes,
 * pricing, availability, and location.
 *
 * Notable design decisions:
 *  - `hadap` uses a MySQL SET column (not enum) to allow multiple
 *    combined direction values (e.g., "Utara,Timur").
 *  - `price` is BIGINT UNSIGNED to avoid floating-point rounding
 *    issues with large IDR values.
 *  - `kawasan` is JSON for flexible multi-tag area metadata.
 *  - `deleted_at` enables soft deletion; NULL = active record.
 *  - CHECK constraints enforce domain rules at the database level.
 *  - FK on `created_by` uses CASCADE on UPDATE, RESTRICT on DELETE.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            // Primary key
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY

            // Basic information
            $table->string('nama_property', 100);          // Property display name
            $table->string('group_name', 255)->nullable();  // Optional cluster / phase label

            // Physical dimensions (in meters)
            $table->decimal('lebar', 5, 2);   // Width  — enforced > 0 via CHECK below
            $table->decimal('panjang', 5, 2); // Length — enforced > 0 via CHECK below

            // Facing direction(s) — SET allows combined values like "Utara,Barat".
            // `hadap` is added via ALTER TABLE *after* Schema::create() commits the table,
            // because DB::statement() inside the callback runs before the DDL is flushed.
            // (see the ALTER TABLE call below, outside this closure)

            // Classification
            $table->enum('tipe', ['Ruko', 'Villa']); // Property type

            // Number of floors: range 1.0 – 10.0, enforced by CHECK below
            $table->decimal('tingkat', 3, 1);

            // Price stored as integer to avoid floating-point rounding (IDR)
            $table->unsignedBigInteger('price');

            // Amenity flag
            $table->boolean('carport');

            // Availability & readiness states
            $table->enum('status', ['in stock', 'sold_out']);
            $table->enum('siap', ['siap_huni', 'siap_kosong', 'siap_huni_renovasi']);

            // Location
            $table->string('maps_link', 255)->nullable(); // Optional map URL
            $table->json('kawasan');                      // Multi-tag area metadata

            // Unit / lot identifier
            $table->string('unit', 255)->nullable();

            // Audit: which admin created this listing
            $table->unsignedBigInteger('created_by');

            // Audit timestamps
            $table->timestamps();       // created_at, updated_at

            // Soft delete timestamp (NULL = active)
            $table->softDeletes();      // deleted_at TIMESTAMP NULL

            // ---------------------------------------------------------
            // Indexes
            // ---------------------------------------------------------
            $table->index('created_by');   // Efficient joins on admin
            $table->index('status');       // Quick availability filters
            $table->index('deleted_at');   // Efficient soft-delete scoping

            // ---------------------------------------------------------
            // Foreign key: created_by → users(id)
            //   ON UPDATE CASCADE  — propagate PK changes automatically
            //   ON DELETE RESTRICT — prevent deleting a user with listings
            // ---------------------------------------------------------
            $table->foreign('created_by')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
        });

        // ---------------------------------------------------------
        // Cross-compatible setup: MySQL raw statements vs SQLite fallback
        // ---------------------------------------------------------
        if (DB::getDriverName() === 'sqlite') {
            Schema::table('properties', function (Blueprint $table) {
                $table->string('hadap')->default('Utara')->after('panjang');
            });
        } else {
            // `hadap` SET column — added here (outside Schema::create) so that
            // the ALTER TABLE runs after the CREATE TABLE DDL is committed.
            DB::statement("ALTER TABLE `properties`
                ADD `hadap` SET('Utara','Selatan','Timur','Barat') NOT NULL AFTER `panjang`");

            // CHECK constraints
            // Raw DB::statement is used for explicit constraint names and
            // full MySQL 8.0+ compatibility.
            
            // nama_property must be between 3 and 100 characters
            DB::statement('ALTER TABLE `properties`
                ADD CONSTRAINT `chk_properties_nama_length`
                CHECK (CHAR_LENGTH(`nama_property`) BETWEEN 3 AND 100)');

            // lebar must be a positive value
            DB::statement('ALTER TABLE `properties`
                ADD CONSTRAINT `chk_properties_lebar_positive`
                CHECK (`lebar` > 0)');

            // panjang must be a positive value
            DB::statement('ALTER TABLE `properties`
                ADD CONSTRAINT `chk_properties_panjang_positive`
                CHECK (`panjang` > 0)');

            // tingkat must be within 1.0 – 10.0
            DB::statement('ALTER TABLE `properties`
                ADD CONSTRAINT `chk_properties_tingkat_range`
                CHECK (`tingkat` BETWEEN 1.0 AND 10.0)');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
