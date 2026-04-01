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
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul Loker (misal: Tukang Jahit)
            $table->text('description'); // Deskripsi Pekerjaan
            $table->text('requirements')->nullable(); // Syarat-syarat
            $table->string('salary_range')->nullable(); // Kisaran Gaji (Opsional)
            $table->boolean('is_active')->default(true); // Status Loker Buka/Tutup
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_vacancies');
    }
};
