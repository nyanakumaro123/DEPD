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

<div class="relative z-10 p-6 max-w-6xl mx-auto pt-10">

    <h1 class="text-4xl font-bold text-blue-200 mb-2 font-serif">{{ $project->title }}</h1>
    <p class="text-blue-300/80 mb-6 text-lg">{{ $project->category }}</p>

    <h2 class="text-2xl font-semibold text-blue-200 mb-4">Daftar Pelamar</h2>

    <div class="space-y-4">
        @forelse($project->applications as $app)
            <div class="bg-white/10 backdrop-blur-lg p-4 rounded-xl shadow-lg shadow-blue-900/30 flex justify-between items-center border border-white/10 hover:border-blue-400 transition">
                <div>
                    <p class="font-bold text-white text-lg">{{ $app->pelamar->name }}</p>
                    <p class="text-sm text-blue-200/80">
                        {{ $app->pelamar->pelamarProfile->major->name ?? '-' }}
                    </p>

                    @if($app->pelamar->pelamarProfile->portfolio)
                        <a href="{{ asset('storage/portfolio/' . $app->pelamar->pelamarProfile->portfolio) }}"
                           target="_blank"
                           class="text-blue-400 hover:text-blue-300 text-sm mt-1 inline-block">
                            📄 Lihat Portfolio
                        </a>
                    @endif
                </div>

                <span class="text-sm font-semibold capitalize px-3 py-1 rounded-full
                    @if($app->status == 'pending')
                        bg-yellow-500/20 text-yellow-300 border border-yellow-500
                    @elseif($app->status == 'accepted')
                        bg-green-500/20 text-green-300 border border-green-500
                    @else {{-- rejected --}}
                        bg-red-500/20 text-red-300 border border-red-500
                    @endif
                ">
                    {{ $app->status }}
                </span>
            </div>
        @empty
            <p class="text-blue-300/80 text-center py-10 text-lg">Belum ada pelamar untuk proyek ini.</p>
        @endforelse
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
</style>
@endsection
