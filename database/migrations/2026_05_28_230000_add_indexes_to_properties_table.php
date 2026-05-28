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
        Schema::table('properties', function (Blueprint $table) {
            $table->index('created_at');
            $table->index('price');
            $table->index('tipe');
            $table->index('siap');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropIndex(['created_at']);
            $table->dropIndex(['price']);
            $table->dropIndex(['tipe']);
            $table->dropIndex(['siap']);
        });
    }
};
