<?php

use App\Models\About;
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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->longText('deskripsi');
            $table->timestamps();
        });
        About::create([
            'deskripsi'=>'ini tentang usaha kami',
            'foto'=>'foto.jpg'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
