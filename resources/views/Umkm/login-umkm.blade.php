@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full flex items-center justify-center bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 overflow-hidden relative">
    <!-- Decorative background elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-0 -right-4 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>

    <div class="relative z-10 max-w-6xl w-full grid grid-cols-1 lg:grid-cols-2 gap-12 items-center p-6">
        
        <div class="text-center lg:text-left space-y-4 select-none">
            <h1 class="text-6xl lg:text-8xl font-black tracking-tighter text-white drop-shadow-sm font-sans">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-white">Path</span><span class="text-yellow-400">Loka</span>
            </h1>
            <h2 class="text-2xl lg:text-4xl font-medium text-blue-100 leading-tight font-sans">
                A place <br class="hidden lg:block"> to find your <br> career path
            </h2>
        </div>

        <div class="w-full max-w-md mx-auto lg:mr-0">
            <div class="bg-white/10 backdrop-blur-lg border border-white/20 p-8 rounded-3xl shadow-2xl relative">
                
                <h3 class="text-3xl font-bold text-white mb-8 text-center">
                    Login <span class="text-yellow-400">UMKM</span>
                </h3>

                <form action="{{ route('process.login.umkm') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label class="block text-blue-200 text-sm font-semibold mb-2 ml-1">Email</label>
                        <div class="flex items-center bg-black/20 border border-white/10 rounded-xl overflow-hidden h-12 focus-within:ring-2 focus-within:ring-blue-400 transition-all duration-200">
                            <div class="pl-4 pr-3 text-blue-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" /><path d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" /></svg>
                            </div>
                            <input type="email" name="email" placeholder="UMKMName@outlook.com" class="w-full bg-transparent border-none focus:ring-0 text-white placeholder-blue-200/50 h-full" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-blue-200 text-sm font-semibold mb-2 ml-1">Password</label>
                        <div class="flex items-center bg-black/20 border border-white/10 rounded-xl overflow-hidden h-12 focus-within:ring-2 focus-within:ring-blue-400 relative transition-all duration-200">
                            <div class="pl-4 pr-3 text-blue-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z" clip-rule="evenodd" /></svg>
                            </div>
                            
                            <input id="login_password" type="password" name="password" placeholder="********" class="w-full bg-transparent border-none focus:ring-0 text-white placeholder-blue-200/50 h-full" required>
                            
                            <button type="button" onclick="togglePassword()" class="pr-3 text-blue-300 hover:text-white focus:outline-none transition-colors">
                                <svg id="eye_open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hidden">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <svg id="eye_slash" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="text-sm text-blue-200 pt-2 text-center">
                        Don't have an account? 
                        <a href="{{ route('register.umkm') }}" class="text-yellow-400 hover:text-yellow-300 font-bold hover:underline transition">Register</a>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-bold py-3.5 rounded-xl transition duration-300 shadow-lg shadow-blue-900/30 transform active:scale-95 tracking-wide">
                        Login
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        const input = document.getElementById('login_password');
        const eyeOpen = document.getElementById('eye_open');
        const eyeSlash = document.getElementById('eye_slash');

        if (input.type === "password") {
            input.type = "text";
            eyeOpen.classList.remove('hidden');
            eyeSlash.classList.add('hidden');
        } else {
            input.type = "password";
            eyeOpen.classList.add('hidden');
            eyeSlash.classList.remove('hidden');
        }
    }
</script>
<style>
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    .animate-blob {
        animation: blob 7s infinite;
    }
    .animation-delay-2000 {
        animation-delay: 2s;
    }
    .animation-delay-4000 {
        animation-delay: 4s;
    }
</style>
@endsection