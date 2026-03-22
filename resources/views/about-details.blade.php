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

    <header class="relative pt-32 pb-40 px-6 flex flex-col items-center justify-center text-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            @if(isset($landing) && $landing->hero_image)
                <img src="{{ asset('storage/' . $landing->hero_image) }}" class="w-full h-full object-cover" alt="Background">
            @else
                <div class="w-full h-full bg-slate-900"></div>
            @endif
            <div class="absolute inset-0 hero-overlay"></div>
        </div>

        <div class="relative z-10">
            <div class="flex items-center justify-center gap-2 text-white/70 text-sm font-medium mb-6 uppercase tracking-widest">
                <a href="/" class="hover:text-yellow-400 transition-colors">Home</a>
                <i class="fas fa-chevron-right text-[10px]"></i>
                <span class="text-white">Tentang Kami</span>
            </div>
            
            <h1 class="text-5xl md:text-6xl font-black text-white mb-4 tracking-tight drop-shadow-lg">
                Tentang Ainun Konveksi
            </h1>
            <p class="text-lg md:text-xl text-white/90 font-light tracking-wide max-w-2xl mx-auto">
                {{ $about->subtitle ?? 'Partner Terpercaya dalam Industri Garmen Indonesia Sejak 2015' }}
            </p>
        </div>
    </header>

    <section class="max-w-7xl mx-auto px-6 md:px-12 -mt-20 relative z-20 mb-24">
        <div class="bg-white rounded-[40px] shadow-2xl p-8 md:p-16 flex flex-col lg:flex-row gap-12 items-center border border-slate-100">
            
            <div class="w-full lg:w-5/12 h-[400px] rounded-3xl overflow-hidden shadow-lg">
                @if(isset($about) && $about->image)
                    <img src="{{ asset('storage/' . $about->image) }}" class="w-full h-full object-cover" alt="Perjalanan Kami">
                @else
                    <div class="w-full h-full bg-slate-200 flex items-center justify-center text-slate-400 text-center px-6">Gambar Perjalanan Belum Diupload di CMS</div>
                @endif
            </div>

            <div class="w-full lg:w-7/12">
                <h2 class="text-3xl font-black text-[#2D4373] mb-6">
                    {{ $about->history_title ?? 'Perjalanan Kami' }}
                </h2>
                <div class="text-slate-600 leading-relaxed font-light space-y-4 mb-8 text-sm md:text-base">
                    @if(isset($about) && $about->history_text)
                        {!! nl2br(e($about->history_text)) !!}
                    @else
                        <p>Silakan isi teks perjalanan sejarah perusahaan di menu Halaman Tentang Kami pada panel Admin Filament.</p>
                    @endif
                </div>

                <a href="/#contact-order" class="inline-flex items-center gap-3 bg-[#F59E0B] hover:bg-yellow-400 text-white font-bold px-8 py-4 rounded-2xl shadow-xl shadow-yellow-500/30 transition-transform hover:-translate-y-1">
                    <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center">
                        <i class="fas fa-headset text-sm"></i>
                    </div>
                    <div class="text-left">
                        <span class="block text-sm">Konsultasi & Penawaran Gratis</span>
                        <span class="block text-[10px] font-medium opacity-80">Hubungi kami untuk mendiskusikan kebutuhan produksi Anda</span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="py-20 px-6 md:px-20 bg-white">
        <div class="max-w-7xl mx-auto text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-black text-[#2D4373] mb-4">Visi, Misi & Nilai Kami</h2>
            <p class="text-slate-500 font-light">Fondasi yang membimbing setiap keputusan dan tindakan kami</p>
        </div>

        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white border border-slate-100 rounded-3xl p-10 shadow-xl shadow-slate-200/50 hover:-translate-y-2 transition-transform">
                <div class="w-14 h-14 rounded-full bg-blue-50 flex items-center justify-center mb-6">
                    <i class="fas fa-eye text-[#3B5998] text-xl"></i>
                </div>
                <h3 class="font-bold text-xl text-slate-800 mb-4">Visi</h3>
                <p class="text-slate-500 text-sm leading-relaxed font-light">
                    {{ $about->vision ?? 'Menjadi perusahaan konveksi terdepan di Indonesia yang dikenal akan kualitas produk, inovasi, dan pelayanan prima kepada setiap klien.' }}
                </p>
            </div>
            
            <div class="bg-white border border-slate-100 rounded-3xl p-10 shadow-xl shadow-slate-200/50 hover:-translate-y-2 transition-transform">
                <div class="w-14 h-14 rounded-full bg-yellow-50 flex items-center justify-center mb-6">
                    <i class="fas fa-bullseye text-[#F59E0B] text-xl"></i>
                </div>
                <h3 class="font-bold text-xl text-slate-800 mb-4">Misi</h3>
                <p class="text-slate-500 text-sm leading-relaxed font-light">
                    {{ $about->mission ?? 'Memberikan solusi produksi garmen berkualitas tinggi dengan harga kompetitif, membangun kemitraan jangka panjang, dan terus berinovasi.' }}
                </p>
            </div>

            <div class="bg-white border border-slate-100 rounded-3xl p-10 shadow-xl shadow-slate-200/50 hover:-translate-y-2 transition-transform">
                <div class="w-14 h-14 rounded-full bg-blue-50 flex items-center justify-center mb-6">
                    <i class="fas fa-gem text-[#3B5998] text-xl"></i>
                </div>
                <h3 class="font-bold text-xl text-slate-800 mb-4">Nilai Perusahaan</h3>
                <p class="text-slate-500 text-sm leading-relaxed font-light">
                    {{ $about->values ?? 'Integritas, Kualitas, Inovasi, dan Kepuasan Pelanggan. Kami berkomitmen untuk selalu memberikan yang terbaik.' }}
                </p>
            </div>
        </div>
    </section>

    <section class="py-24 px-6 md:px-20 bg-[#F8FAFC]">
        <div class="max-w-7xl mx-auto text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-black text-[#2D4373] mb-4">Keunggulan Kami</h2>
            <p class="text-slate-500 font-light">Mengapa ribuan klien mempercayai Ainun Konveksi untuk kebutuhan produksi mereka</p>
        </div>

        <div class="max-w-5xl mx-auto grid grid-cols-1 sm:grid-cols-2 gap-8">
            @forelse($about->advantages ?? [] as $index => $adv)
            <div class="bg-white p-8 rounded-3xl shadow-lg border border-slate-100 flex gap-6 items-start hover:shadow-xl transition-shadow">
                <div class="w-12 h-12 rounded-xl bg-yellow-50 flex items-center justify-center shrink-0">
                    <i class="fas {{ ['fa-clock', 'fa-check-circle', 'fa-dollar-sign', 'fa-users'][$index % 4] }} text-yellow-500 text-lg"></i>
                </div>
                <div>
                    <h4 class="font-bold text-slate-800 mb-2">{{ $adv['title'] }}</h4>
                    <p class="text-slate-500 text-sm leading-relaxed font-light">{{ $adv['description'] }}</p>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center text-slate-400 italic">Data Keunggulan Belum Diisi di CMS (Menu Halaman Tentang Kami).</div>
            @endforelse
        </div>
    </section>

    <footer class="bg-[#4A699C] py-20 px-6 md:px-20 border-t border-white/10">
        <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12 md:gap-16">
            
            <div>
                <h4 class="text-white text-2xl font-bold mb-8 tracking-wide">Links</h4>
                <ul class="space-y-5 text-white/80 font-medium text-lg">
                    <li><a href="/#about" class="hover:text-yellow-400 transition-colors">About us</a></li>
                    <li><a href="/#product" class="hover:text-yellow-400 transition-colors">Categories</a></li>
                    <li><a href="/#services" class="hover:text-yellow-400 transition-colors">Services List</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white text-2xl font-bold mb-8 tracking-wide">Account</h4>
                <ul class="space-y-5 text-white/80 font-medium text-lg">
                    <li><a href="/admin/login" class="hover:text-yellow-400 transition-colors">Login</a></li>
                    <li><a href="/admin/register" class="hover:text-yellow-400 transition-colors">Register</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white text-2xl font-bold mb-8 tracking-wide">Legal</h4>
                <ul class="space-y-5 text-white/80 font-medium text-lg">
                    <li><a href="#" class="hover:text-yellow-400 transition-colors">Terms and conditions</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white text-2xl font-bold mb-8 tracking-wide">Social Links</h4>
                <div class="flex gap-4">
                    <a href="#" class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-[#4A699C] hover:bg-yellow-400 hover:text-white transition-all shadow-lg transform hover:-translate-y-1">
                        <i class="fab fa-facebook-f text-xl"></i>
                    </a>
                    <a href="#" class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-[#4A699C] hover:bg-yellow-400 hover:text-white transition-all shadow-lg transform hover:-translate-y-1">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="#" class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-[#4A699C] hover:bg-yellow-400 hover:text-white transition-all shadow-lg transform hover:-translate-y-1">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                </div>
            </div>

        </div>
        
        <div class="max-w-7xl mx-auto border-t border-white/20 mt-16 pt-8 text-center text-white/60 text-sm font-medium">
            &copy; 2026 Ainun Konveksi. All rights reserved.
        </div>
    </footer>

</body>
</html>