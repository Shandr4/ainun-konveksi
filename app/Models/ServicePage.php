<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePage extends Model
{
    protected $guarded = [];

    protected $casts = [
        'detailed_services' => 'array',
    ];
}