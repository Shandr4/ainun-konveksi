<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Pastikan import nama Model-nya sudah sesuai folder app/Models kamu!
use App\Models\LandingPage; 
use App\Models\JobVacancy;
use App\Models\Project;

/*
|--------------------------------------------------------------------------
| ANJAYA KONVEKSI - API ENGINE PRO (FINAL VERSION)
|--------------------------------------------------------------------------
*/

// 1. Endpoint Lowongan Kerja
Route::get('/lowongan', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'Data Lowongan Kerja Aktif Anjaya Konveksi',
        'data' => JobVacancy::where('is_active', true)->latest()->get()
    ], 200);
});

// 2. Endpoint Layanan & Produk
Route::get('/layanan', function () {
    try {
        // Ganti Landing jadi LandingPage sesuai model kamu
        $data = LandingPage::first(); 
        return response()->json([
            'status' => 'success',
            'message' => 'Daftar Layanan Produksi Anjaya Konveksi',
            'results' => [
                'services' => $data->services ?? [],
                'product_categories' => $data->product_categories ?? []
            ]
        ], 200);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => 'Database LandingPage kosong atau error'], 500);
    }
});

// 3. Endpoint Portofolio / Project
Route::get('/projects', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'Daftar Portofolio Hasil Karya Terbaik',
        'data' => Project::latest()->get()
    ], 200);
});

// 4. Endpoint Info Kontak & Jam Operasional
Route::get('/kontak', function () {
    try {
        $data = LandingPage::first();
        return response()->json([
            'status' => 'success',
            'data' => [
                'perusahaan' => 'Anjaya Konveksi',
                'telepon' => $data->phone ?? 'Belum diset',
                'jam_buka' => $data->opening_hours ?? 'Belum diset',
                'alamat' => $data->address ?? 'Belum diset'
            ]
        ], 200);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => 'Gagal mengambil data kontak'], 500);
    }
});