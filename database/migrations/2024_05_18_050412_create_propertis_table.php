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
        Schema::create('propertis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_properti');
            $table->string('type_properti');
            $table->string('nomor_rumah');
            $table->longText('deskripsi');
            $table->integer('luas');
            $table->date('tahun_pembuatan');
            $table->integer('jumlah_kamar_tidur');
            $table->integer('jumlah_kamar_mandi');
            $table->integer('garasi');
            $table->string('status');
            $table->string('ac');
            $table->string('wifi');
            $table->string('tv');
            $table->string('kulkas');
            $table->string('gym');
            $table->string('alamat');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->integer('harga');
            $table->text('informasi_tambahan');
            $table->string('terjual')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propertis');
    }
};
