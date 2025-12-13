@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans pb-20 relative">

    @extends('layouts.navbar')

    <div class="max-w-7xl mx-auto p-6 pt-10">
        
        <h1 class="text-4xl font-bold text-[#355dad] mb-8 font-serif">Profile</h1>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <div class="lg:col-span-4 flex flex-col items-center lg:items-start">
                <div class="h-64 w-64 lg:h-80 lg:w-80 rounded-full border-4 border-[#355dad] overflow-hidden shadow-lg bg-white">
                    <img src="{{ asset('storage/profile_pictures/' . $profile->user->profile) ?? asset('img/user_profile.webp') }}" 
                         alt="Profile Picture" 
                         class="h-full w-full object-cover">
                </div>
            </div>

            <div class="lg:col-span-8 space-y-8">
                
                <div>
                    <h2 class="text-5xl font-bold text-[#355dad] mb-6 font-serif"> {{ $profile->user->name ?? 'Nama' }} </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="space-y-1">
                            <label class="text-[#355dad] font-bold text-lg">Major</label>
                            <div class="bg-[#e0e7ff] text-[#355dad] font-semibold py-3 px-4 rounded-lg shadow-sm border border-blue-100">
                                {{ $profile->major->name ?? 'No Major' }}
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
                                {{ $profile->user->email ?? 'No Email' }}
                            </div>
                        </div>
                    </div>

                    <div class="pt-4">
                        @if($profile->portfolio)
                            <a href="{{ asset('storage/portfolio/' . $profile->portfolio) }}" target="_blank"
                            class="bg-[#355dad] hover:bg-[#2a4a8b] text-white font-bold py-3 px-8 rounded-lg shadow-md transition transform hover:scale-105 inline-block">
                                View Portfolio
                            </a>
                        @else
                            <span class="text-gray-400 font-bold py-3 px-8 inline-block">No Portfolio Uploaded</span>
                        @endif
                    </div>
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
        <a href="{{ route('edit-profile.pelamar', $profile->user->id) }}" class="bg-[#355dad] hover:bg-[#2a4a8b] text-white p-5 rounded-full shadow-2xl transition transform hover:scale-110 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
            </svg>
        </a>
    </div>

</div>
@endsection