<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-[#2563EB] relative overflow-hidden px-4">
        
        <div class="absolute inset-0 bg-gradient-to-tr from-[#1E3A8A] via-transparent to-[#60A5FA] opacity-50"></div>
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-white/5 rounded-full blur-[120px]"></div>

        <div class="w-full max-w-[360px] relative z-10">
            
            <div class="flex justify-center mb-12">
                <div class="w-16 h-16 border border-white/40 rounded-full flex items-center justify-center backdrop-blur-md shadow-xl transition-all hover:border-white/80">
                     <i class="fas fa-shopping-cart text-white text-2xl"></i>
                </div>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-white/40">
                        <i class="far fa-user text-xs"></i>
                    </span>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus 
                        placeholder="Username / Email"
                        class="w-full bg-white/10 border border-white/20 text-white placeholder-white/30 pl-11 pr-4 py-3.5 rounded-xl focus:ring-1 focus:ring-white/50 focus:bg-white/20 outline-none transition-all text-xs font-medium tracking-wide shadow-sm">
                </div>

                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-white/40">
                        <i class="fas fa-lock text-xs"></i>
                    </span>
                    <input id="password" type="password" name="password" required 
                        placeholder="Password"
                        class="w-full bg-white/10 border border-white/20 text-white placeholder-white/30 pl-11 pr-4 py-3.5 rounded-xl focus:ring-1 focus:ring-white/50 focus:bg-white/20 outline-none transition-all text-xs font-medium tracking-wide shadow-sm">
                </div>

                <div class="flex justify-start px-1">
                    <a href="{{ route('register') }}" class="text-[10px] font-medium text-white/60 hover:text-white transition-all uppercase tracking-wider">
                        Register
                    </a>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full bg-white text-[#2563EB] font-bold py-3.5 rounded-xl shadow-lg hover:shadow-white/20 active:scale-95 transition-all text-xs uppercase tracking-[0.15em]">
                        Log In
                    </button>
                </div>

                @if (Route::has('password.request'))
                    <div class="text-center mt-8">
                        <a href="{{ route('password.request') }}" class="text-white/40 text-[9px] font-medium uppercase tracking-widest hover:text-white transition-all">
                            Forgot Password?
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</x-guest-layout>