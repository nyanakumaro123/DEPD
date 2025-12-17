@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans pb-10">

    <nav class="bg-[#355dad] px-6 py-3 shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-2">
                <img src="{{ asset('img/logo-pathloka.png') }}" alt="PathLoka" class="h-10 w-auto object-contain">
                <span class="text-2xl font-bold font-serif text-yellow-400 tracking-wide" style="-webkit-text-stroke: 0.5px #b89200;">PathLoka</span>
            </div>
            <div class="hidden md:flex space-x-8 text-white font-bold text-lg">
                <a href="/home-pelamar" class="hover:text-yellow-400 transition">Home</a>
                <a href="/profile-pelamar" class="hover:text-yellow-400 transition border-b-2 border-white">Profile</a>
                <a href="/explore" class="hover:text-yellow-400 transition">Explore</a>
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

    <div class="max-w-6xl mx-auto p-6 pt-8">
        
        <h1 class="text-4xl font-bold text-[#355dad] mb-8 font-serif">Edit Profile</h1>

        <form action="{{ route('save.profile.pelamar') }}" method="POST" enctype="multipart/form-data"> @csrf
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                
                <div class="lg:col-span-4 flex flex-col items-center">
                    <div class="h-64 w-64 rounded-full border-4 border-[#355dad] overflow-hidden shadow-lg bg-white mb-6 relative group">
                        <img src="https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" 
                             alt="Profile Picture" 
                             class="h-full w-full object-cover group-hover:opacity-75 transition">
                        
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                            <i class="fas fa-camera text-3xl text-[#355dad]"></i>
                        </div>
                    </div>

                    <button type="button" class="bg-[#355dad] hover:bg-[#2a4a8b] text-white font-bold py-2 px-6 rounded-lg shadow-md transition w-full max-w-[200px]">
                        Edit Profile Photo
                    </button>
                </div>

                <div class="lg:col-span-8 space-y-6">
                    
                    <div class="space-y-2">
                        <label class="block text-[#355dad] font-bold text-xl">Name</label>
                        <input type="text" value="KucingMauMakan" 
                               class="w-full bg-[#e0e7ff] text-[#355dad] font-semibold text-lg py-3 px-4 rounded-lg border border-blue-200 focus:outline-none focus:ring-2 focus:ring-[#355dad] placeholder-blue-300">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="space-y-2">
                            <label class="block text-[#355dad] font-bold text-xl">Major</label>
                            <input type="text" value="VCD / DKV" 
                                   class="w-full bg-[#e0e7ff] text-[#355dad] font-semibold text-lg py-3 px-4 rounded-lg border border-blue-200 focus:outline-none focus:ring-2 focus:ring-[#355dad]">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-[#355dad] font-bold text-xl">Contact</label>
                            <input type="text" value="08126523895" 
                                   class="w-full bg-[#e0e7ff] text-[#355dad] font-semibold text-lg py-3 px-4 rounded-lg border border-blue-200 focus:outline-none focus:ring-2 focus:ring-[#355dad]">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-[#355dad] font-bold text-xl">Email</label>
                            <input type="email" value="Kucing@gmail.com" 
                                   class="w-full bg-[#e0e7ff] text-[#355dad] font-semibold text-lg py-3 px-4 rounded-lg border border-blue-200 focus:outline-none focus:ring-2 focus:ring-[#355dad]">
                        </div>
                    </div>

                    <div class="pt-4 flex items-center gap-4">
                        <label class="cursor-pointer bg-[#355dad] hover:bg-[#2a4a8b] text-white font-bold py-3 px-6 rounded-lg shadow-md transition transform active:scale-95">
                            Upload Portofolio (PDF)
                            <input type="file" class="hidden" accept=".pdf">
                        </label>
                        
                        <span class="text-[#c4a484] font-bold text-lg">Nkkkdendd.pdf</span>
                    </div>

                </div>
            </div>

            <div class="mt-16">
                <button type="submit" class="w-full bg-[#355dad] hover:bg-[#2a4a8b] text-white font-bold text-xl py-4 rounded-xl shadow-lg transition transform hover:scale-[1.01]">
                    Done
                </button>
            </div>

        </form>
    </div>
</div>
@endsection