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
        <h1 class="text-3xl font-bold mb-8 text-blue-200 font-serif">Project yang Saya Lamar</h1>

        <div class="grid gap-6">
            @forelse($applications as $app)
                <div class="bg-white/10 backdrop-blur-lg border border-white/10 p-6 rounded-xl shadow-lg shadow-blue-900/20 hover:bg-white/15 transition-all duration-300 group">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div>
                            <h3 class="font-bold text-xl text-white group-hover:text-blue-300 transition">{{ $app->project->title }}</h3>
                            <p class="text-blue-300/70 text-sm mt-1 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m4 0h1m-4 4h1m4 4h1m-7 4h1m4 4h1"></path></svg>
                                UMKM: {{ $app->project->umkm->name }}
                            </p>
                        </div>

                        <div class="flex items-center justify-between md:justify-end gap-6">
                            <div class="flex flex-col items-end">
                                <span class="text-xs text-blue-300/50 uppercase tracking-wider">Status</span>
                                <span class="px-3 py-1 rounded-full text-xs font-medium mt-1 capitalize 
                                    {{ $app->status === 'accepted' ? 'bg-green-500/20 text-green-300 border border-green-500/30' : 
                                       ($app->status === 'rejected' ? 'bg-red-500/20 text-red-300 border border-red-500/30' : 
                                       'bg-yellow-500/20 text-yellow-300 border border-yellow-500/30') }}">
                                    {{ $app->status }}
                                </span>
                            </div>

                            <a href="{{ route('explore.show', $app->project) }}"
                               class="px-5 py-2 bg-blue-700/40 hover:bg-blue-600 text-white rounded-lg transition shadow-md flex items-center group-hover:translate-x-1 duration-300">
                                Detail 
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-20 bg-white/5 backdrop-blur-sm rounded-xl border border-white/5">
                    <p class="text-blue-300/60 italic text-lg">Belum ada project yang dilamar.</p>
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

    /* Global Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }
    ::-webkit-scrollbar-track {
        background: rgba(15, 23, 42, 0.1);
    }
    ::-webkit-scrollbar-thumb {
        background: rgba(59, 130, 246, 0.2);
        border-radius: 10px;
        border: 2px solid transparent;
        background-clip: content-box;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: rgba(59, 130, 246, 0.5);
    }
</style>
@endsection
