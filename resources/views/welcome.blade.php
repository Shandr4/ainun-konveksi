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
        <a href="#contact-order" class="hidden md:block bg-yellow-500 hover:bg-yellow-400 text-[#2D4373] font-bold px-5 py-1.5 rounded-full text-[10px] uppercase transition-all shadow-lg">
            Get appointment now
        </a>
    </div>

    <nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-100 px-6 md:px-20 py-4 flex justify-between items-center transition-all">
        <div class="flex items-center gap-3 group cursor-pointer">
            <div class="w-12 h-12 bg-[#3B5998] rounded-2xl flex items-center justify-center shadow-xl shadow-blue-900/20 transform group-hover:rotate-6 transition-all">
                <span class="text-white font-black text-lg italic tracking-tighter">ainun</span>
            </div>
            <span class="font-extrabold text-xl tracking-tight text-[#2D4373]">KONVEKSI</span>
        </div>

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
                        <button type="submit" class="bg-red-50 text-red-500 hover:bg-red-500 hover:text-white border border-red-200 px-4 py-1.5 rounded-full transition-all text-xs font-bold">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="/login-custom" class="flex items-center gap-2 text-[#2D4373] hover:text-yellow-600 transition-colors">
                        <i class="far fa-user-circle text-lg"></i>
                        <span>Login</span>
                    </a>
                    <a href="/register-custom" class="bg-[#F8FAFC] border border-slate-200 text-[#2D4373] hover:border-yellow-500 hover:bg-yellow-50 px-5 py-1.5 rounded-full transition-all">
                        Daftar
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <header id="home" class="relative min-h-[85vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            @if(isset($data) && $data->hero_image)
                <img src="{{ asset('storage/' . $data->hero_image) }}" class="w-full h-full object-cover scale-105" alt="Hero">
            @else
                <div class="w-full h-full bg-slate-800"></div>
            @endif
            <div class="absolute inset-0 hero-gradient"></div>
        </div>
        
        <div class="relative z-10 text-center px-6 max-w-5xl">
            <h1 class="text-white text-5xl md:text-8xl font-black uppercase tracking-tighter mb-6 leading-[1.1] drop-shadow-2xl">
                {{ $data->hero_title ?? 'UUN TJ KONVEKSI' }}
            </h1>
            <p class="text-white/90 text-base md:text-xl max-w-3xl mx-auto leading-relaxed font-light tracking-wide mb-10">
                Kami menghadirkan layanan produksi garmen dengan standar kualitas tinggi, pengerjaan rapi, dan ketepatan waktu.
            </p>
            
            <div class="flex flex-col sm:flex-row items-center justify-center gap-5">
                <a href="#contact-order" class="w-full sm:w-auto bg-yellow-500 hover:bg-yellow-400 text-blue-900 font-extrabold px-12 py-4 rounded-xl shadow-2xl transition-transform hover:-translate-y-1 uppercase text-xs tracking-widest text-center">
                    Get the best results
                </a>
                
                <a href="{{ route('service-details') ?? '/layanan-kami' }}" class="w-full sm:w-auto bg-transparent border-2 border-yellow-500 text-yellow-500 hover:bg-yellow-500 hover:text-blue-900 font-extrabold px-12 py-4 rounded-xl shadow-2xl transition-all hover:-translate-y-1 uppercase text-xs tracking-widest text-center">
                    Selengkapnya (Layanan)
                </a>
            </div>
        </div>
    </header>

    <section id="product" class="py-24 px-6 md:px-20 bg-white">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-center gap-10 md:gap-20">
            @forelse($data->product_categories ?? [] as $category)
            <div class="flex flex-col items-center group cursor-pointer">
                <div class="w-40 h-40 md:w-56 md:h-56 rounded-full p-1.5 border-2 border-slate-100 group-hover:border-yellow-500 transition-all duration-500 shadow-2xl relative overflow-hidden">
                    <img src="{{ asset('storage/' . $category['image']) }}" class="w-full h-full object-cover rounded-full group-hover:scale-110 transition-transform duration-700">
                </div>
                <span class="mt-8 font-extrabold text-slate-800 uppercase tracking-widest text-sm group-hover:text-yellow-600 transition-colors text-center">{{ $category['name'] }}</span>
            </div>
            @empty
            <div class="text-center text-slate-400 italic">Kategori Produk Belum Diisi di Admin.</div>
            @endforelse
        </div>
    </section>

    <section id="about" class="py-24 px-6 md:px-20 bg-slate-50">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            <div class="relative">
                <div class="w-full h-[500px] md:h-[600px] rounded-3xl overflow-hidden shadow-2xl relative z-10 orange-box-shadow">
                    @if(isset($data) && $data->about_image)
                        <img src="{{ asset('storage/' . $data->about_image) }}" class="w-full h-full object-cover" alt="Workshop">
                    @else
                        <div class="w-full h-full bg-slate-200"></div>
                    @endif
                </div>
                <div class="absolute -bottom-8 -right-4 md:-right-8 z-20 bg-[#F59E0B] p-10 text-white shadow-2xl max-w-xs rounded-2xl">
                    <h4 class="font-black text-xl leading-tight uppercase">Layanan Konveksi Pakaian</h4>
                    <div class="w-12 h-1 bg-white my-5 opacity-50"></div>
                    <p class="text-[10px] font-black uppercase tracking-[0.2em]">Konsultasi & Penawaran Gratis</p>
                </div>
            </div>

            <div class="lg:pl-10">
                <h2 class="text-4xl md:text-6xl font-black text-[#2D4373] leading-tight mb-8">Tentang <span class="text-yellow-500">Ainun</span> Konveksi</h2>
                <p class="text-slate-500 leading-relaxed mb-10 text-lg font-light">
                    {{ $data->about_description ?? 'Deskripsi perusahaan Anda.' }}
                </p>
                <div class="mb-12 bg-white p-6 rounded-2xl shadow-sm border-l-4 border-yellow-500">
                    <h5 class="font-bold text-[#2D4373] mb-2 uppercase text-xs tracking-widest">Visi & Misi</h5>
                    <p class="text-slate-600 leading-relaxed italic text-base">
                        "{{ $data->vision_mission_text ?? 'Visi dan misi perusahaan.' }}"
                    </p>
                </div>
                <a href="{{ url('/about-details') }}" class="inline-block bg-[#2D4373] hover:bg-blue-900 text-white font-bold px-12 py-4 rounded-full shadow-xl transition-all hover:-translate-y-1 uppercase text-xs tracking-widest">
                    Selengkapnya
                </a>
            </div>
        </div>
    </section>

    <section id="services" class="py-28 px-6 md:px-20 bg-white">
        <div class="max-w-7xl mx-auto text-center mb-20">
            <h2 class="text-4xl md:text-6xl font-black text-[#2D4373] mb-6">Layanan Ainun Konveksi</h2>
            <p class="text-slate-500 text-lg font-light max-w-3xl mx-auto leading-relaxed">
                Kami menyediakan berbagai layanan produksi pakaian dengan standar kualitas tinggi, pengerjaan rapi, dan ketepatan waktu untuk memenuhi kebutuhan bisnis maupun personal.
            </p>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($data->services ?? [] as $service)
            <div class="bg-white rounded-3xl p-6 shadow-xl shadow-slate-200/50 flex flex-col items-start border border-slate-100/50 hover:-translate-y-2 transition-transform duration-300">
                <div class="w-full h-56 rounded-2xl overflow-hidden mb-6 border border-slate-100">
                    @if(isset($service['image']) && $service['image'])
                        <img src="{{ asset('storage/' . $service['image']) }}" class="w-full h-full object-cover" alt="Service">
                    @else
                        <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-400">
                            <i class="fas fa-tshirt text-5xl"></i>
                        </div>
                    @endif
                </div>
                <h3 class="font-bold text-slate-800 text-lg mb-3 tracking-tight">
                    {{ $service['title'] ?? '' }}
                </h3>
                <div class="text-slate-600 text-sm leading-relaxed service-list">
                    {!! nl2br(e($service['description'] ?? '')) !!}
                </div>
            </div>
            @empty
            <div class="col-span-full text-center text-slate-400 italic">Data Layanan Belum Diisi.</div>
            @endforelse
        </div>

        <div class="flex justify-center mt-16">
            <a href="{{ route('service-details') ?? '/layanan-kami' }}" class="bg-yellow-500 hover:bg-yellow-400 text-blue-900 font-bold px-12 py-3.5 rounded-full text-xs uppercase tracking-widest shadow-xl shadow-yellow-500/30 transition-all hover:-translate-y-1 inline-block">
                Selengkapnya
            </a>
        </div>
    </section>

    <section class="py-24 bg-white text-center px-6">
        <h2 class="text-3xl md:text-5xl font-black text-[#2D4373] mb-20">Cara Pemesanan Jasa</h2>
        
        <div class="flex flex-col md:flex-row justify-center items-center gap-6 max-w-5xl mx-auto">
            @forelse($data->order_steps ?? [] as $step)
                <div class="flex flex-col items-center">
                    <div class="w-36 h-36 md:w-44 md:h-44 rounded-full border-[6px] border-slate-100 p-2 shadow-sm hover:border-yellow-500 transition-colors duration-300">
                        <div class="bg-[#F59E0B] w-full h-full rounded-full flex items-center justify-center shadow-inner">
                            <span class="text-white text-4xl md:text-5xl font-black">{{ $step['number'] ?? '' }}</span>
                        </div>
                    </div>
                    <span class="mt-6 font-bold text-[#2D4373] text-sm md:text-base">{{ $step['title'] ?? '' }}</span>
                </div>
                @if(!$loop->last)
                <div class="hidden md:flex items-center w-20 lg:w-32 -mt-10"><div class="h-1 w-full bg-slate-200"></div><i class="fas fa-chevron-right text-slate-300 text-2xl -ml-2"></i></div>
                <i class="fas fa-chevron-down text-slate-300 text-3xl md:hidden my-6"></i>
                @endif
            @empty
                <div class="text-center text-slate-400 italic">Data Cara Pemesanan Belum Diisi.</div>
            @endforelse
        </div>
    </section>

    <section class="py-20 px-6 md:px-20 bg-slate-50">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div class="order-2 md:order-1">
                <h2 class="text-3xl md:text-4xl font-black text-[#2D4373] leading-tight mb-6">
                    {{ $data->solution_title ?? 'Solusi Konveksi Berkualitas untuk Brand & Institusi Anda' }}
                </h2>
                <p class="text-slate-500 leading-relaxed mb-10 text-base">
                    {{ $data->solution_description ?? 'Deskripsi solusi perusahaan Anda. Silakan update melalui panel admin.' }}
                </p>
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                    <span class="font-bold text-slate-800">Hubungi kami sekarang:</span>
                    <a href="#contact-order" class="bg-[#F59E0B] hover:bg-yellow-400 text-white font-bold px-8 py-3.5 rounded-full shadow-lg transition-transform hover:-translate-y-1">
                        Get appointment now
                    </a>
                </div>
            </div>
            <div class="order-1 md:order-2 relative">
                @if(isset($data) && $data->solution_image)
                    <img src="{{ asset('storage/' . $data->solution_image) }}" class="w-full h-auto max-h-[450px] object-cover rounded-3xl shadow-2xl relative z-10" alt="Solusi Konveksi">
                @else
                    <div class="w-full h-[400px] bg-slate-200 rounded-3xl relative z-10"></div>
                @endif
                <div class="absolute -top-6 -right-6 w-full h-full border-4 border-yellow-500/30 rounded-3xl z-0 hidden md:block"></div>
            </div>
        </div>
    </section>

    <section id="contact-order" class="py-24 px-6 md:px-10 max-w-7xl mx-auto relative z-10">
        <div class="flex flex-col lg:flex-row bg-[#F8FAFC] rounded-[40px] shadow-2xl overflow-hidden relative border border-slate-100">
            
            <div class="lg:w-1/2 relative p-10 md:p-16 flex flex-col justify-center">
                @if(isset($data) && $data->contact_image)
                    <img src="{{ asset('storage/' . $data->contact_image) }}" class="absolute inset-0 w-full h-full object-cover z-0" alt="Workshop">
                @else
                    <div class="absolute inset-0 w-full h-full bg-slate-800 z-0"></div>
                @endif
                
                <div class="absolute inset-0 bg-black/70 z-0"></div>

                <div class="relative z-10 text-white">
                    <h2 class="text-4xl md:text-5xl font-black mb-4">Contact</h2>
                    <p class="text-white/80 text-lg mb-12 max-w-sm leading-relaxed">
                        Thank you for your interest. We look forward to hearing from you soon.
                    </p>

                    <div class="space-y-8">
                        <div class="flex items-center gap-5">
                            <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center shrink-0 shadow-lg">
                                <i class="far fa-clock text-xl text-white"></i>
                            </div>
                            <div>
                                <p class="text-sm text-white/80 font-medium">Hours Of Operation</p>
                                <p class="font-bold text-lg">{{ $data->opening_hours ?? 'Mon-Fri: 9AM - 5PM' }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-5">
                            <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center shrink-0 shadow-lg">
                                <i class="fas fa-phone-alt text-xl text-white"></i>
                            </div>
                            <div>
                                <p class="text-sm text-white/80 font-medium">24/7 Emergency Service</p>
                                <p class="font-bold text-lg">{{ $data->phone ?? '(205) 484-9624' }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-5">
                            <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center shrink-0 shadow-lg">
                                <i class="fas fa-map-marker-alt text-xl text-white"></i>
                            </div>
                            <div>
                                <p class="text-sm text-white/80 font-medium">Service Area</p>
                                <p class="font-bold text-lg">{{ $data->address ?? 'Birmingham, AL' }}</p>
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

            <div class="lg:w-1/2 p-10 md:p-16 flex flex-col justify-center relative z-10 bg-[#F8FAFC]">
                
                @if(session('success'))
                    <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm">
                        <p class="font-bold">Berhasil!</p>
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                <form action="{{ route('appointment.store') ?? '#' }}" method="POST" class="flex flex-col gap-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <input type="text" name="first_name" required placeholder="First name" class="w-full px-6 py-4 rounded-full border border-slate-200 shadow-sm focus:ring-2 focus:ring-yellow-500 outline-none text-slate-600 bg-white placeholder-slate-400 font-medium">
                        <input type="text" name="last_name" required placeholder="Last name" class="w-full px-6 py-4 rounded-full border border-slate-200 shadow-sm focus:ring-2 focus:ring-yellow-500 outline-none text-slate-600 bg-white placeholder-slate-400 font-medium">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <input type="email" name="email" required placeholder="Email address" class="w-full px-6 py-4 rounded-full border border-slate-200 shadow-sm focus:ring-2 focus:ring-yellow-500 outline-none text-slate-600 bg-white placeholder-slate-400 font-medium">
                        <input type="text" name="phone" required placeholder="Phone no" class="w-full px-6 py-4 rounded-full border border-slate-200 shadow-sm focus:ring-2 focus:ring-yellow-500 outline-none text-slate-600 bg-white placeholder-slate-400 font-medium">
                    </div>
                    
                    <textarea name="message" required placeholder="Message..." rows="5" class="w-full px-6 py-5 rounded-[30px] border border-slate-200 shadow-sm focus:ring-2 focus:ring-yellow-500 outline-none text-slate-600 bg-white placeholder-slate-400 font-medium resize-none"></textarea>
                    
                   <div class="mt-2">
                        @auth
                            <button type="submit" class="bg-[#F59E0B] hover:bg-yellow-400 text-white font-bold px-10 py-4 rounded-full transition-transform hover:-translate-y-1 shadow-lg shadow-yellow-500/30 text-sm tracking-wide">
                                Send Message
                            </button>
                        @else
                            <button type="button" onclick="alert('Ups! Kamu harus login dulu bosku buat ngirim pesan. Biar aman dari bot spam! 🤖❌'); window.location.href='/login-custom';" class="bg-[#F59E0B] hover:bg-yellow-400 text-white font-bold px-10 py-4 rounded-full transition-transform hover:-translate-y-1 shadow-lg shadow-yellow-500/30 text-sm tracking-wide">
                                Send Message
                            </button>
                        @endauth
                    </div>

                </form>
            </div>
        </div>
    </section>

    <footer class="bg-[#4A699C] py-20 px-6 md:px-20 border-t border-white/10 mt-10">
        <div class="max-w-7xl mx-auto text-center text-white/60 text-sm font-medium">
            &copy; 2026 Ainun Konveksi. All rights reserved.
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sections = document.querySelectorAll('section, header');
            const navLinks = document.querySelectorAll('.nav-link');

            const updateActiveLink = () => {
                let currentSection = '';
                
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    if (pageYOffset >= sectionTop - 150) { 
                        currentSection = section.getAttribute('id');
                    }
                });

                navLinks.forEach(link => {
                    link.classList.remove('text-yellow-600', 'border-b-2', 'border-yellow-500', 'pb-1');
                    link.classList.add('text-slate-500');
                    
                    if (link.getAttribute('data-section') === currentSection) {
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