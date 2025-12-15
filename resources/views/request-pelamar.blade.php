@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans pb-10">

    {{-- NAVBAR --}}
    <x-navbar-pelamar />

    {{-- CONTENT --}}
    <div class="max-w-5xl mx-auto px-6 py-8">

        {{-- TITLE --}}
        <h1 class="text-4xl font-serif font-bold text-[#355dad] mb-6">
            Permohonan Lamaran
        </h1>

        {{-- ===================== DITERIMA ===================== --}}
        <section class="mb-10">
            <h2 class="text-xl font-serif text-[#355dad] mb-3">
                Diterima
            </h2>

            <div class="space-y-3">
                <div class="flex items-center justify-between
                            bg-green-100 border border-green-400
                            rounded-xl px-4 py-3">

                    <div class="flex items-center gap-3">
                        <img src="https://i.pravatar.cc/40?img=11"
                             class="w-8 h-8 rounded-full">
                        <span class="text-green-800 font-medium">
                            Restomie
                        </span>
                    </div>

                    <span class="text-green-700 font-semibold">
                        diterima
                    </span>
                </div>
            </div>
        </section>

        {{-- ===================== PENDING ===================== --}}
        <section>
            <h2 class="text-xl font-serif text-[#355dad] mb-3">
                Pending
            </h2>

            <div class="space-y-3">
                @for ($i = 0; $i < 9; $i++)
                    <div class="flex items-center justify-between
                                bg-blue-100 border border-blue-300
                                rounded-xl px-4 py-3">

                        <div class="flex items-center gap-3">
                            <img src="https://i.pravatar.cc/40?img=22"
                                 class="w-8 h-8 rounded-full">
                            <span class="text-blue-800 font-medium">
                                CatCatCafe
                            </span>
                        </div>

                        <span class="text-blue-700 font-semibold">
                            Pending
                        </span>
                    </div>
                @endfor
            </div>
        </section>

    </div>
</div>
@endsection
