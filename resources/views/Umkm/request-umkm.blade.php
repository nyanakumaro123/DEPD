@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans">

    {{-- NAVBAR --}}
    @include('layouts.navbar')

    {{-- CONTENT --}}
    <div class="max-w-5xl mx-auto px-6 py-10">

        {{-- TITLE --}}
        <h1 class="text-4xl font-serif font-bold text-[#355dad] mb-8">
            Permohonan Lamaran
        </h1>

        {{-- ===================== DITERIMA ===================== --}}
        <section class="mb-10">
            <h2 class="text-2xl font-serif text-[#355dad] mb-4">
                Diterima
            </h2>

            <div class="space-y-3">
                @for ($i = 0; $i < 3; $i++)
                    <div class="flex items-center justify-between
                                bg-green-100 border border-green-400
                                rounded-xl px-4 py-3">

                        <div class="flex items-center gap-3">
                            <img src="https://i.pravatar.cc/40?img=12"
                                 class="w-8 h-8 rounded-full">
                            <span class="text-green-800 font-medium">
                                NamaEmployee
                            </span>
                        </div>

                        <span class="text-green-700 font-semibold">
                            diterima
                        </span>
                    </div>
                @endfor
            </div>
        </section>

        {{-- ===================== PENDING ===================== --}}
        <section class="mb-10">
            <h2 class="text-2xl font-serif text-[#355dad] mb-4">
                Pending
            </h2>

            <div class="space-y-3">
                @for ($i = 0; $i < 3; $i++)
                    <div class="flex items-center justify-between
                                bg-blue-100 border border-blue-300
                                rounded-xl px-4 py-3">

                        <div class="flex items-center gap-3">
                            <img src="https://i.pravatar.cc/40?img=32"
                                 class="w-8 h-8 rounded-full">
                            <span class="text-blue-800 font-medium">
                                Diana
                            </span>
                        </div>

                        <div class="flex gap-3">
                            {{-- DETAIL --}}
                            <a href="{{ route('detail.request.umkm') }}"
                               class="px-6 py-1.5 rounded-full
                                      bg-yellow-200 border border-yellow-400
                                      text-yellow-800 font-medium
                                      hover:bg-yellow-300 transition
                                      inline-flex items-center justify-center">
                                Detail
                            </a>

                            {{-- KONTAK --}}
                            <button
                                class="px-6 py-1.5 rounded-full
                                       bg-[#355dad] text-white
                                       hover:bg-[#2a4a8b] transition">
                                Kontak
                            </button>
                        </div>
                    </div>
                @endfor
            </div>
        </section>

        {{-- ===================== DITOLAK ===================== --}}
        <section>
            <h2 class="text-2xl font-serif text-[#355dad] mb-4">
                Ditolak
            </h2>

            <div class="space-y-3">
                @for ($i = 0; $i < 3; $i++)
                    <div class="flex items-center justify-between
                                bg-red-100 border border-red-400
                                rounded-xl px-4 py-3">

                        <div class="flex items-center gap-3">
                            <img src="https://i.pravatar.cc/40?img=56"
                                 class="w-8 h-8 rounded-full">
                            <span class="text-red-700 font-medium">
                                KucingMauMakan
                            </span>
                        </div>

                        <span class="text-red-600 font-semibold">
                            ditolak
                        </span>
                    </div>
                @endfor
            </div>
        </section>

    </div>
</div>
@endsection
