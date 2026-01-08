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

    <div class="relative z-10 max-w-5xl mx-auto p-6 pt-10">
        <!-- Page Title -->
        <h2 class="text-5xl font-bold text-white mb-10 font-serif">
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-white">Status Lamaran</span>
        </h2>

        <div class="space-y-4">
            @forelse ($applications as $app)
                <div class="bg-white/10 backdrop-blur-lg border border-white/10 rounded-2xl p-6 flex flex-col md:flex-row md:items-center justify-between gap-4 shadow-xl transition hover:bg-white/15 group">
                    <div class="flex items-center gap-5">
                        {{-- UMKM Logo/Initial --}}
                        <div class="shrink-0">
                            @if($app->project->umkm->umkmProfile && $app->project->umkm->umkmProfile->profile_photo)
                                <img src="{{ asset('storage/' . $app->project->umkm->umkmProfile->profile_photo) }}" 
                                     alt="UMKM" class="w-16 h-16 rounded-2xl object-cover border border-white/20 shadow-md">
                            @else
                                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center border border-white/20 shadow-md">
                                    <span class="text-white font-bold text-xl">{{ substr($app->project->umkm->name, 0, 1) }}</span>
                                </div>
                            @endif
                        </div>

                        <div>
                            <h3 class="text-xl font-bold text-white group-hover:text-blue-300 transition">{{ $app->project->title }}</h3>
                            <p class="text-blue-200 font-medium">{{ $app->project->umkm->name }}</p>
                            <p class="text-xs text-blue-300/60 mt-1">Dikirim pada {{ $app->created_at->format('d M Y') }}</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between md:justify-end gap-6">
                        @php
                            $statusColor = match($app->status) {
                                'accepted' => 'bg-green-500/20 text-green-300 border-green-500/30',
                                'rejected' => 'bg-red-500/20 text-red-300 border-red-500/30',
                                default => 'bg-yellow-500/20 text-yellow-300 border-yellow-500/30',
                            };
                        @endphp
                        <span class="{{ $statusColor }} border px-4 py-1.5 rounded-full text-sm font-bold capitalize tracking-wide">
                            {{ $app->status }}
                        </span>
                        
                        <a href="{{ route('explore.show', $app->project) }}" class="text-blue-400 hover:text-white transition" title="Lihat Detail Project">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            @empty
                <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-10 text-center">
                    <p class="text-blue-200 text-lg italic">Belum ada lamaran yang dikirim.</p>
                    <a href="{{ route('explore.index') }}" class="inline-block mt-4 text-yellow-400 hover:underline font-bold">Cari Project Sekarang →</a>
                </div>
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
    .animate-blob { animation: blob 7s infinite; }
    .animation-delay-2000 { animation-delay: 2s; }
    .animation-delay-4000 { animation-delay: 4s; }
</style>
@endsection
