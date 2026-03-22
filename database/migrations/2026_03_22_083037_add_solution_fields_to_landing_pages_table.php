<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('landing_pages', function (Blueprint $table) {
            // Kolom untuk Cara Pemesanan (01, 02, 03)
            $table->json('order_steps')->nullable();
            
            // Kolom untuk Banner Solusi Konveksi (Bawah)
            $table->string('solution_title')->nullable();
            $table->text('solution_description')->nullable();
            $table->string('solution_image')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('landing_pages', function (Blueprint $table) {
            $table->dropColumn(['order_steps', 'solution_title', 'solution_description', 'solution_image']);
        });
    }
};