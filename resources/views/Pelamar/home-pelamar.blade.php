@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 font-sans text-white relative overflow-x-hidden">

    <!-- Decorative background elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-0 -right-4 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>

    @include('layouts.navbar')

    <div class="relative z-10 max-w-7xl mx-auto p-6 grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <div class="lg:col-span-4 space-y-4">
            <h2 class="text-2xl font-bold text-blue-200">Apply Status</h2>
            
            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl p-3 flex justify-between items-center shadow-lg">
                <div class="flex items-center gap-3">
                    <img src="https://images.unsplash.com/photo-1555126634-323283e090fa?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Resto" class="h-10 w-10 rounded-full object-cover border-2 border-white/30">
                    <span class="font-bold text-green-300">Restomie</span>
                </div>
                <span class="text-green-200 font-bold bg-green-500/20 px-3 py-1 rounded-full text-sm">accepted</span>
            </div>

            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl p-3 flex justify-between items-center shadow-lg">
                <div class="flex items-center gap-3">
                    <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Cafe" class="h-10 w-10 rounded-full object-cover border-2 border-white/30">
                    <span class="font-bold text-blue-300">CatCafe</span>
                </div>
                <span class="text-blue-200 font-bold bg-blue-500/20 px-3 py-1 rounded-full text-sm">pending</span>
            </div>

            <a href="#" class="block text-gray-400 hover:text-yellow-400 text-sm mt-2 transition">See more...</a>
        </div>


        <div class="lg:col-span-8 space-y-6">
            
            <div class="flex items-center gap-3">
                <h2 class="text-2xl font-bold text-blue-200">Ongoing Projects</h2>
                <button class="text-blue-300 hover:text-white transition">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-xl p-4 shadow-lg flex flex-col md:flex-row gap-5 hover:bg-white/10 transition duration-300">
                <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&q=80" 
                     alt="Project Image" 
                     class="w-full md:w-48 h-32 object-cover rounded-lg">
                <div class="flex-1 space-y-1">
                    <h3 class="text-xl font-bold text-white">Food Photography & Menu Design</h3>
                    <p class="text-blue-300 font-bold text-sm">Restomie UMKM -- Duration: 08.00 - 20.00</p>
                    <p class="text-gray-300 text-sm leading-relaxed mt-2">
                        Looking for a creative student to help us redesign our menu and take professional photos of our new ramen dishes. Equipment will be provided...
                    </p>
                </div>
            </div>

            <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-xl p-4 shadow-lg flex flex-col md:flex-row gap-5 hover:bg-white/10 transition duration-300">
                <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&q=80" 
                     alt="Project Image" 
                     class="w-full md:w-48 h-32 object-cover rounded-lg">
                <div class="flex-1 space-y-1">
                    <h3 class="text-xl font-bold text-white">Social Media Manager</h3>
                    <p class="text-blue-300 font-bold text-sm">CatCafe UMKM -- Duration: 08.00 - 20.00</p>
                    <p class="text-gray-300 text-sm leading-relaxed mt-2">
                        We need someone to manage our Instagram and TikTok accounts. Create engaging content featuring our cats and daily specials...
                    </p>
                </div>
            </div>

            <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-xl p-4 shadow-lg flex flex-col md:flex-row gap-5 hover:bg-white/10 transition duration-300">
                <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&q=80" 
                     alt="Project Image" 
                     class="w-full md:w-48 h-32 object-cover rounded-lg">
                <div class="flex-1 space-y-1">
                    <h3 class="text-xl font-bold text-white">Graphic Designer needed</h3>
                    <p class="text-blue-300 font-bold text-sm">SaladBar UMKM -- Duration: 08.00 - 20.00</p>
                    <p class="text-gray-300 text-sm leading-relaxed mt-2">
                        Help us create brochures and flyers for our grand opening next month. Requires proficiency in Adobe Illustrator...
                    </p>
                </div>
            </div>

            <div class="text-center pt-4">
                <a href="#" class="text-gray-400 hover:text-yellow-400 transition">See more...</a>
            </div>

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
</style>
@endsection