<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\JobVacancy;
use App\Models\Project;
use App\Models\LandingPage;

/*
|--------------------------------------------------------------------------
| 1. HALAMAN UTAMA (HOME)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    $data = LandingPage::first(); 
    $vacancies = JobVacancy::where('is_active', true)->get(); 
    return view('welcome', compact('data', 'vacancies'));
})->name('home');

/*
|--------------------------------------------------------------------------
| 2. HALAMAN FRONTEND (PUBLIK)
|--------------------------------------------------------------------------
*/

// Pastikan file: resources/views/lowongan.blade.php ada
Route::get('/lowongan', function () {
    $vacancies = JobVacancy::all(); 
    return view('lowongan', compact('vacancies'));
})->name('lowongan');

// Pastikan file: resources/views/project.blade.php ada
Route::get('/project', function () {
    $projects = Project::all();
    return view('project', compact('projects'));
})->name('project');

Route::get('/about-details', function () {
    // Kita harus ambil data LandingPage lagi di sini biar bisa tampil
    $data = \App\Models\LandingPage::first(); 
    
    return view('about-details', [
        'data' => $data
    ]);
})->name('about-details');

// Buka routes/web.php, cari route service dan ubah jadi gini aja:
Route::get('/service-details', function () {
    return view('service-details');
})->name('service-details');

/*
|--------------------------------------------------------------------------
| 3. AUTH & DASHBOARD (BREEZE)
|--------------------------------------------------------------------------
*/

// Dashboard Customer (Bukan Admin)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| 4. ACTION ROUTES (POST)
|--------------------------------------------------------------------------
*/
Route::post('/appointment', function () {
    return back()->with('success', 'Pesan terkirim ke Anjaya Konveksi!');
})->name('appointment.store');

// Jembatan buat link lama kamu di welcome.blade.php biar gak 404
Route::get('/login-custom', fn() => redirect()->route('login'));
Route::get('/register-custom', fn() => redirect()->route('register'));
Route::get('/karir', fn() => redirect()->route('lowongan'));

require __DIR__.'/auth.php';