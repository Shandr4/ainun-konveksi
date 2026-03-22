<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
            $table->string('subtitle')->nullable();
            $table->string('image')->nullable();
            $table->string('history_title')->nullable();
            $table->text('history_text')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->text('values')->nullable();
            $table->json('advantages')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};