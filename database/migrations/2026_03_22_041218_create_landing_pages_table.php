<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('landing_pages', function (Blueprint $table) {
            $table->id();
            
            // 1. Hero & Top Bar
            $table->string('hero_title')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('opening_hours')->nullable(); // <-- INI DIA TERSANGKANYA (Sekarang udah ada)
            
            // 2. Kategori Produk (Lingkaran)
            $table->json('product_categories')->nullable(); 

            // 3. Tentang Kami & Visi Misi
            $table->string('about_title')->nullable();
            $table->text('about_description')->nullable();
            $table->string('about_image')->nullable();
            $table->text('vision_mission_text')->nullable();

            // 4. Layanan (Card-card)
            $table->json('services')->nullable();

            // 5. Kontak & Footer
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('landing_pages');
    }
};