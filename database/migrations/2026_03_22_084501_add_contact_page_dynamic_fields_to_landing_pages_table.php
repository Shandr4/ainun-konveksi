<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('landing_pages', function (Blueprint $table) {
            // Kolom untuk Judul & Subjudul Section Kontak
            $table->string('contact_title')->nullable();
            $table->string('contact_subtitle')->nullable();
            
            // Kolom untuk Gambar Workshop Utama
            $table->string('contact_image')->nullable();
            
            // Kolom untuk data 2 card kontak (WhatsApp & Telpon)
            $table->json('contact_methods')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('landing_pages', function (Blueprint $table) {
            $table->dropColumn(['contact_title', 'contact_subtitle', 'contact_image', 'contact_methods']);
        });
    }
};