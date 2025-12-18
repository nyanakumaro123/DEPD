@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center p-6 bg-cover bg-center font-sans" 
     style="background-image: linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85)), url('https://images.unsplash.com/photo-1497366216548-37526070297c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');">

    <div class="max-w-6xl w-full grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        
        <div class="text-center lg:text-left space-y-4 select-none">
            <h1 class="text-5xl lg:text-6xl font-bold font-serif tracking-wider">
                <span class="text-white drop-shadow-md" style="-webkit-text-stroke: 1px #888;">P</span><span class="text-gray-500">ath</span><span class="text-yellow-400 drop-shadow-sm" style="-webkit-text-stroke: 1px #b89200;">Loka</span>
            </h1>
            <h2 class="text-4xl lg:text-5xl font-extrabold text-[#2b4c8c] leading-tight">
                A place <br> to find your <br> career path
            </h2>
        </div>

        <div class="w-full max-w-md mx-auto lg:mr-0">
            <div class="bg-[#355dad] p-8 rounded-2xl shadow-2xl relative">
                
                <h3 class="text-2xl font-bold text-white mb-6">
                    Register - <span class="text-yellow-400">Job Seeker</span>
                </h3>

                <form action="{{ route('process.register.pelamar') }}" method="POST" class="space-y-4">
                    @csrf
                    
                    <div>
                        <label class="block text-blue-100 text-sm font-semibold mb-1 ml-1">Email</label>
                        <div class="flex items-center bg-[#eef2ff] rounded-lg overflow-hidden h-12 focus-within:ring-2 focus-within:ring-yellow-400 transition-all duration-200">
                            <div class="pl-3 pr-2 text-[#355dad]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z"/><path d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z"/></svg>
                            </div>
                            <input type="email" name="email" placeholder="applicant@example.com" class="w-full bg-transparent border-none focus:ring-0 text-gray-700 placeholder-gray-400 h-full" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-blue-100 text-sm font-semibold mb-1 ml-1">Name</label>
                        <div class="flex items-center bg-[#eef2ff] rounded-lg overflow-hidden h-12 focus-within:ring-2 focus-within:ring-yellow-400 transition-all duration-200">
                            <div class="pl-3 pr-2 text-[#355dad]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" /></svg>
                            </div>
                            <input type="text" name="name" placeholder="Your Name" class="w-full bg-transparent border-none focus:ring-0 text-gray-700 placeholder-gray-400 h-full" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-blue-100 text-sm font-semibold mb-1 ml-1">Password</label>
                        <div class="flex items-center bg-[#eef2ff] rounded-lg overflow-hidden h-12 focus-within:ring-2 focus-within:ring-yellow-400 relative transition-all duration-200">
                            <div class="pl-3 pr-2 text-[#355dad]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z" clip-rule="evenodd" /></svg>
                            </div>
                            
                            <input id="password" name="password" type="password" placeholder="Password" class="w-full bg-transparent border-none focus:ring-0 text-gray-700 placeholder-gray-400 h-full" required>
                            
                            <button type="button" onclick="togglePassword('password', 'eye_open_pass', 'eye_slash_pass')" class="pr-3 text-gray-400 hover:text-[#355dad] focus:outline-none transition-colors">
                                <svg id="eye_open_pass" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hidden">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <svg id="eye_slash_pass" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div>
                        <label class="block text-blue-100 text-sm font-semibold mb-1 ml-1">Confirm Password</label>
                        <div class="flex items-center bg-[#eef2ff] rounded-lg overflow-hidden h-12 focus-within:ring-2 focus-within:ring-yellow-400 relative transition-all duration-200">
                            <div class="pl-3 pr-2 text-[#355dad]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z" clip-rule="evenodd" /></svg>
                            </div>
                            
                            <input id="confirm_password" name="password_confirmation" type="password" placeholder="Confirm Password" class="w-full bg-transparent border-none focus:ring-0 text-gray-700 placeholder-gray-400 h-full" required>
                            
                            <button type="button" onclick="togglePassword('confirm_password', 'eye_open_conf', 'eye_slash_conf')" class="pr-3 text-gray-400 hover:text-[#355dad] focus:outline-none transition-colors">
                                <svg id="eye_open_conf" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hidden">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <svg id="eye_slash_conf" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="text-sm text-white pt-2">
                        Already have an account? 
                        <a href="{{ route('login.pelamar') }}" class="text-yellow-400 hover:text-yellow-300 font-bold hover:underline transition">Login</a>
                    </div>

                    <button type="submit" class="w-full bg-[#bfd3ff] hover:bg-blue-200 text-[#2b4c8c] font-bold py-3 rounded-xl transition duration-300 shadow-lg transform active:scale-95">
                        Register
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    function togglePassword(inputId, eyeOpenId, eyeSlashId) {
        const input = document.getElementById(inputId);
        const eyeOpen = document.getElementById(eyeOpenId);
        const eyeSlash = document.getElementById(eyeSlashId);

        if (input.type === "password") {
            // Ubah jadi Text (Visible)
            input.type = "text";
            eyeOpen.classList.remove('hidden');
            eyeSlash.classList.add('hidden');
        } else {
            // Ubah jadi Password (Invisible)
            input.type = "password";
            eyeOpen.classList.add('hidden');
            eyeSlash.classList.remove('hidden');
        }
    }
</script>
@endsection