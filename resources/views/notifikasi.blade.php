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

    <div class="relative z-10 max-w-4xl mx-auto p-6 pt-10">

        <h2 class="text-5xl font-bold text-white mb-10 font-serif">
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-white">Notifications</span>
        </h2>

        <div class="space-y-4">
            @forelse ($notifications as $notif)
                @php
                    $statusClasses = match($notif->type) {
                        'accepted' => 'bg-green-500/20 text-green-300 border-green-500/30',
                        'rejected' => 'bg-red-500/20 text-red-300 border-red-500/30',
                        'invitation' => 'bg-blue-500/20 text-blue-300 border-blue-500/30',
                        'application submitted' => 'bg-yellow-500/20 text-yellow-300 border-yellow-500/30',
                        default => 'bg-white/10 text-blue-100 border-white/10',
                    };
                @endphp

                <div class="bg-white/10 backdrop-blur-lg border border-white/10 rounded-2xl p-6 shadow-xl transition hover:bg-white/15 flex flex-col md:flex-row items-start md:items-center gap-5 group">
                    
                    <div class="shrink-0">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center border border-white/20 shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </div>
                    </div>

                    <div class="flex-1 space-y-1">
                        <h3 class="font-bold text-xl text-white group-hover:text-blue-300 transition">
                            {{ $notif->title }}
                        </h3>
                        <p class="text-blue-100/80 text-sm leading-relaxed">
                            {{ $notif->message }}
                        </p>
                        <p class="text-xs text-blue-300/50 mt-2">
                            {{ $notif->created_at->diffForHumans() }}
                        </p>
                    </div>

                    <div class="shrink-0 w-full md:w-auto flex justify-end">
                        @if($notif->type === 'invitation')
                            <a href="{{-- route('invitation.detail', $notif->invitation_id) --}}"
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-xl transition shadow-lg shadow-blue-900/30">
                                Detail
                            </a>
                        @elseif($notif->type === 'application')
                            <a href="{{ route('umkm.applications') }}"
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-xl transition shadow-lg shadow-blue-900/30">
                                Detail
                            </a>
                        @else
                            <span class="{{ $statusClasses }} border px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider">
                                {{ $notif->type }}
                            </span>
                        @endif
                    </div>
                </div>
            @empty
                <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-10 text-center">
                    <p class="text-blue-200 text-lg italic">No notifications available</p>
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $notifications->links() }}
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
