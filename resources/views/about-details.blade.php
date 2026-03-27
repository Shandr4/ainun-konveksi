<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami | Ainun Konveksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #F8FAFC; }
        h1, h2, h3, h4, h5 { font-family: 'Poppins', sans-serif; }
        .hero-overlay { background: rgba(45, 67, 115, 0.85); }
    </style>
</head>
<body class="antialiased text-slate-800">

    <div class="bg-[#2D4373] text-white/90 text-[10px] md:text-[11px] py-2.5 px-4 md:px-20 flex flex-wrap justify-between items-center tracking-wide relative z-50 gap-2">
        <div class="flex items-center gap-4 md:gap-8 mx-auto md:mx-0">
            <span class="flex items-center gap-1.5 hover:text-white transition">
                <i class="far fa-clock text-yellow-400"></i>
                {{ $landing->opening_hours ?? 'Mon-Fri: 9AM - 5PM' }}
            </span>
            <span class="flex items-center gap-1.5 hover:text-white transition">
                <i class="fas fa-phone-alt text-yellow-400"></i>
                {{ $landing->phone ?? '(205) 484-9624' }}
            </span>
        </div>
        <a href="/#contact-order" class="hidden md:block bg-yellow-500 hover:bg-yellow-400 text-[#2D4373] font-bold px-5 py-1.5 rounded-full text-[10px] uppercase transition-all shadow-lg">
            Get appointment now
        </a>
    </div>

    <nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-100 px-4 md:px-20 py-3 md:py-4 flex justify-between items-center transition-all shadow-sm">
        <a href="/" class="flex items-center gap-3 group cursor-pointer">
            <div class="w-10 h-10 md:w-12 md:h-12 bg-[#3B5998] rounded-xl md:rounded-2xl flex items-center justify-center shadow-xl shadow-blue-900/20 transform group-hover:rotate-6 transition-all">
                <span class="text-white font-black text-base md:text-lg italic tracking-tighter">ainun</span>
            </div>
            <span class="font-extrabold text-lg md:text-xl tracking-tight text-[#2D4373]">KONVEKSI</span>
        </a>

        <button id="mobile-menu-btn" class="md:hidden text-[#2D4373] text-2xl focus:outline-none p-2">
            <i class="fas fa-bars"></i>
        </button>

        <div class="hidden md:flex items-center gap-8 text-[13px] font-semibold tracking-wide">
            <div id="nav-links" class="flex items-center gap-8">
                <a href="/" class="nav-link text-slate-500 hover:text-yellow-600 transition-colors">Home</a>
                <a href="/project" class="nav-link text-slate-500 hover:text-yellow-600 transition-colors">Project</a>
                <a href="/#about" class="nav-link text-yellow-600 border-b-2 border-yellow-500 pb-1 transition-colors">About us</a>
                <a href="/#contact-order" class="nav-link text-slate-500 hover:text-yellow-600 transition-colors">Contact</a>
            </div>

            <div class="w-px h-5 bg-slate-300"></div>

            <div class="flex items-center gap-4">
                @auth
                    <span class="text-[#2D4373] font-bold">Halo, {{ explode(' ', Auth::user()->name)[0] }}</span>
                    <form method="POST" action="{{ route('logout') ?? '/logout' }}" class="m-0">
                        @csrf
                        <button type="submit" class="bg-red-50 text-red-500 hover:bg-red-500 hover:text-white border border-red-200 px-4 py-1.5 rounded-full transition-all text-xs font-bold">Logout</button>
                    </form>
                @else
                    <a href="/login-custom" class="flex items-center gap-2 text-[#2D4373] hover:text-yellow-600 transition-colors">
                        <i class="far fa-user-circle text-lg"></i> <span>Login</span>
                    </a>
                    <a href="/register-custom" class="bg-[#F8FAFC] border border-slate-200 text-[#2D4373] hover:border-yellow-500 hover:bg-yellow-50 px-5 py-1.5 rounded-full transition-all">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    <div id="mobile-menu" class="fixed inset-0 z-[60] bg-white pt-24 px-8 flex flex-col gap-6 text-lg font-bold text-[#2D4373] transition-transform duration-300 transform translate-x-full shadow-2xl">
        <button id="close-menu-btn" class="absolute top-6 right-6 text-3xl text-slate-400 hover:text-red-500"><i class="fas fa-times"></i></button>
        <a href="/" class="mobile-link border-b border-slate-100 pb-4">Home</a>
        <a href="/project" class="mobile-link border-b border-slate-100 pb-4">Project</a>
        <a href="/#about" class="mobile-link border-b border-slate-100 pb-4 text-yellow-600">About us</a>
        <a href="/#contact-order" class="mobile-link border-b border-slate-100 pb-4">Contact</a>
        
        <div class="mt-4 flex flex-col gap-4">
            @auth
                <span class="text-slate-500 text-sm border-b border-slate-100 pb-2">Login sebagai: {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') ?? '/logout' }}" class="w-full">
                    @csrf
                    <button type="submit" class="w-full bg-red-50 text-red-500 py-3 rounded-xl border border-red-200 text-center font-bold">Logout</button>
                </form>
            @else
                <a href="/login-custom" class="bg-[#F8FAFC] text-center border border-slate-200 py-3 rounded-xl hover:bg-slate-100">Login</a>
                <a href="/register-custom" class="bg-yellow-500 text-white text-center py-3 rounded-xl">Daftar Member</a>
            @endauth
        </div>
    </div>

    <header class="relative pt-24 md:pt-32 pb-32 md:pb-40 px-4 md:px-6 flex flex-col items-center justify-center text-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            @if(isset($landing) && $landing->hero_image)
                <img src="{{ asset('storage/' . $landing->hero_image) }}" class="w-full h-full object-cover" alt="Background">
            @else
                <div class="w-full h-full bg-slate-900"></div>
            @endif
            <div class="absolute inset-0 hero-overlay"></div>
        </div>

        <div class="relative z-10">
            <div class="flex items-center justify-center gap-2 text-white/70 text-xs md:text-sm font-medium mb-4 md:mb-6 uppercase tracking-widest">
                <a href="/" class="hover:text-yellow-400 transition-colors">Home</a>
                <i class="fas fa-chevron-right text-[8px] md:text-[10px]"></i>
                <span class="text-white">Tentang Kami</span>
            </div>
            
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black text-white mb-3 md:mb-4 tracking-tight drop-shadow-lg px-2">
                Tentang Ainun Konveksi
            </h1>
            <p class="text-sm sm:text-base md:text-xl text-white/90 font-light tracking-wide max-w-2xl mx-auto px-4">
                {{ $about->subtitle ?? 'Partner Terpercaya dalam Industri Garmen Indonesia Sejak 2015' }}
            </p>
        </div>
    </header>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 -mt-16 md:-mt-20 relative z-20 mb-16 md:mb-24">
        <div class="bg-white rounded-[30px] md:rounded-[40px] shadow-2xl p-6 sm:p-8 md:p-16 flex flex-col lg:flex-row gap-8 md:gap-12 items-center border border-slate-100">
            
            <div class="w-full lg:w-5/12 h-[300px] sm:h-[350px] md:h-[400px] rounded-2xl md:rounded-3xl overflow-hidden shadow-lg">
                @if(isset($about) && $about->image)
                    <img src="{{ asset('storage/' . $about->image) }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700" alt="Perjalanan Kami">
                @else
                    <div class="w-full h-full bg-slate-200 flex items-center justify-center text-slate-400 text-center px-6 text-sm">Gambar Perjalanan Belum Diupload di CMS</div>
                @endif
            </div>

            <div class="w-full lg:w-7/12 text-center lg:text-left">
                <h2 class="text-2xl sm:text-3xl font-black text-[#2D4373] mb-4 md:mb-6">
                    {{ $about->history_title ?? 'Perjalanan Kami' }}
                </h2>
                <div class="text-slate-600 leading-relaxed font-light space-y-4 mb-6 md:mb-8 text-sm md:text-base text-justify lg:text-left">
                    @if(isset($about) && $about->history_text)
                        {!! nl2br(e($about->history_text)) !!}
                    @else
                        <p>Silakan isi teks perjalanan sejarah perusahaan di menu Halaman Tentang Kami pada panel Admin Filament.</p>
                    @endif
                </div>

                <a href="/#contact-order" class="inline-flex items-center gap-3 bg-[#F59E0B] hover:bg-yellow-400 text-white font-bold px-6 md:px-8 py-3.5 md:py-4 rounded-xl md:rounded-2xl shadow-xl shadow-yellow-500/30 transition-transform hover:-translate-y-1 w-full sm:w-auto justify-center">
                    <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center shrink-0">
                        <i class="fas fa-headset text-sm"></i>
                    </div>
                    <div class="text-left">
                        <span class="block text-xs md:text-sm">Konsultasi & Penawaran Gratis</span>
                        <span class="hidden sm:block text-[9px] md:text-[10px] font-medium opacity-80">Hubungi kami untuk mendiskusikan kebutuhan produksi Anda</span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="py-16 md:py-20 px-6 md:px-20 bg-white">
        <div class="max-w-7xl mx-auto text-center mb-10 md:mb-16">
            <h2 class="text-3xl md:text-4xl font-black text-[#2D4373] mb-3 md:mb-4">Visi, Misi & Nilai Kami</h2>
            <p class="text-slate-500 font-light text-sm md:text-base">Fondasi yang membimbing setiap keputusan dan tindakan kami</p>
        </div>

        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 md:gap-8">
            <div class="bg-white border border-slate-100 rounded-[20px] md:rounded-3xl p-8 md:p-10 shadow-xl shadow-slate-200/50 hover:-translate-y-2 transition-transform text-center md:text-left">
                <div class="w-12 h-12 md:w-14 md:h-14 rounded-full bg-blue-50 flex items-center justify-center mb-5 md:mb-6 mx-auto md:mx-0">
                    <i class="fas fa-eye text-[#3B5998] text-lg md:text-xl"></i>
                </div>
                <h3 class="font-bold text-lg md:text-xl text-slate-800 mb-3 md:mb-4">Visi</h3>
                <p class="text-slate-500 text-xs md:text-sm leading-relaxed font-light">
                    {{ $about->vision ?? 'Menjadi perusahaan konveksi terdepan di Indonesia yang dikenal akan kualitas produk, inovasi, dan pelayanan prima kepada setiap klien.' }}
                </p>
            </div>
            
            <div class="bg-white border border-slate-100 rounded-[20px] md:rounded-3xl p-8 md:p-10 shadow-xl shadow-slate-200/50 hover:-translate-y-2 transition-transform text-center md:text-left">
                <div class="w-12 h-12 md:w-14 md:h-14 rounded-full bg-yellow-50 flex items-center justify-center mb-5 md:mb-6 mx-auto md:mx-0">
                    <i class="fas fa-bullseye text-[#F59E0B] text-lg md:text-xl"></i>
                </div>
                <h3 class="font-bold text-lg md:text-xl text-slate-800 mb-3 md:mb-4">Misi</h3>
                <p class="text-slate-500 text-xs md:text-sm leading-relaxed font-light">
                    {{ $about->mission ?? 'Memberikan solusi produksi garmen berkualitas tinggi dengan harga kompetitif, membangun kemitraan jangka panjang, dan terus berinovasi.' }}
                </p>
            </div>

            <div class="bg-white border border-slate-100 rounded-[20px] md:rounded-3xl p-8 md:p-10 shadow-xl shadow-slate-200/50 hover:-translate-y-2 transition-transform text-center md:text-left sm:col-span-2 md:col-span-1">
                <div class="w-12 h-12 md:w-14 md:h-14 rounded-full bg-blue-50 flex items-center justify-center mb-5 md:mb-6 mx-auto md:mx-0">
                    <i class="fas fa-gem text-[#3B5998] text-lg md:text-xl"></i>
                </div>
                <h3 class="font-bold text-lg md:text-xl text-slate-800 mb-3 md:mb-4">Nilai Perusahaan</h3>
                <p class="text-slate-500 text-xs md:text-sm leading-relaxed font-light">
                    {{ $about->values ?? 'Integritas, Kualitas, Inovasi, dan Kepuasan Pelanggan. Kami berkomitmen untuk selalu memberikan yang terbaik.' }}
                </p>
            </div>
        </div>
    </section>

    <section class="py-16 md:py-24 px-4 md:px-20 bg-[#F8FAFC]">
        <div class="max-w-7xl mx-auto text-center mb-10 md:mb-16">
            <h2 class="text-3xl md:text-4xl font-black text-[#2D4373] mb-3 md:mb-4">Keunggulan Kami</h2>
            <p class="text-slate-500 font-light text-sm md:text-base max-w-2xl mx-auto">Mengapa ribuan klien mempercayai Ainun Konveksi untuk kebutuhan produksi mereka</p>
        </div>

        <div class="max-w-5xl mx-auto grid grid-cols-1 sm:grid-cols-2 gap-6 md:gap-8">
            @forelse($about->advantages ?? [] as $index => $adv)
            <div class="bg-white p-6 md:p-8 rounded-[20px] md:rounded-3xl shadow-lg border border-slate-100 flex flex-col sm:flex-row gap-4 sm:gap-6 items-center sm:items-start text-center sm:text-left hover:shadow-xl transition-shadow">
                <div class="w-12 h-12 rounded-xl bg-yellow-50 flex items-center justify-center shrink-0">
                    <i class="fas {{ ['fa-clock', 'fa-check-circle', 'fa-dollar-sign', 'fa-users'][$index % 4] }} text-yellow-500 text-lg"></i>
                </div>
                <div>
                    <h4 class="font-bold text-slate-800 mb-2">{{ $adv['title'] }}</h4>
                    <p class="text-slate-500 text-xs md:text-sm leading-relaxed font-light">{{ $adv['description'] }}</p>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center text-slate-400 italic text-sm md:text-base">Data Keunggulan Belum Diisi di CMS (Menu Halaman Tentang Kami).</div>
            @endforelse
        </div>
    </section>

    <footer class="bg-[#4A699C] py-16 md:py-20 px-6 md:px-20 border-t border-white/10 mt-10">
        <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 md:gap-16">
            
            <div>
                <h4 class="text-white text-xl md:text-2xl font-bold mb-6 md:mb-8 tracking-wide">Links Utama</h4>
                <ul class="space-y-4 md:space-y-5 text-white/80 font-medium text-base md:text-lg">
                    <li><a href="/#about" class="hover:text-yellow-400 transition-colors">Tentang Kami</a></li>
                    <li><a href="/project" class="hover:text-yellow-400 transition-colors">Portofolio</a></li>
                    <li><a href="/#services" class="hover:text-yellow-400 transition-colors">Layanan</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white text-xl md:text-2xl font-bold mb-6 md:mb-8 tracking-wide">Akun</h4>
                <ul class="space-y-4 md:space-y-5 text-white/80 font-medium text-base md:text-lg">
                    <li><a href="/login-custom" class="hover:text-yellow-400 transition-colors">Login Klien</a></li>
                    <li><a href="/register-custom" class="hover:text-yellow-400 transition-colors">Daftar Member</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white text-xl md:text-2xl font-bold mb-6 md:mb-8 tracking-wide">Informasi</h4>
                <ul class="space-y-4 md:space-y-5 text-white/80 font-medium text-base md:text-lg">
                    <li><a href="#" class="hover:text-yellow-400 transition-colors">Syarat & Ketentuan</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white text-xl md:text-2xl font-bold mb-6 md:mb-8 tracking-wide">Media Sosial</h4>
                <div class="flex gap-4">
                    <a href="#" class="w-10 h-10 md:w-12 md:h-12 bg-white rounded-full flex items-center justify-center text-[#4A699C] hover:bg-yellow-400 hover:text-white transition-all shadow-lg transform hover:-translate-y-1">
                        <i class="fab fa-facebook-f text-lg md:text-xl"></i>
                    </a>
                    <a href="#" class="w-10 h-10 md:w-12 md:h-12 bg-white rounded-full flex items-center justify-center text-[#4A699C] hover:bg-yellow-400 hover:text-white transition-all shadow-lg transform hover:-translate-y-1">
                        <i class="fab fa-instagram text-lg md:text-xl"></i>
                    </a>
                    <a href="#" class="w-10 h-10 md:w-12 md:h-12 bg-white rounded-full flex items-center justify-center text-[#4A699C] hover:bg-yellow-400 hover:text-white transition-all shadow-lg transform hover:-translate-y-1">
                        <i class="fab fa-twitter text-lg md:text-xl"></i>
                    </a>
                </div>
            </div>

        </div>
        
        <div class="max-w-7xl mx-auto border-t border-white/20 mt-12 md:mt-16 pt-8 text-center text-white/80 text-xs md:text-sm font-medium">
            &copy; 2026 Ainun Konveksi. All rights reserved.
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const mobileBtn = document.getElementById('mobile-menu-btn');
            const closeBtn = document.getElementById('close-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            if(mobileBtn && closeBtn && mobileMenu) {
                mobileBtn.addEventListener('click', () => {
                    mobileMenu.classList.remove('translate-x-full');
                });

                closeBtn.addEventListener('click', () => {
                    mobileMenu.classList.add('translate-x-full');
                });
            }
        });
    </script>
</body>
</html>