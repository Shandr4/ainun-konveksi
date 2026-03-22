<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Models\LandingPage;
use App\Models\AboutPage;
use App\Models\ServicePage;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes - AINUN KONVEKSI FINAL SYSTEM
|--------------------------------------------------------------------------
*/

// 1. HALAMAN UTAMA (WELCOME)
Route::get('/', function () {
    $data = LandingPage::first();
    return view('welcome', compact('data'));
})->name('home');

// 2. HALAMAN DETAIL TENTANG KAMI
Route::get('/about-details', function () {
    $about = AboutPage::first();       // Data Visi Misi dll
    $landing = LandingPage::first();   // Data Kontak/Footer
    return view('about-details', compact('about', 'landing'));
})->name('about-details');

// 3. HALAMAN DETAIL LAYANAN (Sesuai Desain Baru)
Route::get('/layanan-kami', function () {
    $service = ServicePage::first();
    $landing = LandingPage::first();
    return view('service-details', compact('service', 'landing'));
})->name('service-details');

// 4. HALAMAN SYARAT & KETENTUAN (TERMS)
Route::get('/terms', function () {
    return view('terms');
})->name('terms');

/*
|--------------------------------------------------------------------------
| AUTHENTICATION SYSTEM (LOGIN, REGISTER, LOGOUT)
|--------------------------------------------------------------------------
*/

// Tampilan Form Login
Route::get('/login-custom', function () {
    return view('auth.login');
})->name('login');

// Tampilan Form Register
Route::get('/register-custom', function () {
    return view('auth.register');
})->name('register');

// PROSES SIMPAN DATA REGISTER
Route::post('/register-custom', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    Auth::login($user);

    return redirect('/')->with('success_login', 'Pendaftaran berhasil! Selamat datang di Ainun Konveksi.');
});

// PROSES LOGIN (DENGAN PINTU OTOMATIS KE ADMIN)
Route::post('/login-custom', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $remember = $request->has('remember');

    if (Auth::attempt($credentials, $remember)) {
        $request->session()->regenerate();

        $user = Auth::user();
        
        // --- LOGIKA PINTU VIP ADMIN ---
        // Daftar Email yang otomatis masuk ke Dashboard Filament
        $daftarAdmin = ['adminganteng@ainun.com', 'admin@ainun.com'];

        if (in_array($user->email, $daftarAdmin)) {
            return redirect('/admin'); 
        }

        // Jika user biasa, lempar ke Home
        return redirect('/')->with('success_login', 'Login berhasil! Selamat datang kembali.');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah bosku.',
    ])->onlyInput('email');
});

// PROSES LOGOUT
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

/*
|--------------------------------------------------------------------------
| FORM SUBMISSION
|--------------------------------------------------------------------------
*/

// SIMPAN PESAN / APPOINTMENT DARI HALAMAN DEPAN
Route::post('/appointment', function (Request $request) {
    $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'message' => 'required',
    ]);

    Appointment::create($request->all());

    return back()->with('success', 'Pesan berhasil dikirim! Kami akan segera menghubungi Anda.');
})->name('appointment.store');