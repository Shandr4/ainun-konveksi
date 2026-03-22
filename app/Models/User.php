<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail; // <--- 1. Sudah Aktif
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

// 🔥 2. TAMBAHKAN "implements MustVerifyEmail" di baris ini! 🔥
class User extends Authenticatable implements FilamentUser, MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // 🔥 SATPAM FILAMENT 🔥
    public function canAccessPanel(Panel $panel): bool
    {
        // Email yang boleh masuk ke dashboard admin
        $daftarAdmin = [
            'admin@ainun.com',         
            'adminganteng@ainun.com',  
            'bos@ainun.com'
        ];

        return in_array($this->email, $daftarAdmin);
    }
}