@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full flex items-center justify-center bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 overflow-hidden relative">
    <!-- Decorative background elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-0 -right-4 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>

    <div class="relative z-10 max-w-7xl w-full grid grid-cols-1 lg:grid-cols-2 gap-12 items-center p-6 lg:p-12">
        
        <div class="text-center lg:text-left space-y-8 select-none">
            
            <div class="space-y-4">
                <h1 class="text-6xl lg:text-8xl font-black tracking-tighter text-white drop-shadow-sm font-sans">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-white">Path</span><span class="text-yellow-400">Loka</span>
                </h1>
                
                <h2 class="text-2xl lg:text-4xl font-medium text-blue-100 leading-tight font-sans max-w-lg mx-auto lg:mx-0">
                    A place to find <br class="hidden lg:block">
                    your career path
                </h2>
            </div>

            <div class="flex flex-col sm:flex-row gap-6 justify-center lg:justify-start pt-4 font-sans">
                <a href="{{ route('login.pelamar') }}" class="group px-10 py-4 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-bold tracking-wide rounded-full shadow-lg shadow-blue-900/20 transition-all duration-300 hover:shadow-blue-500/40 hover:-translate-y-1 w-full sm:w-auto text-center">
                    Job Seeker
                </a>

                <a href="{{ route('login.umkm') }}" class="group px-10 py-4 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-bold tracking-wide rounded-full shadow-lg shadow-blue-900/20 transition-all duration-300 hover:shadow-blue-500/40 hover:-translate-y-1 w-full sm:w-auto text-center">
                    UMKM Owner
                </a>
            </div>
        </div>

        <div class="flex justify-center lg:justify-end relative">
            <div class="absolute inset-0 bg-gradient-to-tr from-blue-500/20 to-purple-500/20 rounded-full filter blur-3xl animate-pulse-slow"></div>
            <img src="{{ asset('img/logo-pathloka.png') }}" 
                 alt="PathLoka Logo Image" 
                 class="relative w-full max-w-md lg:max-w-lg object-contain drop-shadow-2xl transform transition hover:scale-105 duration-500">
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
    @keyframes pulse-slow {
        0%, 100% { opacity: 0.5; transform: scale(1); }
        50% { opacity: 0.8; transform: scale(1.05); }
    }
    .animate-pulse-slow {
        animation: pulse-slow 6s ease-in-out infinite;
    }
</style>
@endsection