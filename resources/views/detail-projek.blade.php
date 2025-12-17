@extends('layouts.app')

@section('content')
<div class="bg-[#FFF7ED] min-h-screen pb-10">

    <nav class="bg-[#355dad] px-6 py-3 shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            
            <div class="flex items-center gap-2">
                <img src="{{ asset('img/logo-pathloka.png') }}" alt="PathLoka" class="h-10 w-auto object-contain">
                <span class="text-2xl font-bold font-serif text-yellow-400 tracking-wide" style="-webkit-text-stroke: 0.5px #b89200;">PathLoka</span>
            </div>

            <div class="hidden md:flex space-x-8 text-white font-bold text-lg">
                <a href="/home-pelamar" class="hover:text-yellow-400 transition">Home</a>
                <a href="/profile-pelamar" class=" hover:text-yellow-400 transition">Profile</a>
                <a href="/explore" class="text-white border-b-2 border-whitehover:text-yellow-400 transition">Explore</a>
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

    <!-- Header Image -->
    <div class="w-full h-64 md:h-80 overflow-hidden">
        <img 
            src="https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=1200&q=80"
            class="w-full h-full object-cover"
        >
    </div>

    <!-- Main Detail Box -->
    <div class="max-w-6xl mx-auto bg-white rounded-t-3xl shadow-sm -mt-10 p-6 md:p-10">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Left Section (Details) -->
            <div class="md:col-span-2">
                <h1 class="text-4xl font-extrabold text-[#8B4513]">JudulProyek</h1>
                <p class="text-green-600 font-semibold text-lg">NamaUMKM</p>

                <div class="mt-4 space-y-1 text-gray-700">
                    <p><span class="font-semibold">Durasi:</span> 08.00 - 20.00</p>
                    <p><span class="font-semibold">Reward:</span> certificate</p>
                </div>

                <div class="mt-6">
                    <h3 class="font-semibold text-xl text-[#8B4513]">Deskripsi:</h3>
                    <p class="text-gray-600 leading-relaxed mt-2">
                        deskripsideskripsideskripsideskripsideskripsideskripsideskripsi
                        deskripsideskripsideskripsideskripsideskripsideskripsi deskripsi
                        deskripsideskripsideskripsideskripsideskripsideskripsideskripsi
                        deskripsideskripsideskripsideskripsideskripsideskripsi
                        deskripsideskripsideskripsideskripsideskripsi
                    </p>
                </div>
            </div>

            <!-- Right Section -->
            <div class="space-y-4 flex flex-col items-start md:items-end">

                <p class="text-gray-700">
                    <span class="font-semibold">Jumlah Pelamar:</span> 44
                </p>

                <!-- Buttons -->
                <button class="w-full md:w-48 bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg text-center">
                    Syarat Lamar
                </button>

                <button class="w-full md:w-48 bg-yellow-100 hover:bg-yellow-200 text-yellow-800 border border-yellow-300 py-2 rounded-lg text-center">
                    Apply Project
                </button>

            </div>

        </div>
    </div>

</div>
@endsection
