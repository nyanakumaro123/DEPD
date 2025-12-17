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
                <a href="/profile-pelamar" class=" hover:text-yellow-400 transition">Profile</a>
                <a href="{{ route('apply.projek') }}" class="text-white border-b-2 border-whitehover:text-yellow-400 transition">Explore</a>
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
    <h1 class="text-3xl font-bold text-blue-700 mb-6">
        Apply Judul Proyek
    </h1>

    <!-- Form Container -->
    <div class="max-w-4xl">

        <!-- Pitch Label -->
        <label for="pitch" class="font-semibold text-gray-800 mb-2 block">
            Pitch:
        </label>

        <!-- Pitch Textarea -->
        <textarea
            id="pitch"
            rows="4"
            placeholder="Tuliskan deskripsi"
            class="w-full bg-blue-50 border border-blue-200 rounded-lg p-4 outline-none focus:ring-2 focus:ring-blue-300"
        ></textarea>

        <!-- Portfolio Upload Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mt-4">

            <!-- Warning Text -->
            <p class="text-sm text-gray-500 mb-2 md:mb-0">
                Anda belum upload portofolio anda
            </p>

            <!-- Upload Button -->
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                Upload portfolio (PDF)
            </button>
        </div>

        <!-- Submit Button (Disabled) -->
        <button
            class="w-full mt-10 bg-gray-300 text-gray-600 py-3 rounded-lg border border-gray-400 cursor-not-allowed"
            disabled
        >
            Apply
        </button>

    </div>

</div>
@endsection
