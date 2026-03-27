<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data->hero_title ?? 'Ainun Konveksi' }} | Premium Garment</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; scroll-behavior: smooth; }
        h1, h2, h3, h4 { font-family: 'Poppins', sans-serif; }
        .hero-gradient {
            background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.7) 100%);
        }
        .orange-box-shadow {
            box-shadow: 20px 20px 0px 0px rgba(245, 158, 11, 0.1);
        }
        .service-list ul { list-style: disc; margin-left: 1.5rem; color: #475569; }
        .service-list li { margin-bottom: 0.25rem; }
    </style>
</head>
<body class="bg-white text-slate-900 antialiased">

    @if(session('success_login'))
        <div id="toast-success" class="fixed top-24 left-1/2 -translate-x-1/2 z-[100] bg-green-500 text-white px-8 py-4 rounded-full shadow-2xl font-bold flex items-center gap-3 animate-bounce transition-opacity duration-500">
            <i class="fas fa-check-circle text-xl"></i>
            {{ session('success_login') }}
        </div>

        <script>
            setTimeout(() => {
                const toast = document.getElementById('toast-success');
                if(toast) {
                    toast.classList.remove('animate-bounce'); 
                    toast.classList.add('opacity-0'); 
                    setTimeout(() => toast.remove(), 500); 
                }
            }, 3000); 
        </script>
    @endif
    
    <div class="bg-[#2D4373] text-white/90 text-[10px] md:text-[11px] py-2.5 px-4 md:px-20 flex flex-wrap justify-between items-center tracking-wide relative z-50 gap-2">
        <div class="flex items-center gap-4 md:gap-8 mx-auto md:mx-0">
            <span class="flex items-center gap-1.5 hover:text-white transition">
                <i class="far fa-clock text-yellow-400"></i>
                {{ $data->opening_hours ?? 'Mon-Fri: 9AM - 5PM' }}
            </span>
            <span class="flex items-center gap-1.5 hover:text-white transition">
                <i class="fas fa-phone-alt text-yellow-400"></i>
                {{ $data->phone ?? '(205) 484-9624' }}
            </span>
        </div>
        <a href="#contact-order" class="hidden md:block bg-yellow-500 hover:bg-yellow-400 text-[#2D4373] font-bold px-5 py-1.5 rounded-full text-[10px] uppercase transition-all shadow-lg">
            Get appointment now
        </a>
    </div>

    <nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-100 px-4 md:px-20 py-3 md:py-4 flex justify-between items-center transition-all">
        <div class="flex items-center gap-3 group cursor-pointer">
            <div class="w-10 h-10 md:w-12 md:h-12 bg-[#3B5998] rounded-xl md:rounded-2xl flex items-center justify-center shadow-xl shadow-blue-900/20 transform group-hover:rotate-6 transition-all">
                <span class="text-white font-black text-base md:text-lg italic tracking-tighter">ainun</span>
            </div>
            <span class="font-extrabold text-lg md:text-xl tracking-tight text-[#2D4373]">KONVEKSI</span>
        </div>

        <button id="mobile-menu-btn" class="md:hidden text-[#2D4373] text-2xl focus:outline-none p-2">
            <i class="fas fa-bars"></i>
        </button>

        <div class="hidden md:flex items-center gap-8 text-[13px] font-semibold tracking-wide">
            <div id="nav-links" class="flex items-center gap-8">
                <a href="#home" class="nav-link text-slate-500 hover:text-yellow-600 transition-colors" data-section="home">Home</a>
                <a href="/project" class="nav-link text-slate-500 hover:text-yellow-600 transition-colors">Project</a>
                <a href="#about" class="nav-link text-slate-500 hover:text-yellow-600 transition-colors" data-section="about">About us</a>
                <a href="#contact-order" class="nav-link text-slate-500 hover:text-yellow-600 transition-colors" data-section="contact-order">Contact</a>
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
        <a href="#home" class="mobile-link border-b border-slate-100 pb-4">Home</a>
        <a href="/project" class="mobile-link border-b border-slate-100 pb-4">Project</a>
        <a href="#about" class="mobile-link border-b border-slate-100 pb-4">About us</a>
        <a href="#contact-order" class="mobile-link border-b border-slate-100 pb-4">Contact</a>
        
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

    <header id="home" class="relative min-h-[85vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            @if(isset($data) && $data->hero_image)
                <img src="{{ asset('storage/' . $data->hero_image) }}" class="w-full h-full object-cover scale-105" alt="Hero">
            @else
                <div class="w-full h-full bg-slate-800"></div>
            @endif
            <div class="absolute inset-0 hero-gradient"></div>
        </div>
        
        <div class="relative z-10 text-center px-4 md:px-6 max-w-5xl">
            <h1 class="text-white text-4xl sm:text-5xl md:text-8xl font-black uppercase tracking-tighter mb-4 md:mb-6 leading-[1.1] drop-shadow-2xl">
                {{ $data->hero_title ?? 'UUN TJ KONVEKSI' }}
            </h1>
            <p class="text-white/90 text-sm sm:text-base md:text-xl max-w-3xl mx-auto leading-relaxed font-light tracking-wide mb-8 md:mb-10">
                Kami menghadirkan layanan produksi garmen dengan standar kualitas tinggi, pengerjaan rapi, dan ketepatan waktu.
            </p>
            
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 md:gap-5 w-full max-w-sm sm:max-w-none mx-auto">
                <a href="#contact-order" class="w-full sm:w-auto bg-yellow-500 hover:bg-yellow-400 text-blue-900 font-extrabold px-8 md:px-12 py-3.5 md:py-4 rounded-xl shadow-2xl transition-transform hover:-translate-y-1 uppercase text-xs tracking-widest text-center">
                    Get the best results
                </a>
                
                <a href="{{ route('service-details') ?? '/layanan-kami' }}" class="w-full sm:w-auto bg-transparent border-2 border-yellow-500 text-yellow-500 hover:bg-yellow-500 hover:text-blue-900 font-extrabold px-8 md:px-12 py-3.5 md:py-4 rounded-xl shadow-2xl transition-all hover:-translate-y-1 uppercase text-xs tracking-widest text-center">
                    Selengkapnya (Layanan)
                </a>
            </div>
        </div>
    </header>

    <section id="product" class="py-16 md:py-24 px-6 md:px-20 bg-white">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-center gap-8 md:gap-20">
            @forelse($data->product_categories ?? [] as $category)
            <div class="flex flex-col items-center group cursor-pointer">
                <div class="w-32 h-32 sm:w-40 sm:h-40 md:w-56 md:h-56 rounded-full p-1.5 border-2 border-slate-100 group-hover:border-yellow-500 transition-all duration-500 shadow-2xl relative overflow-hidden">
                    <img src="{{ asset('storage/' . $category['image']) }}" class="w-full h-full object-cover rounded-full group-hover:scale-110 transition-transform duration-700">
                </div>
                <span class="mt-6 md:mt-8 font-extrabold text-slate-800 uppercase tracking-widest text-xs md:text-sm group-hover:text-yellow-600 transition-colors text-center">{{ $category['name'] }}</span>
            </div>
            @empty
            <div class="text-center text-slate-400 italic">Kategori Produk Belum Diisi di Admin.</div>
            @endforelse
        </div>
    </section>

    <section id="about" class="py-16 md:py-24 px-6 md:px-20 bg-slate-50">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            <div class="relative order-2 lg:order-1 mt-8 lg:mt-0">
                <div class="w-full h-[350px] sm:h-[450px] md:h-[600px] rounded-3xl overflow-hidden shadow-2xl relative z-10 orange-box-shadow">
                    @if(isset($data) && $data->about_image)
                        <img src="{{ asset('storage/' . $data->about_image) }}" class="w-full h-full object-cover" alt="Workshop">
                    @else
                        <div class="w-full h-full bg-slate-200"></div>
                    @endif
                </div>
                <div class="absolute -bottom-6 -right-2 md:-bottom-8 md:-right-8 z-20 bg-[#F59E0B] p-6 md:p-10 text-white shadow-2xl max-w-[250px] md:max-w-xs rounded-2xl">
                    <h4 class="font-black text-lg md:text-xl leading-tight uppercase">Layanan Konveksi Pakaian</h4>
                    <div class="w-10 md:w-12 h-1 bg-white my-3 md:my-5 opacity-50"></div>
                    <p class="text-[9px] md:text-[10px] font-black uppercase tracking-[0.2em]">Konsultasi & Penawaran Gratis</p>
                </div>
            </div>

            <div class="lg:pl-10 order-1 lg:order-2 text-center lg:text-left">
                <h2 class="text-3xl sm:text-4xl md:text-6xl font-black text-[#2D4373] leading-tight mb-6 md:mb-8">Tentang <span class="text-yellow-500">Ainun</span> Konveksi</h2>
                <p class="text-slate-500 leading-relaxed mb-8 md:mb-10 text-base md:text-lg font-light">
                    {{ $data->about_description ?? 'Deskripsi perusahaan Anda.' }}
                </p>
                <div class="mb-8 md:mb-12 bg-white p-5 md:p-6 rounded-2xl shadow-sm border-l-4 border-yellow-500 text-left">
                    <h5 class="font-bold text-[#2D4373] mb-2 uppercase text-[10px] md:text-xs tracking-widest">Visi & Misi</h5>
                    <p class="text-slate-600 leading-relaxed italic text-sm md:text-base">
                        "{{ $data->vision_mission_text ?? 'Visi dan misi perusahaan.' }}"
                    </p>
                </div>
                <a href="{{ url('/about-details') }}" class="inline-block bg-[#2D4373] hover:bg-blue-900 text-white font-bold px-10 md:px-12 py-3.5 md:py-4 rounded-full shadow-xl transition-all hover:-translate-y-1 uppercase text-xs tracking-widest">
                    Selengkapnya
                </a>
            </div>
        </div>
    </section>

    <section id="services" class="py-16 md:py-28 px-6 md:px-20 bg-white">
        <div class="max-w-7xl mx-auto text-center mb-12 md:mb-20">
            <h2 class="text-3xl sm:text-4xl md:text-6xl font-black text-[#2D4373] mb-4 md:mb-6">Layanan Ainun Konveksi</h2>
            <p class="text-slate-500 text-base md:text-lg font-light max-w-3xl mx-auto leading-relaxed">
                Kami menyediakan berbagai layanan produksi pakaian dengan standar kualitas tinggi, pengerjaan rapi, dan ketepatan waktu untuk memenuhi kebutuhan bisnis maupun personal.
            </p>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            @forelse($data->services ?? [] as $service)
            <div class="bg-white rounded-3xl p-5 md:p-6 shadow-xl shadow-slate-200/50 flex flex-col items-start border border-slate-100/50 hover:-translate-y-2 transition-transform duration-300">
                <div class="w-full h-48 md:h-56 rounded-2xl overflow-hidden mb-5 md:mb-6 border border-slate-100">
                    @if(isset($service['image']) && $service['image'])
                        <img src="{{ asset('storage/' . $service['image']) }}" class="w-full h-full object-cover" alt="Service">
                    @else
                        <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-400">
                            <i class="fas fa-tshirt text-4xl md:text-5xl"></i>
                        </div>
                    @endif
                </div>
                <h3 class="font-bold text-slate-800 text-base md:text-lg mb-2 md:mb-3 tracking-tight">
                    {{ $service['title'] ?? '' }}
                </h3>
                <div class="text-slate-600 text-xs md:text-sm leading-relaxed service-list">
                    {!! nl2br(e($service['description'] ?? '')) !!}
                </div>
            </div>
            @empty
            <div class="col-span-full text-center text-slate-400 italic">Data Layanan Belum Diisi.</div>
            @endforelse
        </div>

        <div class="flex justify-center mt-12 md:mt-16">
            <a href="{{ route('service-details') ?? '/layanan-kami' }}" class="bg-yellow-500 hover:bg-yellow-400 text-blue-900 font-bold px-10 md:px-12 py-3 md:py-3.5 rounded-full text-xs uppercase tracking-widest shadow-xl shadow-yellow-500/30 transition-all hover:-translate-y-1 inline-block">
                Selengkapnya
            </a>
        </div>
    </section>

    <section id="how-to-order" class="py-16 md:py-24 bg-white text-center px-4 md:px-6">
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-black text-[#2D4373] mb-12 md:mb-20">Cara Pemesanan Jasa</h2>
        
        <div class="flex flex-col md:flex-row justify-center items-center gap-6 max-w-5xl mx-auto">
            @forelse($data->order_steps ?? [] as $step)
                <div class="flex flex-col items-center">
                    <div class="w-28 h-28 sm:w-36 sm:h-36 md:w-44 md:h-44 rounded-full border-[4px] md:border-[6px] border-slate-100 p-1.5 md:p-2 shadow-sm hover:border-yellow-500 transition-colors duration-300">
                        <div class="bg-[#F59E0B] w-full h-full rounded-full flex items-center justify-center shadow-inner">
                            <span class="text-white text-3xl md:text-5xl font-black">{{ $step['number'] ?? '' }}</span>
                        </div>
                    </div>
                    <span class="mt-4 md:mt-6 font-bold text-[#2D4373] text-sm md:text-base">{{ $step['title'] ?? '' }}</span>
                </div>
                @if(!$loop->last)
                <div class="hidden md:flex items-center w-20 lg:w-32 -mt-10"><div class="h-1 w-full bg-slate-200"></div><i class="fas fa-chevron-right text-slate-300 text-2xl -ml-2"></i></div>
                <i class="fas fa-chevron-down text-slate-300 text-2xl md:hidden my-4"></i>
                @endif
            @empty
                <div class="text-center text-slate-400 italic">Data Cara Pemesanan Belum Diisi.</div>
            @endforelse
        </div>
    </section>

    <section id="solutions" class="py-16 md:py-20 px-6 md:px-20 bg-slate-50">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-16 items-center">
            <div class="order-2 md:order-1 text-center md:text-left">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-[#2D4373] leading-tight mb-4 md:mb-6">
                    {{ $data->solution_title ?? 'Solusi Konveksi Berkualitas untuk Brand & Institusi Anda' }}
                </h2>
                <p class="text-slate-500 leading-relaxed mb-8 md:mb-10 text-sm md:text-base">
                    {{ $data->solution_description ?? 'Deskripsi solusi perusahaan Anda. Silakan update melalui panel admin.' }}
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center md:justify-start gap-4">
                    <span class="font-bold text-slate-800 text-sm md:text-base">Hubungi kami sekarang:</span>
                    <a href="#contact-order" class="bg-[#F59E0B] hover:bg-yellow-400 text-white font-bold px-6 md:px-8 py-3 md:py-3.5 rounded-full shadow-lg transition-transform hover:-translate-y-1 text-sm">
                        Get appointment now
                    </a>
                </div>
            </div>
            <div class="order-1 md:order-2 relative px-4 md:px-0">
                @if(isset($data) && $data->solution_image)
                    <img src="{{ asset('storage/' . $data->solution_image) }}" class="w-full h-auto max-h-[300px] md:max-h-[450px] object-cover rounded-3xl shadow-2xl relative z-10" alt="Solusi Konveksi">
                @else
                    <div class="w-full h-[250px] md:h-[400px] bg-slate-200 rounded-3xl relative z-10"></div>
                @endif
                <div class="absolute -top-4 -right-2 md:-top-6 md:-right-6 w-full h-full border-4 border-yellow-500/30 rounded-3xl z-0 hidden sm:block"></div>
            </div>
        </div>
    </section>

    <section id="contact-order" class="py-16 md:py-24 px-4 md:px-10 max-w-7xl mx-auto relative z-10">
        <div class="flex flex-col lg:flex-row bg-[#F8FAFC] rounded-[30px] md:rounded-[40px] shadow-2xl overflow-hidden relative border border-slate-100">
            
            <div class="lg:w-1/2 relative p-8 md:p-16 flex flex-col justify-center">
                @if(isset($data) && $data->contact_image)
                    <img src="{{ asset('storage/' . $data->contact_image) }}" class="absolute inset-0 w-full h-full object-cover z-0" alt="Workshop">
                @else
                    <div class="absolute inset-0 w-full h-full bg-slate-800 z-0"></div>
                @endif
                
                <div class="absolute inset-0 bg-black/70 z-0"></div>

                <div class="relative z-10 text-white text-center md:text-left">
                    <h2 class="text-3xl md:text-5xl font-black mb-3 md:mb-4">Contact</h2>
                    <p class="text-white/80 text-base md:text-lg mb-8 md:mb-12 max-w-sm mx-auto md:mx-0 leading-relaxed">
                        Thank you for your interest. We look forward to hearing from you soon.
                    </p>

                    <div class="space-y-6 md:space-y-8 text-left max-w-xs mx-auto md:mx-0">
                        <div class="flex items-center gap-4 md:gap-5">
                            <div class="w-10 h-10 md:w-12 md:h-12 bg-yellow-500 rounded-full flex items-center justify-center shrink-0 shadow-lg">
                                <i class="far fa-clock text-lg md:text-xl text-white"></i>
                            </div>
                            <div>
                                <p class="text-xs md:text-sm text-white/80 font-medium">Hours Of Operation</p>
                                <p class="font-bold text-base md:text-lg">{{ $data->opening_hours ?? 'Mon-Fri: 9AM - 5PM' }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 md:gap-5">
                            <div class="w-10 h-10 md:w-12 md:h-12 bg-yellow-500 rounded-full flex items-center justify-center shrink-0 shadow-lg">
                                <i class="fas fa-phone-alt text-lg md:text-xl text-white"></i>
                            </div>
                            <div>
                                <p class="text-xs md:text-sm text-white/80 font-medium">24/7 Emergency Service</p>
                                <p class="font-bold text-base md:text-lg">{{ $data->phone ?? '(205) 484-9624' }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 md:gap-5">
                            <div class="w-10 h-10 md:w-12 md:h-12 bg-yellow-500 rounded-full flex items-center justify-center shrink-0 shadow-lg">
                                <i class="fas fa-map-marker-alt text-lg md:text-xl text-white"></i>
                            </div>
                            <div>
                                <p class="text-xs md:text-sm text-white/80 font-medium">Service Area</p>
                                <p class="font-bold text-base md:text-lg">{{ $data->address ?? 'Birmingham, AL' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hidden lg:flex absolute left-1/2 top-[10%] bottom-[10%] -translate-x-1/2 w-[70px] bg-[#F8FAFC] items-center justify-center z-20" style="clip-path: polygon(100% 0, 100% 100%, 0 calc(100% - 40px), 0 40px);">
                <span class="transform -rotate-90 whitespace-nowrap font-black text-[#2D4373] tracking-widest text-sm uppercase">
                    Schedule an Appointment
                </span>
            </div>

            <div class="lg:w-1/2 p-6 md:p-16 flex flex-col justify-center relative z-10 bg-[#F8FAFC]">
                
                @if(session('success'))
                    <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm text-sm md:text-base">
                        <p class="font-bold">Berhasil!</p>
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                <form action="{{ route('appointment.store') ?? '#' }}" method="POST" class="flex flex-col gap-4 md:gap-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6">
                        <input type="text" name="first_name" required placeholder="First name" class="w-full px-5 md:px-6 py-3 md:py-4 rounded-full border border-slate-200 shadow-sm focus:ring-2 focus:ring-yellow-500 outline-none text-slate-600 bg-white placeholder-slate-400 font-medium text-sm md:text-base">
                        <input type="text" name="last_name" required placeholder="Last name" class="w-full px-5 md:px-6 py-3 md:py-4 rounded-full border border-slate-200 shadow-sm focus:ring-2 focus:ring-yellow-500 outline-none text-slate-600 bg-white placeholder-slate-400 font-medium text-sm md:text-base">
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6">
                        <input type="email" name="email" required placeholder="Email address" class="w-full px-5 md:px-6 py-3 md:py-4 rounded-full border border-slate-200 shadow-sm focus:ring-2 focus:ring-yellow-500 outline-none text-slate-600 bg-white placeholder-slate-400 font-medium text-sm md:text-base">
                        <input type="text" name="phone" required placeholder="Phone no" class="w-full px-5 md:px-6 py-3 md:py-4 rounded-full border border-slate-200 shadow-sm focus:ring-2 focus:ring-yellow-500 outline-none text-slate-600 bg-white placeholder-slate-400 font-medium text-sm md:text-base">
                    </div>
                    
                    <textarea name="message" required placeholder="Message..." rows="4" class="w-full px-5 md:px-6 py-4 md:py-5 rounded-[20px] md:rounded-[30px] border border-slate-200 shadow-sm focus:ring-2 focus:ring-yellow-500 outline-none text-slate-600 bg-white placeholder-slate-400 font-medium resize-none text-sm md:text-base"></textarea>
                    
                   <div class="mt-2 text-center sm:text-left">
                        @auth
                            <button type="submit" class="w-full sm:w-auto bg-[#F59E0B] hover:bg-yellow-400 text-white font-bold px-8 md:px-10 py-3.5 md:py-4 rounded-full transition-transform hover:-translate-y-1 shadow-lg shadow-yellow-500/30 text-xs md:text-sm tracking-wide">
                                Send Message
                            </button>
                        @else
                            <button type="button" onclick="alert('Ups! Kamu harus login dulu bosku buat ngirim pesan. Biar aman dari bot spam! 🤖❌'); window.location.href='/login-custom';" class="w-full sm:w-auto bg-[#F59E0B] hover:bg-yellow-400 text-white font-bold px-8 md:px-10 py-3.5 md:py-4 rounded-full transition-transform hover:-translate-y-1 shadow-lg shadow-yellow-500/30 text-xs md:text-sm tracking-wide">
                                Send Message
                            </button>
                        @endauth
                    </div>
                </form>
            </div>
        </div>
    </section>

    <footer class="bg-[#4A699C] py-16 md:py-20 px-6 md:px-20 border-t border-white/10 mt-10">
        <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 md:gap-16">
            
            <div>
                <h4 class="text-white text-xl md:text-2xl font-bold mb-6 md:mb-8 tracking-wide">Links Utama</h4>
                <ul class="space-y-4 md:space-y-5 text-white/80 font-medium text-base md:text-lg">
                    <li><a href="#about" class="hover:text-yellow-400 transition-colors">Tentang Kami</a></li>
                    <li><a href="/project" class="hover:text-yellow-400 transition-colors">Portofolio</a></li>
                    <li><a href="#services" class="hover:text-yellow-400 transition-colors">Layanan</a></li>
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
            // Logika Mobile Menu Hamburger
            const mobileBtn = document.getElementById('mobile-menu-btn');
            const closeBtn = document.getElementById('close-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileLinks = document.querySelectorAll('.mobile-link');

            if(mobileBtn && closeBtn && mobileMenu) {
                mobileBtn.addEventListener('click', () => {
                    mobileMenu.classList.remove('translate-x-full');
                });

                closeBtn.addEventListener('click', () => {
                    mobileMenu.classList.add('translate-x-full');
                });

                mobileLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        mobileMenu.classList.add('translate-x-full');
                    });
                });
            }

            // Logika Active Link Navbar Saat Scroll
            const sections = document.querySelectorAll('section, header');
            const navLinks = document.querySelectorAll('.nav-link');

            const updateActiveLink = () => {
                let currentSection = '';
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    if (pageYOffset >= sectionTop - 150) { 
                        // PASTIKAN section punya attribute id biar nggak ngaco!
                        if (section.hasAttribute('id')) {
                            currentSection = section.getAttribute('id');
                        }
                    }
                });

                navLinks.forEach(link => {
                    link.classList.remove('text-yellow-600', 'border-b-2', 'border-yellow-500', 'pb-1');
                    link.classList.add('text-slate-500');
                    
                    const dataSection = link.getAttribute('data-section');
                    // Cek apakah data-section ada isinya, dan apakah cocok sama currentSection
                    if (currentSection && dataSection && dataSection === currentSection) {
                        link.classList.add('text-yellow-600', 'border-b-2', 'border-yellow-500', 'pb-1');
                        link.classList.remove('text-slate-500');
                    }
                });
            };

            window.addEventListener('scroll', updateActiveLink);
            updateActiveLink(); 
        });
    </script>

</body>
</html>