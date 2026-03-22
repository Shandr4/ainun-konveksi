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

    <nav class="bg-white border-b border-slate-100 px-6 md:px-20 py-4 flex justify-between items-center transition-all sticky top-0 z-50">
        <div class="flex items-center gap-3 cursor-pointer">
            <div class="w-10 h-10 bg-[#3B5998] rounded-xl flex items-center justify-center shadow-lg">
                <span class="text-white font-black text-base italic tracking-tighter">a</span>
            </div>
            <span class="font-extrabold text-lg tracking-tight text-[#2D4373]">AINUN KONVEKSI</span>
        </div>
        <a href="/" class="text-[13px] font-semibold text-slate-500 hover:text-yellow-600 transition-colors flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Kembali ke Beranda
        </a>
    </nav>

    <header class="relative py-32 px-6 flex flex-col items-center justify-center text-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            @if(isset($service) && $service->hero_image)
                <img src="{{ asset('storage/' . $service->hero_image) }}" class="w-full h-full object-cover" alt="Layanan Kami">
            @else
                <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" class="w-full h-full object-cover" alt="Default Hero">
            @endif
            <div class="absolute inset-0 hero-overlay"></div>
        </div>

        <div class="relative z-10 max-w-3xl mx-auto">
            <h1 class="text-4xl md:text-6xl font-black text-white mb-6 tracking-tight drop-shadow-lg">
                {{ $service->hero_title ?? 'Layanan Konveksi Ainun' }}
            </h1>
            <p class="text-lg text-white/90 font-light tracking-wide">
                {{ $service->hero_subtitle ?? 'Solusi Produksi Pakaian Berkualitas untuk Brand, Perusahaan, dan Komunitas' }}
            </p>
        </div>
    </header>

    <section class="py-24 px-6 md:px-20 bg-slate-50">
        <div class="max-w-7xl mx-auto text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-black text-[#4A699C] mb-4">Layanan Konveksi Ainun</h2>
            <p class="text-slate-600 font-medium">Berikut adalah berbagai layanan produksi pakaian yang kami tawarkan</p>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($service->detailed_services ?? [1, 2, 3, 4] as $index => $item)
                @php
                    // Logika warna selang-seling (Biru - Kuning - Biru - Kuning)
                    $bgColor = ($index % 2 == 0) ? 'bg-[#4A699C]' : 'bg-[#FCA311]';
                    
                    // Kalau data belum diisi dari CMS, kita pakai data dummy sesuai desain
                    $title = is_array($item) ? $item['title'] : 'Produksi Seragam';
                    $desc = is_array($item) ? $item['description'] : 'Produksi seragam berkualitas untuk sekolah, perusahaan, dan organisasi dengan berbagai pilihan bahan.';
                    $image = is_array($item) && isset($item['image']) ? asset('storage/' . $item['image']) : null;
                @endphp

                <div class="bg-white rounded-[24px] shadow-lg border border-slate-100 overflow-hidden hover:-translate-y-2 transition-transform duration-300 flex flex-col">
                    
                    <div class="h-40 w-full {{ $bgColor }} flex items-center justify-center relative overflow-hidden">
                        @if($image)
                            <img src="{{ $image }}" class="absolute inset-0 w-full h-full object-cover mix-blend-overlay opacity-60">
                        @else
                            <span class="text-white/60 font-medium text-sm">image</span>
                        @endif
                    </div>
                    
                    <div class="p-8 text-center flex flex-col flex-1">
                        <h3 class="text-[#4A699C] font-bold text-lg mb-3">{{ $title }}</h3>
                        <p class="text-xs text-slate-500 leading-relaxed mb-6 flex-1">
                            {{ $desc }}
                        </p>
                        <a href="#cta-box" class="inline-block w-full border border-[#FCA311] text-[#FCA311] hover:bg-[#FCA311] hover:text-white rounded-full py-2.5 text-[11px] font-bold uppercase tracking-widest transition-colors">
                            Detail Layanan
                        </a>
                    </div>

                </div>
            @empty
                <div class="col-span-full text-center py-10 text-slate-400">Data layanan belum ditambahkan di CMS.</div>
            @endforelse
        </div>
    </section>

    <section class="py-24 px-6 md:px-20 bg-white overflow-hidden">
        <div class="max-w-5xl mx-auto text-center mb-20">
            <h2 class="text-3xl md:text-4xl font-black text-[#4A699C] mb-4">Cara Kerja</h2>
            <p class="text-slate-600 font-medium">Proses Sederhana dan mudah untuk mewujudkan produk pakaian Anda</p>
        </div>

        <div class="max-w-4xl mx-auto relative">
            <div class="hidden md:block absolute top-[2.5rem] left-[10%] right-[10%] h-[2px] bg-slate-200 z-0"></div>

            <div class="flex flex-col md:flex-row justify-between items-center md:items-start gap-12 relative z-10">
                
                <div class="flex flex-col items-center text-center max-w-[250px] bg-white px-4">
                    <div class="w-20 h-20 rounded-full bg-[#FCA311] text-white flex items-center justify-center text-3xl font-black mb-6 shadow-xl shadow-orange-500/20 border-4 border-white">
                        1
                    </div>
                    <h4 class="font-bold text-[#4A699C] text-lg mb-2">Konsultasi</h4>
                    <p class="text-xs text-slate-500 leading-relaxed">Diskusi kebutuhan dan spesifikasi produk yang Anda inginkan</p>
                </div>

                <div class="flex flex-col items-center text-center max-w-[250px] bg-white px-4">
                    <div class="w-20 h-20 rounded-full bg-[#FCA311] text-white flex items-center justify-center text-3xl font-black mb-6 shadow-xl shadow-orange-500/20 border-4 border-white">
                        2
                    </div>
                    <h4 class="font-bold text-[#4A699C] text-lg mb-2">Produksi</h4>
                    <p class="text-xs text-slate-500 leading-relaxed">Proses produksi dengan standar kualitas tinggi</p>
                </div>

                <div class="flex flex-col items-center text-center max-w-[250px] bg-white px-4">
                    <div class="w-20 h-20 rounded-full bg-[#FCA311] text-white flex items-center justify-center text-3xl font-black mb-6 shadow-xl shadow-orange-500/20 border-4 border-white">
                        3
                    </div>
                    <h4 class="font-bold text-[#4A699C] text-lg mb-2">Pengiriman</h4>
                    <p class="text-xs text-slate-500 leading-relaxed">Pengiriman produk tepat waktu ke lokasi Anda</p>
                </div>

            </div>
        </div>
    </section>

    <section id="cta-box" class="pb-24 px-6 md:px-20 bg-white">
        <div class="max-w-5xl mx-auto bg-[#4A699C] rounded-[40px] p-12 md:p-20 text-center shadow-2xl relative overflow-hidden">
            <div class="absolute -top-20 -right-20 w-64 h-64 border-[30px] border-white/5 rounded-full"></div>
            <div class="absolute -bottom-20 -left-20 w-40 h-40 border-[20px] border-white/5 rounded-full"></div>

            <div class="relative z-10">
                <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Siap Memulai Proyek Anda?</h2>
                <p class="text-white/80 font-light mb-10 max-w-2xl mx-auto text-sm md:text-base leading-relaxed">
                    Hubungi kami sekarang untuk konsultasi gratis dan dapatkan penawaran terbaik untuk kebutuhan produksi pakaian Anda.
                </p>
                <a href="/#contact-order" class="inline-flex items-center gap-3 bg-[#FCA311] hover:bg-yellow-400 text-white font-bold px-10 py-4 rounded-xl shadow-xl transition-transform hover:-translate-y-1">
                    <i class="far fa-comments text-lg"></i>
                    <span class="tracking-wide">Konsultasi Sekarang</span>
                </a>
            </div>
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
                    <a href="#" class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-[#4A699C] hover:bg-yellow-400 hover:text-white transition-all shadow-lg transform hover:-translate-y-1"><i class="fab fa-facebook-f text-xl"></i></a>
                    <a href="#" class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-[#4A699C] hover:bg-yellow-400 hover:text-white transition-all shadow-lg transform hover:-translate-y-1"><i class="fab fa-instagram text-xl"></i></a>
                    <a href="#" class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-[#4A699C] hover:bg-yellow-400 hover:text-white transition-all shadow-lg transform hover:-translate-y-1"><i class="fab fa-twitter text-xl"></i></a>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto border-t border-white/20 mt-16 pt-8 text-center text-white/60 text-sm font-medium">
            &copy; 2026 Ainun Konveksi. All rights reserved.
        </div>
    </footer>

</body>
</html>