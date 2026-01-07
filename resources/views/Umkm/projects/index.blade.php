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
    @php
        $umkmName = auth()->user()->umkmProfile->umkm_name ?? 'UMKM';
    @endphp
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-blue-200 font-serif flex items-baseline">
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-white text-3xl mr-3">Project</span>
            <span class="flex-1">{{ $umkmName }}</span>
        </h1>
        <a href="{{ route('umkm.projects.create') }}" 
           class="bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition shadow-md">
            + Tambah Project
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-900/30 border border-green-500 text-green-300 px-4 py-3 rounded-lg mb-4 backdrop-blur-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid md:grid-cols-2 gap-6">
        @forelse($projects as $project)
            <div class="bg-white/10 backdrop-blur-lg p-5 rounded-xl shadow-lg shadow-blue-900/30 flex flex-col justify-between border border-white/10 hover:border-blue-400 transition">
                <div>
                    <div class="flex justify-between items-start">
                        <h3 class="font-bold text-xl text-white">{{ $project->title }}</h3>
                        <span class="text-xs bg-orange-500/20 text-orange-300 px-2 py-1 rounded-full border border-orange-500">
                            {{ $project->category }}
                        </span>
                    </div>
                    
                    <p class="mt-2 text-sm text-blue-200/80 line-clamp-2">
                        {{ $project->description }}
                    </p>

                    <p class="mt-3 text-sm font-medium text-blue-300">
                        <span class="mr-1">👥</span> {{ $project->applications_count }} Pelamar
                    </p>
                </div>

                <div class="mt-4 flex items-center justify-between border-t pt-4">
                    <a href="{{ route('umkm.projects.show', $project) }}"
                       class="text-blue-400 font-semibold text-sm hover:text-blue-300 transition">
                        Lihat Detail
                    </a>

                    <div class="flex space-x-2">
                        <a href="{{ route('umkm.projects.edit', $project) }}" 
                           class="text-blue-300 hover:text-yellow-400 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.5L15.232 5.232z" />
                            </svg>
                            Edit
                        </a>
                        
                        <form action="{{ route('umkm.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus project ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-blue-300 hover:text-red-400 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-2 text-center py-10 text-blue-300/80 text-lg">
                Belum ada project. Silakan buat project baru.
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