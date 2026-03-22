<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Ainun Konveksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2 { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-4xl bg-white rounded-[30px] shadow-2xl overflow-hidden flex flex-col md:flex-row">
        <div class="w-full md:w-1/2 p-10 md:p-12 flex flex-col justify-center order-2 md:order-1">
            <h2 class="text-3xl font-bold text-slate-800 mb-2">Buat Akun</h2>
            <p class="text-slate-500 text-sm mb-8">Bergabunglah untuk mulai memesan produksi garmen.</p>

            <form action="{{ url('/register-custom') }}" method="POST" class="space-y-4">
                @csrf <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FCA311] bg-slate-50" placeholder="John Doe">
                    @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Email Address</label>
                    <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FCA311] bg-slate-50" placeholder="john@example.com">
                    @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Password</label>
                        <input type="password" name="password" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FCA311] bg-slate-50" placeholder="••••••••">
                        @error('password') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Konfirmasi</label>
                        <input type="password" name="password_confirmation" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FCA311] bg-slate-50" placeholder="••••••••">
                    </div>
                </div>
                <button type="submit" class="w-full bg-[#FCA311] hover:bg-yellow-500 text-white font-bold py-4 rounded-xl mt-4 transition-colors">
                    Daftar Sekarang
                </button>
            </form>

            <p class="text-center text-sm text-slate-500 mt-6">
                Sudah punya akun? <a href="/login-custom" class="text-[#2D4373] font-bold hover:underline">Login di sini</a>
            </p>
        </div>

        <div class="md:w-1/2 bg-[#FCA311] p-12 text-white flex flex-col justify-center relative overflow-hidden hidden md:flex order-1 md:order-2">
            <div class="relative z-10 text-center">
                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-lg mx-auto mb-6">
                    <span class="text-[#FCA311] font-black text-3xl italic">a</span>
                </div>
                <h1 class="text-4xl font-black mb-4 leading-tight text-[#2D4373]">Mulai Perjalanan Anda.</h1>
                <p class="text-[#2D4373]/80 text-sm leading-relaxed font-medium">Jadilah bagian dari ribuan brand yang telah mempercayakan produksi pakaiannya kepada Ainun Konveksi.</p>
            </div>
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/20 rounded-full blur-xl"></div>
            <div class="absolute -bottom-20 -left-20 w-60 h-60 bg-white/20 rounded-full blur-2xl"></div>
        </div>
    </div>

</body>
</html>