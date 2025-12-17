@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#FFF7ED] ">

    <nav class="bg-[#355dad] px-6 py-3 shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            
            <div class="flex items-center gap-2">
                <img src="{{ asset('img/logo-pathloka.png') }}" alt="PathLoka" class="h-10 w-auto object-contain">
                <span class="text-2xl font-bold font-serif text-yellow-400 tracking-wide" style="-webkit-text-stroke: 0.5px #b89200;">PathLoka</span>
            </div>

            <div class="hidden md:flex space-x-8 text-white font-bold text-lg">
                <a href="/home-pelamar" class="hover:text-yellow-400 transition">Home</a>
                <a href="/profile-pelamar" class="hover:text-yellow-400 transition">Profile</a>
                <a href="{{ route('explore') }}" class="hover:text-yellow-400 transition">Explore</a>
                <a href="#" class="hover:text-yellow-400 transition">Workspace</a>
                <a href="#" class="hover:text-yellow-400 transition">Request</a>
            </div>

            <div class="flex items-center gap-4">
                <button class="relative p-2 text-white hover:text-yellow-400 transition">
                    <div class="bg-[#5a7bc2] rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                    </div>
                </button>
                <div class="h-10 w-10 rounded-full overflow-hidden border-2 border-white cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?ixlib=rb-1.2.1&auto=format&fit=crop&w=150&q=80" alt="User" class="h-full w-full object-cover">
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Title -->
    <h1 class="text-4xl font-bold text-blue-700 mb-6">Notifikasi</h1>

    <div class="space-y-4 max-w-4xl">

        {{-- @foreach([1,2,3,4,5,6] as $item) --}}
        <div class="bg-blue-100 rounded-lg p-3 flex items-start gap-3 shadow-sm">

            <!-- Notification Image -->
            <img 
                src="https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=400&q=80"
                class="w-12 h-12 rounded-md object-cover"
            />

            <!-- Message Content -->
            <div class="flex-1 text-blue-900 text-sm">

                <!-- Example of Short Message -->
                {{-- @if($loop->index !== 2) --}}
                    <p class="font-semibold">Selamat! Magang anda diterima di Restomie!</p>
                {{-- @else --}}
                <!-- Example of Long Expandable Message -->
                    <details class="group">
                        <summary class="font-semibold cursor-pointer select-none">
                            Magang anda ditolak Restomie.
                        </summary>

                        <p class="mt-1 text-gray-700">
                            "ABCIWAKDARIWAKoswoskJDWIJDJOQDNQNALLOEMBVFISHHCK{RYOP MAIACOJD JIJK
                            SKKDNJWBJDJDJADJNASDANDDKKWPPWWWWWWWWWWWWWWWWWWWWWPPPPPPP..."
                        </p>
                    </details>
                {{-- @endif --}}

            </div>

            <!-- Optional Dropdown Icon -->
            <button class="text-blue-700 text-xl px-1">
                ˅
            </button>

        </div>
        {{-- @endforeach --}}

    </div>

</div>
@endsection
