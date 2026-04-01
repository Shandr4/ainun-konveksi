<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Project;      // Memanggil data Portofolio
use App\Models\Appointment;  // Memanggil data Pesanan/Konsultasi

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        // 1. Hitung Total Portofolio Asli
        $totalProject = Project::count();

        // 2. Hitung Konsultasi Baru (Semua data yang masuk ke tabel appointments)
        $totalKonsultasi = Appointment::count();

        // 3. Hitung Pesanan Aktif (Misal: Appointment yang statusnya 'pending' atau 'proses')
        // Kalau kamu belum punya kolom status, pakai count biasa dulu aja seperti di bawah:
        $pesananAktif = Appointment::count();
        
        // Catatan: Jika di database kamu belum ada kolom 'status', 
        // ganti baris di atas jadi: $pesananAktif = Appointment::count();

        return [
            // Card 1: Total Portofolio
            Stat::make('Total Portofolio', $totalProject)
                ->description('Karya yang sudah dipublikasi')
                ->descriptionIcon('heroicon-m-briefcase')
                ->chart([2, 5, 3, 8, 4, 10, $totalProject])
                ->color('success'),
                
            // Card 2: Pesanan Aktif (Filter berdasarkan status)
            Stat::make('Pesanan Aktif', $pesananAktif)
                ->description('Pesanan yang sedang diproses')
                ->descriptionIcon('heroicon-m-arrow-path')
                ->chart([3, 2, 5, 3, $pesananAktif])
                ->color('primary'),
                
            // Card 3: Konsultasi Baru (Total pesan masuk)
            Stat::make('Konsultasi Baru', $totalKonsultasi)
                ->description('Klien yang menghubungi via web')
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->color('warning'),
        ];
    }
}