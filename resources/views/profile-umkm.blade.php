@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans pb-20 relative">

    <x-navbar-umkm />

    <div class="max-w-7xl mx-auto p-6 pt-10">
        
        <h1 class="text-4xl font-bold text-[#355dad] mb-8 font-serif">Profile</h1>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <div class="lg:col-span-4 flex flex-col items-center lg:items-start">
                <div class="h-64 w-64 lg:h-80 lg:w-80 rounded-full border-4 border-[#355dad] overflow-hidden shadow-lg bg-white">
                    <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" 
                         alt="Profile Picture" 
                         class="h-full w-full object-cover">
                </div>
            </div>

            <div class="lg:col-span-8 space-y-8">
                
                <h2 class="text-5xl font-bold text-[#355dad] mb-2 font-serif">Restomie</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    
                    <div class="space-y-4">
                        <h3 class="text-xl font-bold text-[#355dad]">Riwayat Proyek</h3>
                        
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
                    </div>

                    <div class="space-y-4">
                        <h3 class="text-xl font-bold text-[#355dad]">
                            Rating <span class="text-[#dcbfa6] text-lg">★3.5/5</span>
                        </h3>
                        
                        <div class="bg-[#d1fae5] border border-green-300 rounded-full px-4 py-2 flex justify-between items-center shadow-sm">
                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/150?img=5" class="h-8 w-8 rounded-full border border-green-400">
                                <span class="text-green-800 font-bold text-sm">NamaSiswa</span>
                            </div>
                            <span class="text-green-800 font-bold text-sm">★ 4.5/5</span>
                        </div>

                        <div class="bg-[#fee2e2] border border-red-300 rounded-full px-4 py-2 flex justify-between items-center shadow-sm">
                            <div class="flex items-center gap-3">
                                <img src="https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" class="h-8 w-8 rounded-full border border-red-400">
                                <span class="text-red-800 font-bold text-sm">KucingMauMakan</span>
                            </div>
                            <span class="text-red-800 font-bold text-sm">★ 1/5</span>
                        </div>

                        <div class="bg-[#d1fae5] border border-green-300 rounded-full px-4 py-2 flex justify-between items-center shadow-sm">
                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/150?img=12" class="h-8 w-8 rounded-full border border-green-400">
                                <span class="text-green-800 font-bold text-sm">NamaMahasiswa</span>
                            </div>
                            <span class="text-green-800 font-bold text-sm">★ 4.5/5</span>
                        </div>

                         <div class="bg-[#d1fae5] border border-green-300 rounded-full px-4 py-2 flex justify-between items-center shadow-sm">
                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/150?img=8" class="h-8 w-8 rounded-full border border-green-400">
                                <span class="text-green-800 font-bold text-sm">NamaMahasiswa</span>
                            </div>
                            <span class="text-green-800 font-bold text-sm">★ 4.5/5</span>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <h3 class="text-xl font-bold text-[#355dad] mb-2">Deskripsi UMKM</h3>
                    <p class="text-[#bcaaa4] font-medium leading-relaxed">
                        Tulis disini deskripsideskripsideskripsideskripsideskripsid eskripsideskripsideskrdeskripsideskripsideskr ipsideskripsidekripsideskripsideskripsideskrdeskripsideskripsideskripsid eskripsideskripsideskripsideskripsideskrdeskripsideskripsideskripsideskr ipsideskripsideskripsideskripsideskrdeskripsideskripsideskripsi
                    </p>
                </div>

            </div>
        </div>
    </div>

    <div class="fixed bottom-10 left-10">
        <a href="{{ route('edit-profile.umkm') }}" class="bg-[#355dad] hover:bg-[#2a4a8b] text-white p-5 rounded-full shadow-2xl transition transform hover:scale-110 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
            </svg>
        </a>
    </div>

</div>
@endsection