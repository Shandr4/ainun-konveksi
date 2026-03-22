<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email | Ainun Konveksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Poppins:wght@700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6">
    <div class="max-w-md w-full bg-white rounded-[30px] shadow-2xl p-10 text-center">
        <div class="w-20 h-20 bg-blue-50 text-[#2D4373] rounded-full flex items-center justify-center mx-auto mb-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
        </div>
        
        <h2 class="text-2xl font-bold text-slate-800 mb-4" style="font-family: 'Poppins';">Cek Email Kamu!</h2>
        <p class="text-slate-500 text-sm mb-8 leading-relaxed">
            Terima kasih sudah mendaftar di <strong>Ainun Konveksi</strong>. Sebelum lanjut, tolong verifikasi email kamu dulu ya dengan klik link yang baru saja kami kirimkan.
        </p>

        @if (session('message'))
            <div class="mb-6 p-3 bg-green-50 text-green-600 text-xs rounded-lg font-semibold">
                Link verifikasi baru sudah dikirim ke email kamu!
            </div>
        @endif

        <div class="space-y-4">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="w-full bg-[#2D4373] hover:bg-blue-900 text-white font-bold py-3.5 rounded-xl transition-all shadow-lg">
                    Kirim Ulang Email Verifikasi
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-slate-400 hover:text-red-500 text-xs font-semibold underline">
                    Log Out
                </button>
            </form>
        </div>
    </div>
</body>
</html>