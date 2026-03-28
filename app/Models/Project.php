<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // TAMBAHIN BARIS INI BIAR SEMUA KOLOM DIIZINKAN DIISI OLEH FILAMENT 👇
    protected $guarded = []; 
}