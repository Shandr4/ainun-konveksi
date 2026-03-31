<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    // Bikin widgetnya muncul paling atas
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Pesanan Aktif', '124')
                ->description('32 pesanan baru minggu ini')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17]) // Ini yang bikin grafiknya jedag-jedug
                ->color('success'),
                
            Stat::make('Proyek Selesai', '1,250')
                ->description('Naik 8% dari bulan lalu')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([15, 4, 10, 2, 12, 4, 12])
                ->color('primary'),
                
            Stat::make('Konsultasi Baru', '18')
                ->description('Klien menunggu dihubungi')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
        ];
    }
}