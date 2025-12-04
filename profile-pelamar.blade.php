@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans pb-20 relative">

    <nav class="bg-[#355dad] px-6 py-3 shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            
            <div class="flex items-center gap-2">
                <img src="{{ asset('img/logo-pathloka.png') }}" alt="PathLoka" class="h-10 w-auto object-contain">
                <span class="text-2xl font-bold font-serif text-yellow-400 tracking-wide" style="-webkit-text-stroke: 0.5px #b89200;">PathLoka</span>
            </div>

            <div class="hidden md:flex space-x-8 text-white font-bold text-lg">
                <a href="/home-pelamar" class="hover:text-yellow-400 transition">Home</a>
                <a href="/profile-pelamar" class="text-white border-b-2 border-white hover:text-yellow-400 transition">Profile</a>
                <a href="#" class="hover:text-yellow-400 transition">Explore</a>
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

    <div class="max-w-7xl mx-auto p-6 pt-10">
        
        <h1 class="text-4xl font-bold text-[#355dad] mb-8 font-serif">Profile</h1>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <div class="lg:col-span-4 flex flex-col items-center lg:items-start">
                <div class="h-64 w-64 lg:h-80 lg:w-80 rounded-full border-4 border-[#355dad] overflow-hidden shadow-lg bg-white">
                    <img src="https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" 
                         alt="Profile Picture" 
                         class="h-full w-full object-cover">
                </div>
            </div>

            <div class="lg:col-span-8 space-y-8">
                
                <div>
                    <h2 class="text-5xl font-bold text-[#355dad] mb-6 font-serif">KucingMauMakan</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="space-y-1">
                            <label class="text-[#355dad] font-bold text-lg">Major</label>
                            <div class="bg-[#e0e7ff] text-[#355dad] font-semibold py-3 px-4 rounded-lg shadow-sm border border-blue-100">
                                VCD / DKV
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[#355dad] font-bold text-lg">Contact</label>
                            <div class="bg-[#e0e7ff] text-[#355dad] font-semibold py-3 px-4 rounded-lg shadow-sm border border-blue-100">
                                08126523895
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[#355dad] font-bold text-lg">Email</label>
                            <div class="bg-[#e0e7ff] text-[#355dad] font-semibold py-3 px-4 rounded-lg shadow-sm border border-blue-100 truncate">
                                Kucing@gmail.com
                            </div>
                        </div>
                    </div>

                    <button class="bg-[#355dad] hover:bg-[#2a4a8b] text-white font-bold py-3 px-8 rounded-lg shadow-md transition transform hover:scale-105">
                        My Portofolio
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10">
                    
                    <div>
                        <h3 class="text-2xl font-bold text-[#355dad] mb-4">Project History</h3>
                        <div class="space-y-4">
                            <div class="bg-[#e8d5c4] rounded-xl p-3 flex gap-3 shadow-sm border border-[#dcbfa6]">
                                <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" class="h-16 w-16 rounded-lg object-cover bg-gray-200">
                                <div class="overflow-hidden">
                                    <h4 class="font-bold text-[#5c3d2e] text-lg leading-tight">Project Title</h4>
                                    <p class="text-xs font-bold text-[#8c5e45] mb-1">UMKMName</p>
                                    <p class="text-xs text-gray-600 truncate">descriptiondescriptiondescri...</p>
                                </div>
                            </div>
                             <div class="bg-[#e8d5c4] rounded-xl p-3 flex gap-3 shadow-sm border border-[#dcbfa6]">
                                <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" class="h-16 w-16 rounded-lg object-cover bg-gray-200">
                                <div class="overflow-hidden">
                                    <h4 class="font-bold text-[#5c3d2e] text-lg leading-tight">Project Title</h4>
                                    <p class="text-xs font-bold text-[#8c5e45] mb-1">UMKMName</p>
                                    <p class="text-xs text-gray-600 truncate">descriptiondescriptiondescri...</p>
                                </div>
                            </div>
                             <div class="bg-[#e8d5c4] rounded-xl p-3 flex gap-3 shadow-sm border border-[#dcbfa6]">
                                <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" class="h-16 w-16 rounded-lg object-cover bg-gray-200">
                                <div class="overflow-hidden">
                                    <h4 class="font-bold text-[#5c3d2e] text-lg leading-tight">Project Title</h4>
                                    <p class="text-xs font-bold text-[#8c5e45] mb-1">UMKMName</p>
                                    <p class="text-xs text-gray-600 truncate">descriptiondescriptiondescri...</p>
                                </div>
                            </div>
                            <div class="text-center pt-2">
                                <a href="#" class="text-[#bcaaa4] font-bold hover:text-[#8d6e63]">See more...</a>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-2xl font-bold text-[#355dad] mb-4">Sertificate</h3>
                        <div class="space-y-4">
                            <div class="bg-[#e8d5c4] rounded-xl p-3 flex gap-3 shadow-sm border border-[#dcbfa6]">
                                <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" class="h-16 w-16 rounded-lg object-cover bg-gray-200">
                                <div class="overflow-hidden">
                                    <h4 class="font-bold text-[#5c3d2e] text-lg leading-tight">Eating contest juara 1</h4>
                                    <p class="text-xs text-gray-600 mt-1 line-clamp-2">Eating contest juara 1. ak ga expect kalau saya beneran menang pada ini...</p>
                                </div>
                            </div>
                            <div class="bg-[#e8d5c4] rounded-xl p-3 flex gap-3 shadow-sm border border-[#dcbfa6]">
                                <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" class="h-16 w-16 rounded-lg object-cover bg-gray-200">
                                <div class="overflow-hidden">
                                    <h4 class="font-bold text-[#5c3d2e] text-lg leading-tight">Eating contest juara 1</h4>
                                    <p class="text-xs text-gray-600 mt-1 line-clamp-2">Eating contest juara 1. ak ga expect kalau saya beneran menang pada ini...</p>
                                </div>
                            </div>
                            <div class="bg-[#e8d5c4] rounded-xl p-3 flex gap-3 shadow-sm border border-[#dcbfa6]">
                                <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" class="h-16 w-16 rounded-lg object-cover bg-gray-200">
                                <div class="overflow-hidden">
                                    <h4 class="font-bold text-[#5c3d2e] text-lg leading-tight">Eating contest juara 1</h4>
                                    <p class="text-xs text-gray-600 mt-1 line-clamp-2">Eating contest juara 1. ak ga expect kalau saya beneran menang pada ini...</p>
                                </div>
                            </div>
                            <div class="text-center pt-2">
                                <a href="#" class="text-[#bcaaa4] font-bold hover:text-[#8d6e63]">See more...</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="fixed bottom-10 left-10">
        <a href="{{ route('edit-profile.pelamar') }}" class="bg-[#355dad] hover:bg-[#2a4a8b] text-white p-5 rounded-full shadow-2xl transition transform hover:scale-110 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
            </svg>
        </a>
    </div>

</div>
@endsection