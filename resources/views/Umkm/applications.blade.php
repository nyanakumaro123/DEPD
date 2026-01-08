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

    <div class="relative z-10 max-w-6xl mx-auto p-6 pt-10">

        <h2 class="text-5xl font-bold text-white mb-10 font-serif">
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-white">Daftar Pelamar Project</span>
        </h2>

        {{-- TABLE CONTAINER --}}
        <div class="overflow-x-auto bg-white/10 backdrop-blur-lg border border-white/10 rounded-3xl shadow-2xl">

            <table class="w-full border-collapse">
                <thead>
                    <tr class="border-b border-white/10 bg-white/5">
                        <th class="p-5 text-left text-blue-200 font-bold uppercase tracking-wider text-xs">Pelamar</th>
                        <th class="p-5 text-left text-blue-200 font-bold uppercase tracking-wider text-xs">Project</th>
                        <th class="p-5 text-left text-blue-200 font-bold uppercase tracking-wider text-xs">Tanggal Lamar</th>
                        <th class="p-5 text-left text-blue-200 font-bold uppercase tracking-wider text-xs">Status</th>
                        <th class="p-5 text-center text-blue-200 font-bold uppercase tracking-wider text-xs">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-white/5">
                    @forelse ($applications as $application)
                        <tr class="hover:bg-white/5 transition group">

                            {{-- Pelamar --}}
                            <td class="p-5">
                                <div class="flex items-center gap-4">
                                    <img
                                        src="https://i.pravatar.cc/40?u={{ $application->pelamar->id }}"
                                        class="w-10 h-10 rounded-xl object-cover border border-white/20 shadow-md"
                                        alt="Avatar"
                                    >
                                    <span class="font-bold text-white group-hover:text-blue-300 transition">
                                        {{ $application->pelamar->name }}
                                    </span>
                                </div>
                            </td>

                            {{-- Project --}}
                            <td class="p-5 text-blue-100 font-medium">
                                {{ $application->project->title }}
                            </td>

                            {{-- Tanggal --}}
                            <td class="p-5 text-sm text-blue-300/60">
                                {{ $application->created_at->format('d M Y') }}
                            </td>

                            {{-- Status --}}
                            <td class="p-5">
                                @php
                                    $statusClasses = match($application->status) {
                                        'accepted' => 'bg-green-500/20 text-green-300 border-green-500/30',
                                        'rejected' => 'bg-red-500/20 text-red-300 border-red-500/30',
                                        default => 'bg-yellow-500/20 text-yellow-300 border-yellow-500/30',
                                    };
                                @endphp
                                <span class="{{ $statusClasses }} border px-4 py-1.5 rounded-full text-xs font-bold capitalize tracking-wide">
                                    {{ $application->status }}
                                </span>
                            </td>

                            {{-- Aksi --}}
                            <td class="p-5 text-center">
                                @if ($application->status === 'pending')
                                    <div class="flex justify-center gap-3">

                                        <form method="POST" action="{{ route('umkm.application.accept', $application->id) }}">
                                            @csrf
                                            <button
                                                class="px-4 py-2 bg-green-600 hover:bg-green-500 text-white font-bold rounded-xl transition shadow-lg shadow-green-900/30 text-sm">
                                                Terima
                                            </button>
                                        </form>

                                        <form method="POST" action="{{ route('umkm.application.reject', $application->id) }}">
                                            @csrf
                                            <button
                                                class="px-4 py-2 bg-red-600 hover:bg-red-500 text-white font-bold rounded-xl transition shadow-lg shadow-red-900/30 text-sm">
                                                Tolak
                                            </button>
                                        </form>

                                    </div>
                                @else
                                    <span class="text-blue-300/30 italic text-sm">Processed</span>
                                @endif
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-10 text-center">
                                <p class="text-blue-200 text-lg italic">Belum ada pelamar untuk project Anda.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
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
