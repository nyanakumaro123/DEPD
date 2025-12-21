@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Navigation Bar -->
    @include('layouts.navbar')

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Sidebar - Apply Status -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Apply Status</h2>
                    
                    <!-- Status Item - Accepted -->
                    <div class="mb-4 p-4 bg-green-50 border-l-4 border-green-500 rounded-lg flex items-center justify-between hover:bg-green-100 transition">
                        <div class="flex items-center space-x-3">
                            <img src="https://ui-avatars.com/api/?name=Retromie&background=4ade80&color=fff" alt="Retromie" class="w-10 h-10 rounded-full">
                            <span class="font-semibold text-gray-700">Retromie</span>
                        </div>
                        <span class="px-3 py-1 bg-green-500 text-white text-sm font-semibold rounded-full">accepted</span>
                    </div>

                    <!-- Status Item - Pending -->
                    <div class="mb-4 p-4 bg-blue-50 border-l-4 border-blue-500 rounded-lg flex items-center justify-between hover:bg-blue-100 transition">
                        <div class="flex items-center space-x-3">
                            <img src="https://ui-avatars.com/api/?name=CatCafe&background=60a5fa&color=fff" alt="CatCafe" class="w-10 h-10 rounded-full">
                            <span class="font-semibold text-gray-700">CatCafe</span>
                        </div>
                        <span class="px-3 py-1 bg-blue-500 text-white text-sm font-semibold rounded-full">pending</span>
                    </div>

                    <button class="w-full text-center text-blue-600 hover:text-blue-800 font-semibold mt-4 transition">
                        See more...
                    </button>
                </div>
            </div>

            <!-- Right Content - Ongoing Projects -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">Ongoing Projects</h2>
                        <button class="bg-[#355dad] hover:bg-[#2b4c8c] text-white rounded-full p-2 transition shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>
                    </div>

                    <!-- Project Cards -->
                    <div class="space-y-4">
                        <!-- Project Card 1 -->
                        <div class="bg-gradient-to-r from-red-50 to-orange-50 rounded-xl p-4 hover:shadow-lg transition border border-red-100">
                            <div class="flex gap-4">
                                <img src="https://images.unsplash.com/photo-1569718212165-3a8278d5f624?w=200&h=200&fit=crop" alt="Project" class="w-24 h-24 rounded-lg object-cover shadow-md">
                                <div class="flex-1">
                                    <h3 class="text-xl font-bold text-gray-800 mb-1">Project title</h3>
                                    <p class="text-sm text-gray-600 font-semibold mb-2">UMKM Name -- Duration: 08.00 - 20.00</p>
                                    <p class="text-sm text-gray-500 line-clamp-2">descriptiondescriptiondescriptiondescriptiondescriptiondes...</p>
                                </div>
                            </div>
                        </div>

                        <!-- Project Card 2 -->
                        <div class="bg-gradient-to-r from-red-50 to-orange-50 rounded-xl p-4 hover:shadow-lg transition border border-red-100">
                            <div class="flex gap-4">
                                <img src="https://images.unsplash.com/photo-1569718212165-3a8278d5f624?w=200&h=200&fit=crop" alt="Project" class="w-24 h-24 rounded-lg object-cover shadow-md">
                                <div class="flex-1">
                                    <h3 class="text-xl font-bold text-gray-800 mb-1">Project title</h3>
                                    <p class="text-sm text-gray-600 font-semibold mb-2">UMKM Name -- Duration: 08.00 - 20.00</p>
                                    <p class="text-sm text-gray-500 line-clamp-2">descriptiondescriptiondescriptiondescriptiondescriptiondes...</p>
                                </div>
                            </div>
                        </div>

                        <!-- Project Card 3 -->
                        <div class="bg-gradient-to-r from-red-50 to-orange-50 rounded-xl p-4 hover:shadow-lg transition border border-red-100">
                            <div class="flex gap-4">
                                <img src="https://images.unsplash.com/photo-1569718212165-3a8278d5f624?w=200&h=200&fit=crop" alt="Project" class="w-24 h-24 rounded-lg object-cover shadow-md">
                                <div class="flex-1">
                                    <h3 class="text-xl font-bold text-gray-800 mb-1">Project title</h3>
                                    <p class="text-sm text-gray-600 font-semibold mb-2">UMKM Name -- Duration: 08.00 - 20.00</p>
                                    <p class="text-sm text-gray-500 line-clamp-2">descriptiondescriptiondescriptiondescriptiondescriptiondes...</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="w-full text-center text-blue-600 hover:text-blue-800 font-semibold mt-6 transition">
                        See more...
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection