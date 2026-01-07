@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 overflow-hidden relative font-sans pb-20">
    <!-- Decorative background elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-0 -right-4 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>

    @include('layouts.navbar')

    <div class="relative z-10 max-w-7xl mx-auto p-6 pt-10 flex flex-col items-center lg:items-start">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <div class="lg:col-span-4 flex flex-col items-center lg:items-start relative z-10">
                <div class="h-64 w-64 lg:h-80 lg:w-80 rounded-full border-4 border-blue-400 overflow-hidden shadow-lg bg-white mb-6">
                    <img src="{{ $profile->user->profile ? asset('storage/profile_pictures/' . $profile->user->profile)
                    : asset('img/user_profile.webp') }}" 
                         alt="Profile Picture" 
                         class="h-full w-full object-cover">
                </div>
            </div>

            {{-- INFO --}}
            <div class="lg:col-span-8 space-y-8">

                <div class="relative z-10">
                    <h2 class="text-5xl font-bold text-white mb-6 font-serif flex items-baseline">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-white text-5xl mr-3">Profile</span>
                        <span class="flex-1">{{ $profile->user->name ?? 'Nama' }}</span>
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="space-y-1">
                            <label class="block text-blue-200 text-sm font-semibold mb-2 ml-1">Major</label>
                            <div class="bg-white/10 backdrop-blur-lg border border-white/20 text-white font-semibold py-3 px-4 rounded-lg shadow-sm">
                                {{ $profile->major->name ?? 'No Major' }}
                            </div>
                        </div>

                        <div>
                            <label class="block text-blue-200 text-sm font-semibold mb-2 ml-1">Contact</label>
                            <div class="bg-white/10 backdrop-blur-lg border border-white/20 p-3 rounded-lg font-semibold text-white">
                                {{ Auth::user()->phone ?? '-' }}
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="block text-blue-200 text-sm font-semibold mb-2 ml-1">Email</label>
                            <div class="bg-white/10 backdrop-blur-lg border border-white/20 text-white font-semibold py-3 px-4 rounded-lg shadow-sm truncate">
                                {{ $profile->user->email ?? 'No Email' }}
                            </div>
                        </div>
                    </div>
                    <div class="pt-4">
                        @if($profile->portfolio)
                            <a href="{{ asset('storage/portfolio/' . $profile->portfolio) }}" target="_blank"
                            class="bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-bold py-3.5 px-8 rounded-xl transition duration-300 shadow-lg shadow-blue-900/30 transform hover:scale-105 inline-block tracking-wide">
                                View Portfolio
                            </a>
                        @else
                            <span class="text-gray-400 font-bold py-3 px-8 inline-block">No Portfolio Uploaded</span>
                        @endif
                    </div>
                </div>
                {{-- HISTORY (DUMMY AMAN) --}}
                <div class="relative z-10">
                    <h3 class="text-2xl font-bold text-blue-200 mb-4">Project History</h3>
                    <div class="bg-white/10 backdrop-blur-lg border border-white/20 p-4 rounded-xl text-white font-semibold">
                        Belum ada project
                    </div>
                </div>

                {{-- SERTIFIKAT --}}
                <div class="relative z-10">
                    <h3 class="text-2xl font-bold text-blue-200 mb-4">Certificate</h3>
                    <div class="bg-white/10 backdrop-blur-lg border border-white/20 p-4 rounded-xl text-white font-semibold">
                        Belum ada sertifikat
                    </div>
                </div>

            </div>
        </div>
    </div>

    @auth
        @if (auth()->id() === $profile->user->id)
            <div class="fixed bottom-10 left-10">
                <a href="{{ route('edit-profile.pelamar', $profile->user->id) }}"
                class="bg-[#355dad] hover:bg-[#2a4a8b] text-white p-5 rounded-full shadow-2xl transition transform hover:scale-110 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                    </svg>
                </a>
            </div>
            <div class="fixed bottom-10 left-32">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white p-5 rounded-full shadow-2xl transition transform hover:scale-110 flex items-center justify-center"
                        title="Logout">
                        
                        <!-- Logout Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke-width="2" 
                            stroke="currentColor" 
                            class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 12H9m0 0l3-3m-3 3l3 3" />
                        </svg>
                    </button>
                </form>
            </div>
        @endif
    @endauth

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
