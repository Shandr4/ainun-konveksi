<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser; // <--- Import ini wajib ada
use Filament\Panel; // <--- Import ini wajib ada

// Tambahkan "implements FilamentUser" di sini
class User extends Authenticatable implements FilamentUser
{
    // 🔥 HasApiTokens udah aku hapus di sini biar nggak merah lagi! 🔥
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
    // Fungsi ini akan mengecek apakah user boleh masuk ke /admin
    public function canAccessPanel(Panel $panel): bool
    {
        // ⚠️ PENTING: Masukkan email admin kamu di bawah ini!
        $daftarAdmin = [
            'admin@ainun.com',         
            'adminganteng@ainun.com',  // <-- Sesuai nama user admin kamu di screenshot
            'bos@ainun.com'
        ];

        return in_array($this->email, $daftarAdmin);
    }
}