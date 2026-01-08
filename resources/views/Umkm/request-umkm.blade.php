@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans">

    {{-- NAVBAR --}}
    @include('layouts.navbar')

    {{-- CONTENT --}}
    <div class="max-w-5xl mx-auto px-6 py-12">

        {{-- HEADER --}}
        <div class="mb-10">
            <h1 class="text-4xl font-serif font-bold text-[#355dad]">
                Permohonan Lamaran
            </h1>
            <p class="text-gray-600 mt-2 text-lg">Kelola semua lamaran kerja yang masuk ke UMKM Anda.</p>
        </div>

        {{-- ===================== PENDING ===================== --}}
        <section class="mb-12">
            <div class="flex items-center gap-3 mb-6">
                <h2 class="text-2xl font-serif font-bold text-[#355dad]">
                    Menunggu Review
                </h2>
                <span class="bg-blue-100 text-blue-600 text-xs font-bold px-2.5 py-0.5 rounded-full">3</span>
            </div>

            <div class="grid gap-4">
                @for ($i = 0; $i < 3; $i++)
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between bg-white border border-blue-100 rounded-2xl p-5 shadow-sm hover:shadow-md transition-shadow gap-4">
                        <div class="flex items-center gap-4">
                            <div class="relative">
                                <img src="https://i.pravatar.cc/150?u={{ $i + 10 }}"
                                     class="w-14 h-14 rounded-full object-cover border-2 border-blue-50">
                                <div class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-yellow-400 border-2 border-white rounded-full"></div>
                            </div>
                            <div>
                                <h3 class="text-[#355dad] font-bold text-xl leading-tight">
                                    Diana Putri
                                </h3>
                                <p class="text-gray-500 text-sm">Melamar sebagai: <span class="font-medium text-gray-700">Staff Produksi</span></p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            <a href="{{ route('detail.request.umkm') }}"
                               class="flex-1 sm:flex-none px-6 py-2.5 rounded-xl bg-gray-50 text-gray-700 font-semibold text-sm hover:bg-gray-100 transition border border-gray-200 text-center">
                                Lihat Profil
                            </a>
                            <button class="flex-1 sm:flex-none px-6 py-2.5 rounded-xl bg-[#355dad] text-white font-semibold text-sm hover:bg-[#2a4a8b] transition shadow-sm shadow-blue-200">
                                Hubungi
                            </button>
                        </div>
                    </div>
                @endfor
            </div>
        </section>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            {{-- ===================== DITERIMA ===================== --}}
            <section>
                <div class="flex items-center gap-3 mb-6">
                    <h2 class="text-2xl font-serif font-bold text-[#355dad]">
                        Diterima
                    </h2>
                    <span class="bg-green-100 text-green-600 text-xs font-bold px-2.5 py-0.5 rounded-full">2</span>
                </div>

                <div class="space-y-3">
                    @for ($i = 0; $i < 2; $i++)
                        <div class="flex items-center justify-between bg-white border-l-4 border-l-green-500 rounded-xl px-5 py-4 shadow-sm">
                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/150?u={{ $i + 20 }}"
                                     class="w-10 h-10 rounded-full object-cover">
                                <div>
                                    <span class="text-gray-800 font-bold block">Budi Santoso</span>
                                    <span class="text-xs text-gray-500">Diterima pada 12 Okt</span>
                                </div>
                            </div>
                            <span class="text-green-600 bg-green-50 px-3 py-1 rounded-lg text-[10px] font-bold uppercase tracking-wider">
                                Active
                            </span>
                        </div>
                    @endfor
                </div>
            </section>

            {{-- ===================== DITOLAK ===================== --}}
            <section>
                <div class="flex items-center gap-3 mb-6">
                    <h2 class="text-2xl font-serif font-bold text-[#355dad]">
                        Ditolak
                    </h2>
                    <span class="bg-red-100 text-red-600 text-xs font-bold px-2.5 py-0.5 rounded-full">1</span>
                </div>

                <div class="space-y-3 opacity-80">
                    @for ($i = 0; $i < 1; $i++)
                        <div class="flex items-center justify-between bg-white border border-gray-100 rounded-xl px-5 py-4 shadow-sm">
                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/150?u={{ $i + 30 }}"
                                     class="w-10 h-10 rounded-full grayscale">
                                <div>
                                    <span class="text-gray-600 font-medium block">Kucing Garong</span>
                                    <span class="text-xs text-gray-400">Tidak sesuai kriteria</span>
                                </div>
                            </div>
                            <span class="text-gray-400 text-xs font-semibold italic">
                                Terarsipkan
                            </span>
                        </div>
                    @endfor
                </div>
            </section>
        </div>

    </div>
</div>
@endsection
