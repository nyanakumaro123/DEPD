@extends('layouts.app')

@section('content')
<div class="w-full min-h-screen bg-[#FFF7ED] ">

    <nav class="bg-[#355dad] px-6 py-3 shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            
            <div class="flex items-center gap-2">
                <img src="{{ asset('img/logo-pathloka.png') }}" alt="PathLoka" class="h-10 w-auto object-contain">
                <span class="text-2xl font-bold font-serif text-yellow-400 tracking-wide" style="-webkit-text-stroke: 0.5px #b89200;">PathLoka</span>
            </div>

            <div class="hidden md:flex space-x-8 text-white font-bold text-lg">
                <a href="/home-pelamar" class="hover:text-yellow-400 transition">Home</a>
                <a href="/profile-pelamar" class=" hover:text-yellow-400 transition">Profile</a>
                <a href="{{ route('explore') }}" class="text-white border-b-2 border-whitehover:text-yellow-400 transition">Explore</a>
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

    <!-- Search Bar -->
    <div class="flex items-center gap-3 mb-6">
        <input 
            type="text" 
            placeholder="Telusuri disin.." 
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300"
        />

        <button class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full">
            🔍
        </button>
    </div>

    <!-- Category Tags -->
    <div class="flex flex-wrap gap-3 mb-8">
        <button class="px-4 py-2 rounded-full bg-blue-700 text-white">branding</button>
        <button class="px-4 py-2 rounded-full bg-blue-100 text-blue-700">design</button>
        <button class="px-4 py-2 rounded-full bg-blue-100 text-blue-700">Marketing</button>
        <button class="px-4 py-2 rounded-full bg-blue-100 text-blue-700">apalah</button>
        <button class="px-4 py-2 rounded-full bg-blue-100 text-blue-700">apalah</button>
        <button class="px-4 py-2 rounded-full bg-blue-100 text-blue-700">apalah</button>
        <button class="px-4 py-2 rounded-full bg-blue-100 text-blue-700">apalah</button>
        <button class="px-4 py-2 rounded-full bg-blue-100 text-blue-700">apalah</button>

        <button class="px-4 py-2 rounded-full bg-yellow-500 text-white">Sertifikat</button>
        <button class="px-4 py-2 rounded-full bg-yellow-100 text-yellow-800">Gaji</button>
        <button class="px-4 py-2 rounded-full bg-yellow-100 text-yellow-800">pengalaman</button>
    </div>

    <!-- Main Section -->
    <h2 class="text-xl font-semibold mb-4">Hasil pencarian</h2>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        <!-- Result List -->
        <div class="space-y-5">

            @foreach([1,2,3,4] as $item)
            <div class="flex bg-white shadow-sm rounded-lg p-3 gap-4">

                <!-- Image -->
                <img 
                    src="https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=300&q=80"
                    class="w-36 h-24 object-cover rounded-md"
                />

                <!-- Info -->
                <div class="flex-1">
                    <h3 class="text-lg font-bold text-gray-800">Judul Proyek</h3>
                    <p class="text-sm text-gray-600">NamaUMKM. Sertifikat</p>
                    <p class="text-xs text-gray-400 truncate">deskripsideskripsideskripsideskripsi...</p>
                </div>

                <!-- Detail Button -->
                <button class="bg-yellow-200 hover:bg-yellow-300 px-4 py-2 rounded-lg text-yellow-900 text-sm">
                    Detail
                </button>
            </div>
            @endforeach

        </div>

        <!-- Right Detail Panel -->
        <div class="bg-white shadow-md p-6 rounded-xl">
            <h2 class="text-4xl font-extrabold text-[#8B4513] mb-2">JudulProyek</h2>
            <p class="text-lg text-gray-600 mb-1">NamaUMKM</p>
            <p class="text-lg font-semibold text-yellow-600 mb-4">Durasi: 08.00 - 20.00</p>

            <h3 class="font-semibold text-gray-800 mb-1">Deskripsi:</h3>
            <p class="text-gray-600 leading-relaxed">
                deskripsideskripsideskripsideskripsideskripsideskripsideskripsi
                deskripsideskripsideskripsideskripsideskripsideskripsi deskripsi
                deskripsideskripsideskripsideskripsi deskripsideskripsi
            </p>
        </div>

    </div>
</div>
@endsection
