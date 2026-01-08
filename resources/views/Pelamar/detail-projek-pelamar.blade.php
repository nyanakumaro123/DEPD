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

    <div class="relative z-10 max-w-4xl mx-auto px-6 mt-10">
        {{-- BACK BUTTON --}}
        <div class="mb-6">
            <a href="javascript:history.back()" class="text-blue-400 hover:text-blue-200 transition flex items-center gap-2 text-sm font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Kembali
            </a>
        </div>

        <div class="bg-white/10 backdrop-blur-lg rounded-3xl shadow-2xl border border-white/10 overflow-hidden">
            {{-- HEADER SECTION --}}
            <div class="p-8 md:p-10 border-b border-white/10 bg-white/5">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div>
                        <span class="px-3 py-1 bg-blue-500/20 text-blue-300 text-xs font-bold rounded-full border border-blue-500/30 uppercase tracking-wider">
                            {{ $project->category }}
                        </span>
                        <h1 class="text-4xl font-bold text-white mt-3 font-serif leading-tight">
                            {{ $project->title }}
                        </h1>
                        <p class="text-blue-400 font-semibold text-xl mt-2 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                            {{ $project->umkm->umkmProfile->umkm_name ?? $project->umkm->name }}
                        </p>
                    </div>
                    <div class="text-right">
                        <div class="inline-block bg-white/5 rounded-2xl p-4 border border-white/10 text-center min-w-[140px]">
                            <p class="text-blue-300/70 text-xs uppercase font-bold tracking-widest">Deadline</p>
                            <p class="text-white text-lg font-bold mt-1">{{ \Carbon\Carbon::parse($project->application_deadline)->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-8 md:p-10">
                {{-- META GRID --}}
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-10">
                    <div class="space-y-1">
                        <p class="text-blue-300/50 text-xs font-bold uppercase">Tipe</p>
                        <p class="text-blue-100 font-medium">{{ ucfirst($project->employment_type) }}</p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-blue-300/50 text-xs font-bold uppercase">Sistem</p>
                        <p class="text-blue-100 font-medium">{{ ucfirst($project->work_system) }}</p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-blue-300/50 text-xs font-bold uppercase">Hari Kerja</p>
                        <p class="text-blue-100 font-medium">{{ $project->working_days }}</p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-blue-300/50 text-xs font-bold uppercase">Jam Kerja</p>
                        <p class="text-blue-100 font-medium">{{ $project->time_start }} - {{ $project->time_end }}</p>
                    </div>
                </div>

                {{-- SALARY CARD --}}
                <div class="bg-gradient-to-r from-blue-600/20 to-indigo-600/20 rounded-2xl p-6 border border-blue-500/30 mb-10 flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="p-3 bg-blue-500/20 rounded-xl text-blue-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <div>
                            <p class="text-blue-300/70 text-sm font-medium">Estimasi Gaji</p>
                            <p class="text-2xl font-bold text-white">
                                {{ $project->currency }} {{ number_format($project->salary_min) }} - {{ number_format($project->salary_max) }}
                                <span class="text-sm font-normal text-blue-300/60">/ {{ str_replace('_',' ', $project->salary_frequency) }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <span class="px-4 py-2 rounded-lg {{ $project->status === 'open' ? 'bg-green-500/20 text-green-400 border border-green-500/30' : 'bg-red-500/20 text-red-400 border border-red-500/30' }} font-bold text-sm tracking-widest">
                            {{ strtoupper($project->status) }}
                        </span>
                    </div>
                </div>

                {{-- CONTENT --}}
                <div class="space-y-10">
                    <section>
                        <h3 class="text-xl font-bold text-blue-200 flex items-center gap-2 mb-4">
                            <span class="w-8 h-1 bg-blue-500 rounded-full"></span>
                            Deskripsi Pekerjaan
                        </h3>
                        <p class="text-blue-100/80 leading-relaxed text-lg">
                            {{ $project->description }}
                        </p>
                    </section>

                    @if($project->benefits)
                    <section>
                        <h3 class="text-xl font-bold text-blue-200 flex items-center gap-2 mb-4">
                            <span class="w-8 h-1 bg-indigo-500 rounded-full"></span>
                            Benefit & Fasilitas
                        </h3>
                        <div class="bg-white/5 rounded-2xl p-6 border border-white/5 text-blue-100/80 italic">
                            "{{ $project->benefits }}"
                        </div>
                    </section>
                    @endif
                </div>

                {{-- ACTION BUTTONS --}}
                <div class="mt-12 pt-8 border-t border-white/10">
                    @if($alreadyApplied)
                        <div class="flex items-center justify-center gap-3 bg-white/5 text-blue-300/50 py-5 rounded-2xl border border-white/10 font-bold text-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            Anda Sudah Melamar Project Ini
                        </div>
                    @elseif($project->status !== 'open')
                        <div class="flex items-center justify-center gap-3 bg-red-500/10 text-red-400 py-5 rounded-2xl border border-red-500/20 font-bold text-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            Lowongan Sudah Ditutup
                        </div>
                    @else
                        <form action="{{ route('apply.project', $project) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white py-5 rounded-2xl font-bold text-xl transition-all shadow-xl shadow-blue-900/40 flex items-center justify-center gap-3 group">
                                Apply Sekarang
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:translate-x-2 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" /></svg>
                            </button>
                        </form>
                    @endif
                </div>
            </div>
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
