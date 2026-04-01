<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karir | Anjaya Konveksi</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; scroll-behavior: smooth; }
        h1, h2, h3, h4 { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-[#F8FAFC] text-slate-900 antialiased flex flex-col min-h-screen">

    <nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-100 px-6 py-4 flex justify-between items-center shadow-sm">
        <a href="/" class="flex items-center gap-3 group cursor-pointer">
            <div class="w-10 h-10 bg-[#3B5998] rounded-xl flex items-center justify-center shadow-lg transform group-hover:rotate-6 transition-all">
                <span class="text-white font-black text-base italic tracking-tighter">Anjaya</span>
            </div>
            <span class="font-extrabold text-lg tracking-tight text-[#2D4373] hidden sm:block">KONVEKSI</span>
        </a>
        <a href="/" class="bg-slate-100 hover:bg-slate-200 text-[#2D4373] font-bold px-5 py-2 rounded-full transition-colors text-xs sm:text-sm">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Home
        </a>
    </nav>

    <header class="bg-[#2D4373] py-16 md:py-20 text-center relative overflow-hidden shadow-inner">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative z-10 px-4">
            <h1 class="text-3xl md:text-5xl font-black text-white mb-4 uppercase tracking-widest drop-shadow-lg">Karir & Peluang</h1>
            <p class="text-white/80 max-w-2xl mx-auto text-sm md:text-base font-light leading-relaxed">
                Tumbuh dan berkembang bersama <span class="font-bold text-yellow-400">Anjaya Konveksi</span>. Temukan posisi yang tepat untuk keahlianmu di bawah ini.
            </p>
        </div>
    </header>

    <main class="flex-grow py-16 px-4 md:px-10 max-w-7xl mx-auto w-full">
        @if($vacancies->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                
                @foreach($vacancies as $job)
                <div class="bg-white p-6 md:p-8 rounded-[30px] shadow-xl shadow-slate-200/50 border border-slate-100 hover:-translate-y-2 transition-transform duration-300 flex flex-col h-full relative overflow-hidden group">
                    
                    <div class="absolute top-0 left-0 w-full h-1.5 bg-yellow-500 transform origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>

                    <div class="mb-5">
                        <h3 class="font-black text-xl md:text-2xl text-[#2D4373] uppercase mb-3 leading-tight">{{ $job->title }}</h3>
                        
                        @if($job->salary_range)
                            <span class="inline-flex items-center bg-green-50 text-green-600 text-xs font-bold px-3 py-1.5 rounded-full border border-green-200">
                                <i class="fas fa-wallet mr-1.5"></i> {{ $job->salary_range }}
                            </span>
                        @endif
                    </div>
                    
                    <div class="text-slate-500 text-sm mb-8 flex-grow prose prose-sm leading-relaxed">
                        {!! \Illuminate\Support\Str::limit(strip_tags($job->description), 120, '...') !!}
                    </div>
                    
                    <a href="https://wa.me/6281234567890?text=Halo%20Tim%20HR%20Anjaya%20Konveksi,%20saya%20mendapatkan%20info%20dari%20website%20dan%20ingin%20melamar%20posisi%20{{ urlencode($job->title) }}" target="_blank" class="w-full bg-[#F59E0B] hover:bg-yellow-400 text-white font-bold py-3.5 rounded-xl text-center transition-transform hover:scale-[1.02] text-sm shadow-lg shadow-yellow-500/30">
                        <i class="fab fa-whatsapp text-lg mr-1.5"></i> Lamar Posisi Ini
                    </a>
                </div>
                @endforeach

            </div>
        @else
            <div class="text-center py-20 bg-white rounded-[40px] border border-slate-100 shadow-2xl max-w-2xl mx-auto relative overflow-hidden">
                <div class="absolute inset-0 bg-slate-50/50"></div>
                <div class="relative z-10">
                    <i class="fas fa-box-open text-6xl md:text-7xl text-slate-300 mb-6 drop-shadow-sm"></i>
                    <h3 class="text-2xl md:text-3xl font-black text-[#2D4373] mb-3">Belum Ada Lowongan</h3>
                    <p class="text-slate-500 max-w-md mx-auto text-sm md:text-base">
                        Saat ini Anjaya Konveksi belum membuka posisi baru. Silakan pantau terus halaman ini untuk *update* selanjutnya ya!
                    </p>
                </div>
            </div>
        @endif
    </main>

    <footer class="bg-white border-t border-slate-200 py-8 text-center text-slate-500 text-xs md:text-sm font-medium">
        &copy; 2026 Anjaya Konveksi. Membangun masa depan bersama.
    </footer>

</body>
</html>