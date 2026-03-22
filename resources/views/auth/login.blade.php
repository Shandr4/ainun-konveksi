<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Ainun Konveksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2 { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-4xl bg-white rounded-[30px] shadow-2xl overflow-hidden flex flex-col md:flex-row">
        <div class="md:w-1/2 bg-[#2D4373] p-12 text-white flex flex-col justify-between relative overflow-hidden hidden md:flex">
            <div class="absolute inset-0 opacity-20">
                <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover">
            </div>
            <div class="relative z-10">
                <div class="w-12 h-12 bg-[#FCA311] rounded-xl flex items-center justify-center shadow-lg mb-8">
                    <span class="text-white font-black text-xl italic">a</span>
                </div>
                <h1 class="text-4xl font-black mb-4 leading-tight">Selamat Datang Kembali.</h1>
                <p class="text-white/80 text-sm leading-relaxed">Akses dashboard Anda untuk melacak pesanan dan mengelola layanan produksi garmen premium.</p>
            </div>
            <div class="relative z-10 text-sm font-medium text-white/50">&copy; 2026 Ainun Konveksi.</div>
        </div>

        <div class="w-full md:w-1/2 p-10 md:p-16 flex flex-col justify-center">
            <h2 class="text-3xl font-bold text-slate-800 mb-2">Log In</h2>
            <p class="text-slate-500 text-sm mb-8">Silakan masukkan kredensial akun Anda.</p>

            @if($errors->any())
                <div class="mb-5 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-xl text-sm font-medium">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ url('/login-custom') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-5 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FCA311] bg-slate-50" placeholder="admin@ainun.com">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Password</label>
                    <input type="password" name="password" required class="w-full px-5 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FCA311] bg-slate-50" placeholder="••••••••">
                </div>
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded border-slate-300 text-[#2D4373] focus:ring-[#2D4373]">
                        <span class="text-slate-600 font-medium">Ingat Saya</span>
                    </label>
                    <a href="#" class="text-[#FCA311] font-semibold hover:underline">Lupa Password?</a>
                </div>
                <button type="submit" class="w-full bg-[#2D4373] hover:bg-blue-900 text-white font-bold py-4 rounded-xl mt-4 transition-colors">
                    Sign In
                </button>
            </form>

            <p class="text-center text-sm text-slate-500 mt-8">
                Belum punya akun? <a href="/register-custom" class="text-[#FCA311] font-bold hover:underline">Daftar di sini</a>
            </p>
        </div>
    </div>

</body>
</html>