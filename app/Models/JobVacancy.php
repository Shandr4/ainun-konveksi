<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    use HasFactory;

    // Buka gembok biar semua kolom bisa diisi dari form admin
    protected $guarded = []; 
}