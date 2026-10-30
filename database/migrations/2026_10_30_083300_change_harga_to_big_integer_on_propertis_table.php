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
        // Ubah kolom tanpa doctrine/dbal (didukung native sejak Laravel 10.x)
        Schema::useNativeSchemaOperationsIfPossible();

        // integer hanya sampai Rp 2.147.483.647, terlalu kecil untuk harga properti
        Schema::table('propertis', function (Blueprint $table) {
            $table->unsignedBigInteger('harga')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::useNativeSchemaOperationsIfPossible();

        Schema::table('propertis', function (Blueprint $table) {
            $table->integer('harga')->change();
        });
    }
};
