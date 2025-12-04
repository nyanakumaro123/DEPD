@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full flex items-center justify-center p-6 bg-gradient-to-br from-[#2b4c8c] via-[#4a6fa5] to-[#ffe8d6]">

    <div class="max-w-7xl w-full grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        
        <div class="text-center lg:text-left space-y-8 select-none pl-0 lg:pl-10">
            
            <h1 class="text-7xl lg:text-8xl font-bold font-serif tracking-wide mb-2">
                <span class="text-white drop-shadow-lg" style="-webkit-text-stroke: 2px #888;">P</span><span class="text-gray-400">ath</span><span class="text-yellow-400 drop-shadow-md" style="-webkit-text-stroke: 1px #b89200;">Loka</span>
            </h1>
            
            <h2 class="text-4xl lg:text-5xl font-bold text-white leading-tight font-sans drop-shadow-md">
                A place to find <br>
                your career path
            </h2>

            <div class="flex flex-col sm:flex-row gap-6 justify-center lg:justify-start mt-10">
                <a href="{{ route('login.pelamar') }}" class="px-8 py-4 bg-[#8da4d0] hover:bg-[#a0b6e0] text-white font-bold text-xl rounded-2xl shadow-lg transform transition hover:scale-105 text-center w-full sm:w-auto border border-white/30 backdrop-blur-sm">
                    Job Seeker
                </a>

                <a href="{{ route('login.umkm') }}" class="px-8 py-4 bg-[#8da4d0] hover:bg-[#a0b6e0] text-white font-bold text-xl rounded-2xl shadow-lg transform transition hover:scale-105 text-center w-full sm:w-auto border border-white/30 backdrop-blur-sm">
                    UMKM Owner
                </a>
            </div>
        </div>

        <div class="flex justify-center lg:justify-end pr-0 lg:pr-10">
            <img src="{{ asset('img/logo-pathloka.png') }}" 
                 alt="PathLoka Logo Image" 
                 class="w-full max-w-md lg:max-w-lg object-contain drop-shadow-2xl animate-pulse-slow">
        </div>

    </div>
</div>

<style>
    @keyframes pulse-slow {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.02); }
    }
    .animate-pulse-slow {
        animation: pulse-slow 4s infinite;
    }
</style>
@endsection