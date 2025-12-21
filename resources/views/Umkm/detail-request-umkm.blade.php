@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans">

    {{-- NAVBAR --}}
    @include('layouts.navbar')

    {{-- CONTENT --}}
    <div class="max-w-5xl mx-auto px-6 py-10">

        {{-- TITLE --}}
        <h1 class="text-4xl font-serif font-bold text-[#355dad] mb-2">
            Detail Apply
        </h1>

        <p class="text-xl text-[#355dad] mb-8">
            KucingSukaMakan melamar ke <span class="font-semibold">JudulProyek</span>
        </p>

        {{-- PITCH --}}
        <div class="mb-6">
            <label class="block text-lg font-semibold text-[#355dad] mb-2">
                Pitch:
            </label>

            <div class="bg-blue-100 border border-blue-300 rounded-xl p-4 text-blue-800 leading-relaxed">
                Saya mahasiswa Desain Komunikasi Visual semester 6. Pernah membuat
                branding untuk 3 UMKM kecil. Saya tertarik bantu proyek ini karena
                fokus saya memang di desain identitas. Saya siap mulai segera.
            </div>
        </div>

        {{-- PORTOFOLIO BUTTON --}}
        <div class="mb-10">
            <a href="#"
               class="block w-full text-center
                      bg-[#355dad] text-white
                      py-3 rounded-xl font-semibold
                      hover:bg-[#2a4a8b] transition">
                Lihat Portofolio
            </a>
        </div>

        {{-- ACTION BUTTONS --}}
        <div class="flex flex-col md:flex-row gap-4 justify-between mb-8">

            {{-- TOLAK --}}
            <button
                class="flex-1 border-2 border-red-400
                       bg-red-100 text-red-600
                       py-3 rounded-xl font-semibold
                       hover:bg-red-200 transition">
                Tolak
            </button>

            {{-- KONTAK --}}
            <button
                class="flex-1 border-2 border-yellow-400
                       bg-yellow-100 text-yellow-700
                       py-3 rounded-xl font-semibold
                       hover:bg-yellow-200 transition">
                Kontak
            </button>

            {{-- TERIMA --}}
            <button
                class="flex-1 border-2 border-green-400
                       bg-green-100 text-green-700
                       py-3 rounded-xl font-semibold
                       hover:bg-green-200 transition">
                Terima
            </button>
        </div>

        {{-- BACK BUTTON --}}
        <div>
            <a href="{{ url()->previous() }}"
               class="block w-full text-center
                      bg-blue-200 text-[#355dad]
                      py-3 rounded-xl font-semibold
                      hover:bg-blue-300 transition">
                Balik
            </a>
        </div>

    </div>
</div>
@endsection
