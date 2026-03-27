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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');        // Nama project (cth: Seragam Perawat)
            $table->string('client');       // Nama klien (cth: RS Mitra Keluarga)
            $table->string('category');     // Kategori (seragam / kaos / jaket)
            $table->string('image');        // Foto project
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
