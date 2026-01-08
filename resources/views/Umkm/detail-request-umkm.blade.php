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

    <div class="relative z-10 max-w-4xl mx-auto p-6 pt-10">

        <h2 class="text-5xl font-bold text-white mb-2 font-serif">
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-white">Detail Pelamar</span>
        </h2>

        <p class="text-xl text-blue-200 mb-10 italic">
            {{ $application->pelamar->name }} melamar ke <span class="font-bold text-white">{{ $application->project->title }}</span>
        </p>

        {{-- CARD CONTAINER --}}
        <div class="bg-white/10 backdrop-blur-lg border border-white/10 rounded-3xl shadow-2xl p-8 mb-10">

            {{-- PITCH --}}
            <div class="mb-8">
                <label class="block text-xs font-bold text-blue-200 uppercase tracking-widest mb-4">
                    Pitch / Pesan Pelamar
                </label>

                <div class="bg-white/5 border border-white/10 rounded-2xl p-6 text-blue-100 leading-relaxed text-lg italic shadow-inner">
                    "{{ $application->pitch ?? 'Saya mahasiswa Desain Komunikasi Visual semester 6. Pernah membuat branding untuk 3 UMKM kecil. Saya tertarik bantu proyek ini karena fokus saya memang di desain identitas. Saya siap mulai segera.' }}"
                </div>
            </div>

            {{-- PORTOFOLIO BUTTON --}}
            <div class="mb-10">
                <a href="{{ $application->pelamar->portfolio_url ?? '#' }}" target="_blank"
                   class="block w-full text-center
                          bg-blue-600 hover:bg-blue-500 text-white
                          py-4 rounded-2xl font-bold transition
                          shadow-lg shadow-blue-900/40">
                    Lihat Portofolio Pelamar
                </a>
            </div>

            {{-- ACTION BUTTONS --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                {{-- TOLAK --}}
                <form method="POST" action="{{ route('umkm.application.reject', $application->id) }}" class="flex">
                    @csrf
                    <button class="w-full bg-red-600 hover:bg-red-500 text-white py-3 rounded-xl font-bold transition shadow-lg shadow-red-900/30">
                        Tolak Lamaran
                    </button>
                </form>

                {{-- KONTAK --}}
                <a href="https://wa.me/{{ $application->pelamar->phone ?? '' }}" target="_blank"
                   class="flex items-center justify-center bg-yellow-600 hover:bg-yellow-500 text-white py-3 rounded-xl font-bold transition shadow-lg shadow-yellow-900/30">
                    Hubungi Pelamar
                </a>

                {{-- TERIMA --}}
                <form method="POST" action="{{ route('umkm.application.accept', $application->id) }}" class="flex">
                    @csrf
                    <button class="w-full bg-green-600 hover:bg-green-500 text-white py-3 rounded-xl font-bold transition shadow-lg shadow-green-900/30">
                        Terima Pelamar
                    </button>
                </form>
            </div>
        </div>

        {{-- BACK BUTTON --}}
        <div class="text-center">
            <a href="{{ url()->previous() }}"
               class="inline-flex items-center gap-2 text-blue-300 hover:text-white transition font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Daftar Pelamar
            </a>
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
    .animate-blob { animation: blob 7s infinite; }
    .animate-delay-2000 { animation-delay: 2s; }
    .animate-delay-4000 { animation-delay: 4s; }
</style>
@endsection
