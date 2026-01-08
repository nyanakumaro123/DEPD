@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 overflow-hidden relative font-sans pb-20">
    <!-- Decorative background elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-0 -right-4 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>

    @include('layouts.navbar')

    <div class="relative z-10 max-w-4xl mx-auto p-6 pt-10">
        <!-- Page Title -->
        <h2 class="text-5xl font-bold text-white mb-10 font-serif">
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-white">Notifikasi</span>
        </h2>

        <div class="space-y-4">
            {{-- @foreach([1,2,3,4,5,6] as $item) --}}
            <div class="bg-white/10 backdrop-blur-lg border border-white/10 rounded-2xl p-5 flex items-start gap-4 shadow-xl transition hover:bg-white/15">
                <!-- Notification Image -->
                <div class="shrink-0">
                    <img 
                        src="https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=400&q=80"
                        class="w-14 h-14 rounded-xl object-cover border border-white/20 shadow-md"
                        alt="Notification Icon"
                    />
                </div>

                <!-- Message Content -->
                <div class="flex-1 text-white">
                    <!-- Example of Short Message -->
                    {{-- @if($loop->index !== 2) --}}
                        <p class="font-bold text-lg text-blue-100">Selamat! Magang anda diterima di Restomie!</p>
                        <p class="text-xs text-blue-300/60 mt-1">2 jam yang lalu</p>
                    {{-- @else --}}
                    <!-- Example of Long Expandable Message -->
                        <details class="group">
                            <summary class="font-bold text-lg text-blue-100 cursor-pointer select-none flex items-center justify-between list-none">
                                <span>Magang anda ditolak Restomie.</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-300 transition-transform group-open:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </summary>

                            <div class="mt-3 p-4 bg-black/20 rounded-xl border border-white/5 text-blue-100/80 text-sm leading-relaxed italic">
                                "Mohon maaf, saat ini kualifikasi anda belum sesuai dengan kebutuhan tim kami. Tetap semangat dan jangan menyerah!"
                            </div>
                            <p class="text-xs text-blue-300/60 mt-2">1 hari yang lalu</p>
                        </details>
                    {{-- @endif --}}
                </div>
            </div>
            {{-- @endforeach --}}
        </div>
    </div>
</div>

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
    summary::-webkit-details-marker { display: none; }
</style>
@endsection
