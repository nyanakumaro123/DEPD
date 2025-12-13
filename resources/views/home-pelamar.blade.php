@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans">

    <nav class="bg-[#355dad] px-6 py-3 shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            
            <div class="flex items-center gap-2">
                <img src="{{ asset('img/logo-pathloka.png') }}" alt="PathLoka" class="h-10 w-auto object-contain">
                <span class="text-2xl font-bold font-serif text-yellow-400 tracking-wide" style="-webkit-text-stroke: 0.5px #b89200;">PathLoka</span>
            </div>

            <div class="hidden md:flex space-x-8 text-white font-bold text-lg">
                <a href="{{ route('home.pelamar') }}" class="hover:text-yellow-400 transition underline decoration-2 underline-offset-4">Home</a>
                
                <a href="{{ route('profile.pelamar', 1) }}" class="hover:text-yellow-400 transition">Profile</a>
                
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

                <a href="{{ route('profile.pelamar', 1) }}" class="h-10 w-10 rounded-full overflow-hidden border-2 border-white cursor-pointer hover:border-yellow-400 transition">
                    <img src="https://i.pravatar.cc/150?img=5" alt="User Profile" class="h-full w-full object-cover">
                </a>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto p-6 grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <div class="lg:col-span-4 space-y-4">
            <h2 class="text-2xl font-bold text-[#355dad]">Apply Status</h2>
            
            <div class="bg-[#d1fae5] border border-green-300 rounded-xl p-3 flex justify-between items-center shadow-sm">
                <div class="flex items-center gap-3">
                    <img src="https://images.unsplash.com/photo-1555126634-323283e090fa?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Resto" class="h-10 w-10 rounded-full object-cover border border-gray-300">
                    <span class="font-bold text-green-900">Restomie</span>
                </div>
                <span class="text-green-700 font-bold bg-white px-3 py-1 rounded-full text-sm">accepted</span>
            </div>

            <div class="bg-[#e0e7ff] border border-blue-200 rounded-xl p-3 flex justify-between items-center shadow-sm">
                <div class="flex items-center gap-3">
                    <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Cafe" class="h-10 w-10 rounded-full object-cover border border-gray-300">
                    <span class="font-bold text-[#355dad]">CatCafe</span>
                </div>
                <span class="text-[#355dad] font-bold bg-white px-3 py-1 rounded-full text-sm">pending</span>
            </div>

            <a href="#" class="block text-gray-500 hover:text-[#355dad] text-sm mt-2">See more...</a>
        </div>


        <div class="lg:col-span-8 space-y-6">
            
            <div class="flex items-center gap-3">
                <h2 class="text-2xl font-bold text-[#355dad]">Ongoing Projects</h2>
                <button class="text-[#4a6fa5] hover:text-[#355dad]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <div class="bg-[#f2e6d8] rounded-xl p-4 shadow-md flex flex-col md:flex-row gap-5 border border-[#e6d0b8] hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&q=80" 
                     alt="Project Image" 
                     class="w-full md:w-48 h-32 object-cover rounded-lg">
                <div class="flex-1 space-y-1">
                    <h3 class="text-xl font-bold text-[#5c3d2e]">Food Photography & Menu Design</h3>
                    <p class="text-[#8c5e45] font-bold text-sm">Restomie UMKM -- Duration: 08.00 - 20.00</p>
                    <p class="text-gray-600 text-sm leading-relaxed mt-2">
                        Looking for a creative student to help us redesign our menu and take professional photos of our new ramen dishes. Equipment will be provided...
                    </p>
                </div>
            </div>

            <div class="bg-[#f2e6d8] rounded-xl p-4 shadow-md flex flex-col md:flex-row gap-5 border border-[#e6d0b8] hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&q=80" 
                     alt="Project Image" 
                     class="w-full md:w-48 h-32 object-cover rounded-lg">
                <div class="flex-1 space-y-1">
                    <h3 class="text-xl font-bold text-[#5c3d2e]">Social Media Manager</h3>
                    <p class="text-[#8c5e45] font-bold text-sm">CatCafe UMKM -- Duration: 08.00 - 20.00</p>
                    <p class="text-gray-600 text-sm leading-relaxed mt-2">
                        We need someone to manage our Instagram and TikTok accounts. Create engaging content featuring our cats and daily specials...
                    </p>
                </div>
            </div>

            <div class="bg-[#f2e6d8] rounded-xl p-4 shadow-md flex flex-col md:flex-row gap-5 border border-[#e6d0b8] hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&q=80" 
                     alt="Project Image" 
                     class="w-full md:w-48 h-32 object-cover rounded-lg">
                <div class="flex-1 space-y-1">
                    <h3 class="text-xl font-bold text-[#5c3d2e]">Graphic Designer needed</h3>
                    <p class="text-[#8c5e45] font-bold text-sm">SaladBar UMKM -- Duration: 08.00 - 20.00</p>
                    <p class="text-gray-600 text-sm leading-relaxed mt-2">
                        Help us create brochures and flyers for our grand opening next month. Requires proficiency in Adobe Illustrator...
                    </p>
                </div>
            </div>

            <div class="text-center pt-4">
                <a href="#" class="text-gray-500 hover:text-[#355dad]">See more...</a>
            </div>

        </div>
    </div>
</div>
@endsection