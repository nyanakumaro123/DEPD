@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 overflow-hidden relative font-sans pb-20">
    <!-- Decorative background elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-0 -right-4 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>

    {{-- NAVBAR --}}
    @include('layouts.navbar')

    {{-- CONTENT --}}
    <div class="relative z-10 max-w-5xl mx-auto p-6 pt-10">

        {{-- TITLE --}}
        <h2 class="text-5xl font-bold text-white mb-10 font-serif">
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-white">Permohonan Lamaran</span>
        </h2>

        {{-- ===================== DITERIMA ===================== --}}
        <section class="mb-10">
            <h3 class="text-2xl font-bold text-green-400 mb-4 flex items-center gap-2">
                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                Diterima
            </h3>

            <div class="space-y-3">
                <div class="bg-white/10 backdrop-blur-lg border border-white/10 rounded-2xl p-5 flex items-center justify-between shadow-xl transition hover:bg-white/15 group">

                    <div class="flex items-center gap-3">
                        <img src="https://i.pravatar.cc/40?img=11"
                             class="w-10 h-10 rounded-xl object-cover border border-white/20 shadow-md" alt="UMKM">
                        <span class="text-white font-bold text-lg group-hover:text-green-300 transition">
                            Restomie
                        </span>
                    </div>

                    <span class="bg-green-500/20 text-green-300 border border-green-500/30 px-4 py-1.5 rounded-full text-sm font-bold capitalize tracking-wide">
                        diterima
                    </span>
                </div>
            </div>
        </section>

        {{-- ===================== PENDING ===================== --}}
        <section>
            <h3 class="text-2xl font-bold text-blue-200 mb-4 flex items-center gap-2">
                <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                Pending
            </h3>

            <div class="space-y-3">
                @for ($i = 0; $i < 9; $i++)
                    <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-5 flex items-center justify-between shadow-xl transition hover:bg-white/10 group">

                        <div class="flex items-center gap-3">
                            <img src="https://i.pravatar.cc/40?img=22"
                                 class="w-10 h-10 rounded-xl object-cover border border-white/20 shadow-md" alt="UMKM">
                            <span class="text-white font-bold text-lg group-hover:text-blue-300 transition">
                                CatCatCafe
                            </span>
                        </div>

                        <span class="bg-yellow-500/20 text-yellow-300 border border-yellow-500/30 px-4 py-1.5 rounded-full text-sm font-bold capitalize tracking-wide">
                            Pending
                        </span>
                    </div>
                @endfor
            </div>
        </section>
    </div>
</div>

<style>
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    .animate-blob { animation: blob 7s infinite; }
    .animation-delay-2000 { animation-delay: 2s; }
    .animation-delay-4000 { animation-delay: 4s; }
</style>
@endsection
