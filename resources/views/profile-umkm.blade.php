@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans pb-20 relative">

    <x-navbar-umkm />

    <div class="max-w-7xl mx-auto p-6 pt-10">

        <h1 class="text-4xl font-bold text-[#355dad] mb-8 font-serif">Profile UMKM</h1>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

            {{-- FOTO --}}
            <div class="lg:col-span-4 flex justify-center lg:justify-start">
                <div class="h-64 w-64 lg:h-80 lg:w-80 rounded-full border-4 border-[#355dad]
                            overflow-hidden shadow-lg bg-white">
                    <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38"
                         class="h-full w-full object-cover">
                </div>
            </div>

            {{-- INFO --}}
            <div class="lg:col-span-8 space-y-8">

                <h2 class="text-5xl font-bold text-[#355dad] font-serif">
                    {{ Auth::user()->umkmProfile->umkm_name ?? Auth::user()->name }}
                </h2>

                {{-- RIWAYAT PROJECT --}}
                <div>
                    <h3 class="text-xl font-bold text-[#355dad] mb-3">Riwayat Proyek</h3>

                    <div class="bg-[#e8d5c4] p-4 rounded-xl text-[#5c3d2e] font-semibold">
                        Belum ada proyek
                    </div>
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
                        {{ Auth::user()->umkmProfile->description ?? 'Deskripsi belum diisi' }}
                    </p>
                </div>

            </div>
        </div>
    </div>

    {{-- EDIT BUTTON --}}
    <div class="fixed bottom-10 left-10">
        <a href="{{ route('edit-profile.umkm') }}"
        class="bg-[#355dad] hover:bg-[#2a4a8b] text-white p-5 rounded-full shadow-2xl transition">
            ✏️
        </a>
    </div>



</div>
@endsection
