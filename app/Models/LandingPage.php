<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    protected $guarded = [];

    protected $casts = [
        'product_categories' => 'array',
        'services' => 'array',
        'order_steps' => 'array',
        'contact_methods' => 'array',
        'about_page_advantages' => 'array', // <--- TAMBAHKAN INI
    ];
}