<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('landing_pages', function (Blueprint $table) {
            // Data Halaman 2 (About Details)
            $table->string('about_page_subtitle')->nullable();
            $table->string('about_page_image_2')->nullable();
            $table->string('about_page_history_title')->nullable();
            $table->text('about_page_history_text')->nullable();
            $table->text('about_page_vision')->nullable();
            $table->text('about_page_mission')->nullable();
            $table->text('about_page_values')->nullable();
            $table->json('about_page_advantages')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('landing_pages', function (Blueprint $table) {
            $table->dropColumn([
                'about_page_subtitle', 'about_page_image_2', 'about_page_history_title', 
                'about_page_history_text', 'about_page_vision', 'about_page_mission', 
                'about_page_values', 'about_page_advantages'
            ]);
        });
    }
};