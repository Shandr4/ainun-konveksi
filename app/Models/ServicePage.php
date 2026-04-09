<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePage extends Model
{
    protected $fillable = [
        'hero_title', 
        'hero_subtitle', 
        'hero_image', 
        'list_layanan' // Pastikan ini nama kolomnya sesuai database
    ];

    // INI KUNCI SAKTINYA:
    protected $casts = [
        'list_layanan' => 'array',
    ];
}