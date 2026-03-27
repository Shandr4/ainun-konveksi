<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Kami | Ainun Konveksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #F8FAFC; }
        h1, h2, h3, h4, h5 { font-family: 'Poppins', sans-serif; }
        .hero-overlay { background: linear-gradient(to bottom, rgba(45, 67, 115, 0.8), rgba(20, 30, 55, 0.9)); }
    </style>
</head>
<body class="antialiased text-slate-800">

    <nav class="bg-white border-b border-slate-100 px-4 md:px-20 py-3 md:py-4 flex justify-between items-center transition-all sticky top-0 z-50 shadow-sm">
        <a href="/" class="flex items-center gap-2 md:gap-3 cursor-pointer">
            <div class="w-8 h-8 md:w-10 md:h-10 bg-[#3B5998] rounded-lg md:rounded-xl flex items-center justify-center shadow-lg">
                <span class="text-white font-black text-sm md:text-base italic tracking-tighter">a</span>
            </div>
            <span class="font-extrabold text-base md:text-lg tracking-tight text-[#2D4373]">AINUN KONVEKSI</span>
        </a>
        <a href="/" class="text-[11px] md:text-[13px] font-semibold text-slate-500 hover:text-yellow-600 transition-colors flex items-center gap-1.5 md:gap-2 bg-slate-50 md:bg-transparent px-3 py-1.5 md:px-0 md:py-0 rounded-full md:rounded-none">
            <i class="fas fa-arrow-left"></i> <span class="hidden sm:inline">Kembali ke Beranda</span><span class="sm:hidden">Kembali</span>
        </a>
    </nav>

    <header class="relative py-24 md:py-32 px-4 md:px-6 flex flex-col items-center justify-center text-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            @if(isset($service) && $service->hero_image)
                <img src="{{ asset('storage/' . $service->hero_image) }}" class="w-full h-full object-cover" alt="Layanan Kami">
            @else
                <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" class="w-full h-full object-cover" alt="Default Hero">
            @endif
            <div class="absolute inset-0 hero-overlay"></div>
        </div>

        <div class="relative z-10 max-w-3xl mx-auto px-2">
            <h1 class="text-3xl sm:text-4xl md:text-6xl font-black text-white mb-4 md:mb-6 tracking-tight drop-shadow-lg">
                {{ $service->hero_title ?? 'Layanan Konveksi Ainun' }}
            </h1>
            <p class="text-sm md:text-lg text-white/90 font-light tracking-wide max-w-xl mx-auto">
                {{ $service->hero_subtitle ?? 'Solusi Produksi Pakaian Berkualitas untuk Brand, Perusahaan, dan Komunitas' }}
            </p>
        </div>
    </header>

    <section class="py-16 md:py-24 px-4 md:px-20 bg-slate-50">
        <div class="max-w-7xl mx-auto text-center mb-10 md:mb-16">
            <h2 class="text-3xl md:text-4xl font-black text-[#4A699C] mb-3 md:mb-4">Layanan Konveksi Ainun</h2>
            <p class="text-slate-600 font-medium text-sm md:text-base">Berikut adalah berbagai layanan produksi pakaian yang kami tawarkan</p>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            @forelse($service->detailed_services ?? [1, 2, 3, 4] as $index => $item)
                @php
                    $bgColor = ($index % 2 == 0) ? 'bg-[#4A699C]' : 'bg-[#FCA311]';
                    $title = is_array($item) ? $item['title'] : 'Produksi Seragam';
                    $desc = is_array($item) ? $item['description'] : 'Produksi seragam berkualitas untuk sekolah, perusahaan, dan organisasi dengan berbagai pilihan bahan.';
                    $image = is_array($item) && isset($item['image']) ? asset('storage/' . $item['image']) : null;
                @endphp

                <div class="bg-white rounded-[20px] md:rounded-[24px] shadow-lg border border-slate-100 overflow-hidden hover:-translate-y-2 transition-transform duration-300 flex flex-col">
                    <div class="h-32 md:h-40 w-full {{ $bgColor }} flex items-center justify-center relative overflow-hidden">
                        @if($image)
                            <img src="{{ $image }}" class="absolute inset-0 w-full h-full object-cover mix-blend-overlay opacity-60">
                        @else
                            <span class="text-white/60 font-medium text-xs md:text-sm">Gambar Layanan</span>
                        @endif
                    </div>
                    
                    <div class="p-6 md:p-8 text-center flex flex-col flex-1">
                        <h3 class="text-[#4A699C] font-bold text-base md:text-lg mb-2 md:mb-3">{{ $title }}</h3>
                        <p class="text-xs text-slate-500 leading-relaxed mb-5 md:mb-6 flex-1">
                            {{ $desc }}
                        </p>
                        <a href="/#contact-order" class="inline-block w-full border border-[#FCA311] text-[#FCA311] hover:bg-[#FCA311] hover:text-white rounded-full py-2 md:py-2.5 text-[10px] md:text-[11px] font-bold uppercase tracking-widest transition-colors">
                            Pesan Sekarang
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-10 text-slate-400 text-sm md:text-base">Data layanan belum ditambahkan di CMS.</div>
            @endforelse
        </div>
    </section>

    <section class="py-16 md:py-24 px-4 md:px-20 bg-white overflow-hidden">
        <div class="max-w-5xl mx-auto text-center mb-12 md:mb-20">
            <h2 class="text-3xl md:text-4xl font-black text-[#4A699C] mb-3 md:mb-4">Cara Kerja</h2>
            <p class="text-slate-600 font-medium text-sm md:text-base">Proses Sederhana dan mudah untuk mewujudkan produk pakaian Anda</p>
        </div>

        <div class="max-w-4xl mx-auto relative">
            <div class="hidden md:block absolute top-[2.5rem] left-[10%] right-[10%] h-[2px] bg-slate-200 z-0"></div>

            <div class="flex flex-col md:flex-row justify-between items-center md:items-start gap-10 md:gap-12 relative z-10">
                
                <div class="flex flex-col items-center text-center max-w-[250px] bg-white px-4">
                    <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-[#FCA311] text-white flex items-center justify-center text-2xl md:text-3xl font-black mb-4 md:mb-6 shadow-xl shadow-orange-500/20 border-4 border-white">1</div>
                    <h4 class="font-bold text-[#4A699C] text-base md:text-lg mb-2">Konsultasi</h4>
                    <p class="text-xs text-slate-500 leading-relaxed">Diskusi kebutuhan dan spesifikasi produk yang Anda inginkan</p>
                </div>
                
                <div class="hidden md:hidden sm:flex items-center justify-center w-full h-8"><div class="h-full w-[2px] bg-slate-200"></div></div>

                <div class="flex flex-col items-center text-center max-w-[250px] bg-white px-4">
                    <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-[#FCA311] text-white flex items-center justify-center text-2xl md:text-3xl font-black mb-4 md:mb-6 shadow-xl shadow-orange-500/20 border-4 border-white">2</div>
                    <h4 class="font-bold text-[#4A699C] text-base md:text-lg mb-2">Produksi</h4>
                    <p class="text-xs text-slate-500 leading-relaxed">Proses produksi dengan standar kualitas tinggi</p>
                </div>
                
                <div class="hidden md:hidden sm:flex items-center justify-center w-full h-8"><div class="h-full w-[2px] bg-slate-200"></div></div>

                <div class="flex flex-col items-center text-center max-w-[250px] bg-white px-4">
                    <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-[#FCA311] text-white flex items-center justify-center text-2xl md:text-3xl font-black mb-4 md:mb-6 shadow-xl shadow-orange-500/20 border-4 border-white">3</div>
                    <h4 class="font-bold text-[#4A699C] text-base md:text-lg mb-2">Pengiriman</h4>
                    <p class="text-xs text-slate-500 leading-relaxed">Pengiriman produk tepat waktu ke lokasi Anda</p>
                </div>

            </div>
        </div>
    </section>

    <section id="cta-box" class="pb-16 md:pb-24 px-4 md:px-20 bg-white">
        <div class="max-w-5xl mx-auto bg-[#4A699C] rounded-[30px] md:rounded-[40px] p-8 md:p-20 text-center shadow-2xl relative overflow-hidden">
            <div class="absolute -top-10 -right-10 md:-top-20 md:-right-20 w-40 h-40 md:w-64 md:h-64 border-[15px] md:border-[30px] border-white/5 rounded-full"></div>
            <div class="absolute -bottom-10 -left-10 md:-bottom-20 md:-left-20 w-24 h-24 md:w-40 md:h-40 border-[10px] md:border-[20px] border-white/5 rounded-full"></div>

            <div class="relative z-10">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-white mb-3 md:mb-4">Siap Memulai Proyek Anda?</h2>
                <p class="text-white/80 font-light mb-8 md:mb-10 max-w-2xl mx-auto text-xs sm:text-sm md:text-base leading-relaxed px-4">
                    Hubungi kami sekarang untuk konsultasi gratis dan dapatkan penawaran terbaik untuk kebutuhan produksi pakaian Anda.
                </p>
                <a href="/#contact-order" class="inline-flex items-center justify-center gap-2 md:gap-3 bg-[#FCA311] hover:bg-yellow-400 text-white font-bold px-6 md:px-10 py-3 md:py-4 rounded-xl shadow-xl transition-transform hover:-translate-y-1 w-[80%] sm:w-auto text-sm md:text-base">
                    <i class="far fa-comments text-base md:text-lg"></i>
                    <span class="tracking-wide">Konsultasi Sekarang</span>
                </a>
            </div>
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

</body>
</html>