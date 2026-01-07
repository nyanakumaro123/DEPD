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

    <div class="relative z-10 max-w-2xl mx-auto px-6 mt-10">
        <div class="mb-6">
            <a href="{{ route('umkm.pelamar.index') }}" class="text-blue-400 hover:text-blue-200 transition flex items-center gap-2 text-sm font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Kembali ke Daftar Pelamar
            </a>
        </div>

        <div class="bg-white/10 backdrop-blur-lg p-8 rounded-2xl shadow-2xl border border-white/10">
            <div class="flex flex-col items-center text-center mb-8">
                <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white text-4xl font-bold shadow-xl border-4 border-white/10 mb-4">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <h2 class="text-3xl font-bold text-white">{{ $user->name }}</h2>
                <p class="text-blue-300 font-medium mt-1">
                    {{ $user->pelamarProfile->major->name ?? 'Major tidak ditentukan' }}
                </p>
            </div>

            <div class="space-y-6">
                @if($user->pelamarProfile->portfolio)
                    <div class="bg-white/5 rounded-xl p-4 border border-white/5">
                        <h4 class="text-blue-200 text-sm font-semibold uppercase tracking-wider mb-3">Dokumen Pendukung</h4>
                        <a href="{{ asset('storage/portfolio/'.$user->pelamarProfile->portfolio) }}"
                           target="_blank"
                           class="flex items-center justify-between bg-blue-600/20 hover:bg-blue-600/40 text-blue-100 p-4 rounded-lg transition border border-blue-500/30 group">
                           <div class="flex items-center gap-3">
                               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg>
                               <span class="font-medium">Lihat Portfolio PDF</span>
                           </div>
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                        </a>
                    </div>
                @endif

                {{-- INVITE SECTION --}}
                <div class="mt-10 pt-8 border-t border-white/10">
                    <h4 class="text-blue-200 text-sm font-semibold uppercase tracking-wider mb-4">Undang ke Project</h4>
                    <form method="POST" action="{{ route('umkm.invite') }}" class="space-y-4">
                        @csrf
                        <input type="hidden" name="pelamar_id" value="{{ $user->id }}">

                        <div class="relative">
                            <label class="block text-blue-300/70 text-xs mb-2 ml-1">Pilih Project Anda</label>
                            <select name="project_id" class="w-full bg-slate-800/50 border border-blue-400/30 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition appearance-none cursor-pointer [&>option]:bg-slate-900" style="background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%2393c5fd%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1.2em;">
                                @foreach(auth()->user()->projects as $project)
                                    <option value="{{ $project->id }}">
                                        {{ $project->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white py-4 rounded-xl font-bold transition-all shadow-lg shadow-blue-900/40 flex items-center justify-center gap-2 group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" /></svg>
                            Kirim Undangan Project
                        </button>
                    </form>
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

    /* Custom Scrollbar for the whole page */
    ::-webkit-scrollbar {
        width: 8px;
    }
    ::-webkit-scrollbar-track {
        background: rgba(15, 23, 42, 0.1);
    }
    ::-webkit-scrollbar-thumb {
        background: rgba(59, 130, 246, 0.2);
        border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: rgba(59, 130, 246, 0.5);
    }
</style>
@endsection
