@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans pb-20 relative">

    <x-navbar-umkm />

    <div class="max-w-7xl mx-auto p-6 pt-10">
        <h1 class="text-4xl font-bold text-[#355dad] mb-8 font-serif">Profile</h1>
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            <div class="lg:col-span-4 flex flex-col items-center lg:items-start">
                <div class="h-64 w-64 lg:h-80 lg:w-80 rounded-full border-4 border-[#355dad] overflow-hidden shadow-lg bg-white">
                    <img src="{{ $profile->user->profile ? asset('storage/profile_pictures/' . $profile->user->profile) : asset('img/user_profile.webp') }}" 
                         alt="Profile Picture" class="h-full w-full object-cover">
                </div>
            </div>
            <div class="lg:col-span-8 space-y-8">
                <h2 class="text-5xl font-bold text-[#355dad] mb-2 font-serif">{{ $profile->umkm_name }}</h2>
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-[#355dad]">
                        Rating
                        <span class="text-[#dcbfa6] text-lg">
                            ★ {{ number_format($profile->ratings_avg_score ?? 0, 1) }}/5
                            ({{ $profile->ratings_count }})
                        </span>
                    </h3>
                    @forelse ($profile->ratings as $rating)
                        <div class="rounded-full px-4 py-2 flex justify-between items-center shadow-sm bg-[#d1fae5] border border-green-300">
                            <span class="font-bold text-sm text-green-800">{{ $rating->user->name }}</span>
                            <span class="font-bold text-sm text-green-800">★ {{ $rating->score }}/5</span>
                        </div>
                    @empty
                        <p class="text-gray-500 text-sm">No ratings yet.</p>
                    @endforelse
                </div>
                <div class="mt-8">
                    <h3 class="text-xl font-bold text-[#355dad] mb-2">Deskripsi UMKM</h3>
                    <p class="text-[#bcaaa4] font-medium leading-relaxed">
                        {{ $profile->description ?? 'No description available.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed bottom-10 left-10">
        <a href="{{ route('edit-profile.umkm') }}"
        class="bg-[#355dad] hover:bg-[#2a4a8b] text-white p-5 rounded-full shadow-2xl transition transform hover:scale-110 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
            </svg>
        </a>
    </div>
</div>
@endsection