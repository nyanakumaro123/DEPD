@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans pb-20 relative">

    @include('layouts.navbar')

    <div class="max-w-7xl mx-auto p-6 pt-10">

        <h1 class="text-4xl font-bold text-[#355dad] mb-8 font-serif">Profile</h1>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <div class="lg:col-span-4 flex flex-col items-center lg:items-start">
                <div class="h-64 w-64 lg:h-80 lg:w-80 rounded-full border-4 border-[#355dad] overflow-hidden shadow-lg bg-white">
                    <img src="{{ $profile->user->profile ? asset('storage/profile_pictures/' . $profile->user->profile)
                    : asset('img/user_profile.webp') }}" 
                         alt="Profile Picture" 
                         class="h-full w-full object-cover">
                </div>
            </div>

            {{-- INFO --}}
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

                        <div>
                            <label class="text-[#355dad] font-bold">Contact</label>
                            <div class="bg-[#e0e7ff] p-3 rounded-lg font-semibold text-[#355dad]">
                                {{ Auth::user()->phone ?? '-' }}
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

                {{-- HISTORY (DUMMY AMAN) --}}
                <div>
                    <h3 class="text-2xl font-bold text-[#355dad] mb-4">Project History</h3>

                    <div class="bg-[#e8d5c4] p-4 rounded-xl text-[#5c3d2e] font-semibold">
                        Belum ada project
                    </div>
                </div>

                {{-- SERTIFIKAT --}}
                <div>
                    <h3 class="text-2xl font-bold text-[#355dad] mb-4">Certificate</h3>

                    <div class="bg-[#e8d5c4] p-4 rounded-xl text-[#5c3d2e] font-semibold">
                        Belum ada sertifikat
                    </div>
                </div>

                {{-- Logout Button --}}
                @auth
                    <div class="flex justify-end">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" 
                                    class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-6 rounded-lg shadow-md transition transform hover:scale-105">
                                Logout
                            </button>
                        </form>
                    </div>
                @endauth

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
        @endif
    @endauth

</div>
@endsection
