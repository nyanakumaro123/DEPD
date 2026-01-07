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
    
    <div class="relative z-10 max-w-6xl mx-auto px-6 mt-10">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h2 class="text-4xl font-bold text-blue-200 font-serif">Daftar Pelamar</h2>
                <p class="text-blue-300/70 mt-1">Kelola dan tinjau kandidat terbaik untuk project Anda.</p>
            </div>

            {{-- FILTER --}}
            <form method="GET" class="flex items-center gap-2 bg-white/10 backdrop-blur-md p-2 rounded-xl border border-white/10 shadow-xl">
                <div class="relative">
                    <select name="major_id" class="bg-slate-800/50 border border-blue-400/30 text-blue-100 py-2 px-4 pr-10 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition appearance-none cursor-pointer text-sm">
                        <option value="" class="bg-slate-900">Semua Major</option>
                        @foreach($majors as $major)
                            <option value="{{ $major->id }}" class="bg-slate-900"
                                {{ request('major_id') == $major->id ? 'selected' : '' }}>
                                {{ $major->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-blue-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
                <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white px-5 py-2 rounded-lg font-medium transition shadow-lg shadow-blue-900/20 flex items-center gap-2 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" /></svg>
                    Filter
                </button>
            </form>
        </div>

        {{-- LIST --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($pelamars as $pelamar)
                <div class="group bg-white/10 backdrop-blur-lg p-6 rounded-2xl shadow-xl border border-white/10 hover:border-blue-400/50 transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white text-xl font-bold shadow-lg border-2 border-white/20">
                            {{ strtoupper(substr($pelamar->name, 0, 1)) }}
                        </div>
                        <span class="px-3 py-1 bg-blue-500/20 text-blue-300 text-xs font-medium rounded-full border border-blue-500/30">
                            Kandidat
                        </span>
                    </div>
                    
                    <h3 class="font-bold text-xl text-white group-hover:text-blue-300 transition-colors">{{ $pelamar->name }}</h3>
                    <div class="flex items-center gap-2 mt-1 text-blue-300/70">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                        <p class="text-sm">{{ $pelamar->pelamarProfile->major->name ?? 'Major tidak ditentukan' }}</p>
                    </div>

                    <div class="mt-6 pt-4 border-t border-white/5 flex items-center justify-between">
                        <a href="{{ route('umkm.pelamar.show', $pelamar) }}"
                           class="w-full text-center bg-white/5 hover:bg-blue-600 text-blue-200 hover:text-white py-2.5 rounded-lg font-semibold transition-all duration-200 border border-blue-400/30 hover:border-transparent">
                           Lihat Detail Profil
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-white/5 backdrop-blur-sm border border-dashed border-blue-400/30 rounded-2xl p-12 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-500/10 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-200">Belum ada pelamar</h3>
                    <p class="text-blue-300/60 mt-2">Coba ubah filter Anda atau tunggu kandidat melamar ke project Anda.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-10 flex justify-center">
            <div class="bg-white/5 backdrop-blur-md p-2 rounded-xl border border-white/10">
                {{ $pelamars->withQueryString()->links() }}
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

    /* Custom Pagination Styling for Dark Theme */
    .pagination {
        display: flex;
        gap: 0.5rem;
    }
    .page-link {
        background-color: rgba(255, 255, 255, 0.05) !important;
        border-color: rgba(147, 197, 253, 0.3) !important;
        color: #93c5fd !important;
        border-radius: 0.5rem !important;
    }
    .page-item.active .page-link {
        background-color: #2563eb !important;
        border-color: transparent !important;
        color: white !important;
    }
    .page-link:hover {
        background-color: rgba(255, 255, 255, 0.1) !important;
    }
</style>
@endsection
