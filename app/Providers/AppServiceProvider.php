<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use App\Models\LandingPage;
use App\Models\AboutPage;
use App\Models\ServicePage;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // 1. Logika HTTPS
        if (request()->header('x-forwarded-proto') === 'https') {
            URL::forceScheme('https');
        }

        // 2. LOGIKA SAKTI CMS DATA
        // Pakai latest() biar dia ambil ID paling besar (data terakhir yang lo buat di Filament)
        View::share('cms_landing', LandingPage::latest()->first() ?? null);
        View::share('cms_about', AboutPage::latest()->first() ?? null);
        View::share('cms_service', ServicePage::latest()->first() ?? null);
    }
}