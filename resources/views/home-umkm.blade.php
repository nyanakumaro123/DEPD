@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans">

    {{-- Navigasi Bar --}}
    <nav class="bg-[#355dad] px-6 py-3 shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            
            <div class="flex items-center gap-2">
                {{-- Logo PathLoka --}}
                <img src="{{ asset('img/logo-pathloka.png') }}" alt="PathLoka" class="h-10 w-auto object-contain">
                <span class="text-2xl font-bold font-serif text-yellow-400 tracking-wide" style="-webkit-text-stroke: 0.5px #b89200;">PathLoka</span>
            </div>

            {{-- Menu Navigasi --}}
            <div class="hidden md:flex space-x-8 text-white font-bold text-lg">
                <a href="{{ route('home.umkm') }}" class="hover:text-yellow-400 transition underline decoration-2 underline-offset-4">Home</a>
                <a href="{{ route('profile.umkm') }}" class="hover:text-yellow-400 transition">Profile</a>
                <a href="{{ route('project.umkm') }}" class="hover:text-yellow-400 transition">Project</a>
                <a href="#" class="hover:text-yellow-400 transition">Workspace</a>
                <a href="#" class="hover:text-yellow-400 transition">Request</a>
            </div>

            {{-- Avatar Profil --}}
            <a href="{{ route('profile.umkm') }}" class="h-10 w-10 rounded-full overflow-hidden border-2 border-white cursor-pointer hover:shadow-lg transition hover:border-yellow-400">
                <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&auto=format&fit=crop&w=150&q=80" alt="UMKM Profile" class="h-full w-full object-cover">
            </a>
        </div>
    </nav>

    {{-- Konten Utama (Grid) --}}
    <div class="max-w-7xl mx-auto p-6 grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        {{-- Kolom Kiri: Lamaran --}}
        <div class="lg:col-span-4 space-y-4">
            <h2 class="text-2xl font-bold text-[#355dad] font-serif">Lamaran</h2>
            
            {{-- Kartu Lamaran 1 (Accepted) --}}
            <div class="bg-[#d1fae5] border border-green-300 rounded-xl p-3 flex justify-between items-center shadow-sm hover:shadow-md transition cursor-pointer">
                <div class="flex items-center gap-3">
                    <img src="https://i.pravatar.cc/150?img=5" alt="Employee" class="h-10 w-10 rounded-full object-cover border border-green-200">
                    <span class="font-bold text-green-800">NamaEmployee</span>
                </div>
                <span class="text-green-700 font-bold text-sm">accepted</span>
            </div>

            {{-- Kartu Lamaran 2 (Pending) --}}
            <div class="bg-[#e0e7ff] border border-blue-200 rounded-xl p-3 flex justify-between items-center shadow-sm hover:shadow-md transition cursor-pointer">
                <div class="flex items-center gap-3">
                    <img src="https://i.pravatar.cc/150?img=9" alt="Diana" class="h-10 w-10 rounded-full object-cover border border-blue-200">
                    <span class="font-bold text-[#355dad]">Diana</span>
                </div>
                <span class="text-[#355dad] font-bold text-sm">pending</span>
            </div>

            <a href="#" class="block text-[#bcaaa4] hover:text-[#8d6e63] text-sm mt-2">See more...</a>
        </div>


        {{-- Kolom Kanan: Project List --}}
        <div class="lg:col-span-8 space-y-6">
            
            <div class="flex items-center gap-3">
                <h2 class="text-2xl font-bold text-[#355dad] font-serif">Project List</h2>
                {{-- Tombol Edit/Pencil --}}
                <button class="bg-[#355dad] text-white p-1.5 rounded-md hover:bg-[#2a4a8b] transition shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                    </svg>
                </button>
            </div>

            {{-- Kartu Proyek 1 --}}
            <div class="bg-[#f2e6d8] rounded-xl p-4 shadow-md flex flex-col md:flex-row gap-5 border border-[#e6d0b8] hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&q=80" 
                     alt="Project Ramen" 
                     class="w-full md:w-48 h-32 object-cover rounded-lg">
                <div class="flex-1 space-y-1">
                    <h3 class="text-xl font-bold text-[#5c3d2e]">Project title</h3>
                    <p class="text-[#8c5e45] font-bold text-sm">UMKM Name -- Duration: 08.00 - 20.00</p>
                    <p class="text-[#a1887f] text-sm leading-relaxed mt-2 font-medium">
                        descriptiondescriptiondescriptiondescriptiondes...
                    </p>
                </div>
            </div>

            {{-- Kartu Proyek 2 --}}
            <div class="bg-[#f2e6d8] rounded-xl p-4 shadow-md flex flex-col md:flex-row gap-5 border border-[#e6d0b8] hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&q=80" 
                     alt="Project Ramen" 
                     class="w-full md:w-48 h-32 object-cover rounded-lg">
                <div class="flex-1 space-y-1">
                    <h3 class="text-xl font-bold text-[#5c3d2e]">Project title</h3>
                    <p class="text-[#8c5e45] font-bold text-sm">UMKM Name -- Duration: 08.00 - 20.00</p>
                    <p class="text-[#a1887f] text-sm leading-relaxed mt-2 font-medium">
                        descriptiondescriptiondescriptiondescriptiondes...
                    </p>
                </div>
            </div>

            {{-- Kartu Proyek 3 --}}
             <div class="bg-[#f2e6d8] rounded-xl p-4 shadow-md flex flex-col md:flex-row gap-5 border border-[#e6d0b8] hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&q=80" 
                     alt="Project Ramen" 
                     class="w-full md:w-48 h-32 object-cover rounded-lg">
                <div class="flex-1 space-y-1">
                    <h3 class="text-xl font-bold text-[#5c3d2e]">Project title</h3>
                    <p class="text-[#8c5e45] font-bold text-sm">UMKM Name -- Duration: 08.00 - 20.00</p>
                    <p class="text-[#a1887f] text-sm leading-relaxed mt-2 font-medium">
                        descriptiondescriptiondescriptiondescriptiondes...
                    </p>
                </div>
            </div>

            <div class="text-center pt-4">
                <a href="#" class="text-[#bcaaa4] hover:text-[#8d6e63]">See more...</a>
            </div>

        </div>
    </div>
</div>
@endsection