<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered; // <--- TAMBAHAN INI BIAR GAK MERAH
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Models\Appointment;
use App\Models\LandingPage;
use App\Models\AboutPage;
use App\Models\ServicePage;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes - AINUN KONVEKSI FINAL SYSTEM (VERIFIED EDITION)
|--------------------------------------------------------------------------
*/

// 1. HALAMAN UTAMA (WELCOME)
Route::get('/', function () {
    $data = LandingPage::first();
    return view('welcome', compact('data'));
})->name('home');

// 2. HALAMAN DETAIL TENTANG KAMI
Route::get('/about-details', function () {
    $about = AboutPage::first();
    $landing = LandingPage::first();
    return view('about-details', compact('about', 'landing'));
})->name('about-details');

// 3. HALAMAN DETAIL LAYANAN
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
| EMAIL VERIFICATION SYSTEM
|--------------------------------------------------------------------------
*/

Route::get('/email/verify', function () {
    return view('auth.verify-email'); 
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/')->with('success_login', 'Email berhasil diverifikasi! Selamat bergabung.');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Link verifikasi baru telah dikirim!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

/*
|--------------------------------------------------------------------------
| AUTHENTICATION SYSTEM
|--------------------------------------------------------------------------
*/

Route::get('/login-custom', function () {
    return view('auth.login');
})->name('login');

Route::get('/register-custom', function () {
    return view('auth.register');
})->name('register');

// REGISTER
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

    // 🔥 Sekarang pakai Registered::dispatch() yang sudah di-import
    event(new Registered($user));

    Auth::login($user);

    return redirect()->route('verification.notice');
});

// LOGIN (VIP Admin Jalur)
Route::post('/login-custom', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $remember = $request->has('remember');

    if (Auth::attempt($credentials, $remember)) {
        $request->session()->regenerate();
        $user = Auth::user();
        
        $daftarAdmin = ['adminganteng@ainun.com', 'admin@ainun.com'];

        if (in_array($user->email, $daftarAdmin)) {
            return redirect('/admin'); 
        }

        return redirect('/')->with('success_login', 'Login berhasil!');
    }

    return back()->withErrors(['email' => 'Email atau password salah bosku.'])->onlyInput('email');
});

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

Route::post('/appointment', function (Request $request) {
    $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'message' => 'required',
    ]);

    Appointment::create($request->all());
    return back()->with('success', 'Pesan berhasil dikirim!');
})->name('appointment.store');