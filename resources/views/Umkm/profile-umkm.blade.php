@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans pb-20 relative">

    @include('layouts.navbar')

    <div class="max-w-7xl mx-auto p-6 pt-10">

        <h1 class="text-4xl font-bold text-[#355dad] mb-8 font-serif">Profile UMKM</h1>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            {{-- PROFILE PICTURE --}}
            <div class="lg:col-span-4 flex flex-col items-center lg:items-start">
                <div class="h-64 w-64 lg:h-80 lg:w-80 rounded-full border-4 border-[#355dad] overflow-hidden shadow-lg bg-white">
                    <img src="{{ asset('storage/profile_pictures/' . $profile->user->profile) ?? asset('img/user_profile.webp') }}" 
                         alt="Profile Picture" 
                         class="h-full w-full object-cover">
                </div>
            </div>

            {{-- INFO --}}
            <div class="lg:col-span-8 space-y-8">
                <h2 class="text-5xl font-bold text-[#355dad] mb-2 font-serif">{{ $profile->umkm_name }}</h2>

                <h2 class="text-5xl font-bold text-[#355dad] font-serif">
                    {{ Auth::user()->umkmProfile->umkm_name ?? Auth::user()->name }}
                </h2>
                {{-- RATING --}}    
                    <div class="space-y-4">
                        <h3 class="text-xl font-bold text-[#355dad]">
                            Rating
                            <span class="text-[#dcbfa6] text-lg">
                                ★ {{ number_format($profile->ratings_avg_score ?? 0, 1) }}/5
                                ({{ $profile->ratings_count }})
                            </span>
                        </h3>
                        
                        @forelse ($profile->ratings as $rating)
                            @php
                                $isGood = $rating->score >= 4;
                            @endphp

                            <div class="rounded-full px-4 py-2 flex justify-between items-center shadow-sm
                                {{ $isGood ? 'bg-[#d1fae5] border border-green-300' : 'bg-[#fee2e2] border border-red-300' }}">

                                <div class="flex items-center gap-3">
                                    <img src="{{ $rating->user->profile
                                        ? asset('storage/profile_pictures/' . $rating->user->profile)
                                        : asset('img/user_profile.webp') }}"
                                        class="h-8 w-8 rounded-full border
                                        {{ $isGood ? 'border-green-400' : 'border-red-400' }}">

                                    <span class="font-bold text-sm
                                        {{ $isGood ? 'text-green-800' : 'text-red-800' }}">
                                        {{ $rating->user->name }}
                                    </span>
                                </div>

                                <span class="font-bold text-sm
                                    {{ $isGood ? 'text-green-800' : 'text-red-800' }}">
                                    ★ {{ $rating->score }}/5
                                </span>
                            </div>
                        @empty
                            <p class="text-gray-500 text-sm">No ratings yet.</p>
                        @endforelse
                </div>

                {{-- RATING --}}
                <div>
                    <h3 class="text-xl font-bold text-[#355dad] mb-3">
                        Rating <span class="text-[#dcbfa6]">★ 0 / 5</span>
                    </h3>

                    <div class="bg-[#d1fae5] border border-green-300 rounded-xl p-4 font-bold text-green-800">
                        Belum ada ulasan
                    </div>
                </div>

                {{-- DESKRIPSI --}}
                <div>
                    <h3 class="text-xl font-bold text-[#355dad] mb-2">Deskripsi UMKM</h3>
                    <p class="text-[#bcaaa4] font-medium leading-relaxed">
                        {{ $profile->description ?? 'No description available.' }}
                    </p>
                </div>

            </div>
        </div>
    </div>

    {{-- EDIT BUTTON --}}
    @auth
        @if (auth()->id() === $profile->user->id)
            <div class="fixed bottom-10 left-10">
                <a href="{{ route('edit-profile.umkm', $profile->user->id) }}"
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
@endsection
