<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project & Portofolio | {{ $data->hero_title ?? 'Ainun Konveksi' }}</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; scroll-behavior: smooth; }
        h1, h2, h3, h4 { font-family: 'Poppins', sans-serif; }
        .hero-gradient {
            background: linear-gradient(to bottom, rgba(45, 67, 115, 0.8) 0%, rgba(15, 23, 42, 0.9) 100%);
        }
        /* Animasi untuk filter project */
        .project-card { transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); }
        .project-card.hide { opacity: 0; transform: scale(0.95); pointer-events: none; position: absolute; visibility: hidden; }
        .project-card.show { opacity: 1; transform: scale(1); visibility: visible; position: relative; }
    </style>
</head>
<body class="bg-[#F8FAFC] text-slate-900 antialiased">

    <div class="bg-[#2D4373] text-white/90 text-[11px] py-2.5 px-6 md:px-20 flex justify-between items-center tracking-wide relative z-50">
        <div class="flex items-center gap-8">
            <span class="flex items-center gap-2 hover:text-white transition">
                <i class="far fa-clock text-yellow-400"></i>
                {{ $data->opening_hours ?? 'Mon-Fri: 9AM - 5PM' }}
            </span>
            <span class="flex items-center gap-2 hover:text-white transition">
                <i class="fas fa-phone-alt text-yellow-400"></i>
                {{ $data->phone ?? '(205) 484-9624' }}
            </span>
        </div>
    </div>

    <nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-100 px-6 md:px-20 py-4 flex justify-between items-center transition-all shadow-sm">
        <a href="/" class="flex items-center gap-3 group cursor-pointer">
            <div class="w-12 h-12 bg-[#3B5998] rounded-2xl flex items-center justify-center shadow-xl shadow-blue-900/20 transform group-hover:rotate-6 transition-all">
                <span class="text-white font-black text-lg italic tracking-tighter">ainun</span>
            </div>
            <span class="font-extrabold text-xl tracking-tight text-[#2D4373]">KONVEKSI</span>
        </a>

        <div class="hidden md:flex items-center gap-8 text-[13px] font-semibold tracking-wide">
            <div id="nav-links" class="flex items-center gap-8">
                <a href="/" class="nav-link text-slate-500 hover:text-yellow-600 transition-colors">Home</a>
                <a href="/project" class="nav-link text-yellow-600 border-b-2 border-yellow-500 pb-1 transition-colors">Project</a>
                <a href="/#about" class="nav-link text-slate-500 hover:text-yellow-600 transition-colors">About us</a>
                <a href="/#contact-order" class="nav-link text-slate-500 hover:text-yellow-600 transition-colors">Contact</a>
            </div>

            <div class="w-px h-5 bg-slate-300"></div>

            <div class="flex items-center gap-4">
                <a href="/#contact-order" class="bg-[#F8FAFC] border border-slate-200 text-[#2D4373] hover:border-yellow-500 hover:bg-yellow-50 px-5 py-1.5 rounded-full transition-all">
                    Pesan Sekarang
                </a>
            </div>
        </div>
    </nav>

    <header class="relative h-[45vh] md:h-[55vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1556905055-8f358a7a47b2?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" class="w-full h-full object-cover scale-105 filter grayscale-[30%]" alt="Project Hero">
            <div class="absolute inset-0 hero-gradient"></div>
        </div>
        
        <div class="relative z-10 text-center px-6 max-w-4xl mt-10">
            <span class="text-yellow-400 font-bold tracking-[0.3em] uppercase text-xs md:text-sm mb-4 block">Portofolio Kami</span>
            <h1 class="text-white text-4xl md:text-6xl font-black uppercase tracking-tighter mb-4 leading-tight drop-shadow-2xl">
                Hasil Karya <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-600">Terbaik</span> Kami
            </h1>
            <p class="text-white/80 text-sm md:text-base max-w-2xl mx-auto leading-relaxed font-light tracking-wide">
                Jelajahi berbagai koleksi seragam, kaos, dan garmen berkualitas tinggi yang telah kami produksi untuk ratusan klien dan perusahaan.
            </p>
        </div>
    </header>

    <section class="py-20 px-6 md:px-20 max-w-7xl mx-auto min-h-screen">
        
        <div class="flex flex-wrap justify-center gap-3 mb-16" id="filter-container">
            <button class="filter-btn active bg-[#2D4373] text-white px-6 py-2.5 rounded-full text-xs font-bold uppercase tracking-widest shadow-lg transition-all" data-filter="all">
                Semua
            </button>
            <button class="filter-btn bg-white border border-slate-200 text-slate-600 hover:border-yellow-500 hover:text-[#2D4373] px-6 py-2.5 rounded-full text-xs font-bold uppercase tracking-widest transition-all" data-filter="seragam">
                Seragam Kerja
            </button>
            <button class="filter-btn bg-white border border-slate-200 text-slate-600 hover:border-yellow-500 hover:text-[#2D4373] px-6 py-2.5 rounded-full text-xs font-bold uppercase tracking-widest transition-all" data-filter="kaos">
                Kaos & Polo
            </button>
            <button class="filter-btn bg-white border border-slate-200 text-slate-600 hover:border-yellow-500 hover:text-[#2D4373] px-6 py-2.5 rounded-full text-xs font-bold uppercase tracking-widest transition-all" data-filter="jaket">
                Jaket & Hoodie
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10" id="project-grid">
            
            @forelse($projects ?? [] as $item)
            <div class="project-card show group cursor-pointer" data-category="{{ $item->category }}">
                <div class="bg-white rounded-[30px] p-4 shadow-xl shadow-slate-200/50 border border-slate-100 hover:-translate-y-2 transition-transform duration-500">
                    <div class="w-full h-64 rounded-[20px] overflow-hidden relative">
                        <div class="absolute inset-0 bg-black/40 z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <span class="bg-yellow-500 text-white w-12 h-12 rounded-full flex items-center justify-center transform scale-0 group-hover:scale-100 transition-transform duration-500 delay-100 shadow-xl">
                                <i class="fas fa-search text-xl"></i>
                            </span>
                        </div>
                        <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="{{ $item->title }}">
                    </div>
                    <div class="p-4 mt-2">
                        <span class="text-xs font-black text-yellow-500 uppercase tracking-widest mb-2 block">
                            {{ $item->category == 'seragam' ? 'Seragam Kerja' : ($item->category == 'kaos' ? 'Kaos & Polo' : 'Jaket & Hoodie') }}
                        </span>
                        <h3 class="font-bold text-[#2D4373] text-xl mb-1 tracking-tight group-hover:text-yellow-600 transition-colors">
                            {{ $item->title }}
                        </h3>
                        <p class="text-slate-500 text-sm">{{ $item->client }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center text-slate-400 italic py-10">Belum ada portofolio yang ditambahkan di Admin Panel.</div>
            @endforelse
            
        </div>
    </section>

    <section class="py-20 bg-[#2D4373] relative overflow-hidden">
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#3B5998] rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>
        <div class="absolute -bottom-24 -left-24 w-72 h-72 bg-yellow-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>

        <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
            <h2 class="text-3xl md:text-5xl font-black text-white mb-6">Tertarik Membuat Project Serupa?</h2>
            <p class="text-white/80 text-lg mb-10 max-w-2xl mx-auto font-light">
                Konsultasikan desain, bahan, dan kebutuhan Anda bersama tim ahli kami. Dapatkan penawaran terbaik hari ini!
            </p>
            <a href="/#contact-order" class="inline-block bg-yellow-500 hover:bg-yellow-400 text-[#2D4373] font-black px-12 py-4 rounded-full shadow-2xl transition-transform hover:-translate-y-1 uppercase text-sm tracking-widest">
                Mulai Konsultasi Gratis
            </a>
        </div>
    </section>

    <footer class="bg-[#4A699C] py-20 px-6 md:px-20 border-t border-white/10">
        <div class="max-w-7xl mx-auto text-center text-white/60 text-sm font-medium">
            &copy; 2026 Ainun Konveksi. All rights reserved.
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const projectCards = document.querySelectorAll('.project-card');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    // 1. Remove active state dari semua button
                    filterBtns.forEach(b => {
                        b.classList.remove('bg-[#2D4373]', 'text-white', 'shadow-lg');
                        b.classList.add('bg-white', 'text-slate-600');
                    });

                    // 2. Add active state ke button yang diklik
                    btn.classList.remove('bg-white', 'text-slate-600');
                    btn.classList.add('bg-[#2D4373]', 'text-white', 'shadow-lg');

                    // 3. Filter logic
                    const filterValue = btn.getAttribute('data-filter');

                    projectCards.forEach(card => {
                        if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
                            card.classList.remove('hide');
                            card.classList.add('show');
                        } else {
                            card.classList.remove('show');
                            card.classList.add('hide');
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>