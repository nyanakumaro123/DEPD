@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans">

    <x-navbar-umkm />

    <div class="max-w-4xl mx-auto px-6 py-10">

        <h1 class="text-3xl font-serif font-bold text-[#355dad] mb-2">Detail Lamaran</h1>
        <p class="text-lg text-gray-600 mb-8">
            <span class="font-bold text-[#355dad]">{{ $application->pelamar->user->name }}</span> 
            melamar untuk proyek 
            <span class="font-bold text-[#355dad]">{{ $application->project->title }}</span>
        </p>

        {{-- PITCH --}}
        <div class="mb-8">
            <label class="block text-lg font-bold text-[#355dad] mb-2">Pitch / Pesan Pelamar:</label>
            <div class="bg-white border border-blue-200 rounded-xl p-6 text-gray-700 leading-relaxed shadow-sm">
                "{{ $application->pitch ?? 'Tidak ada pesan yang dilampirkan.' }}"
            </div>
        </div>

        {{-- PORTOFOLIO --}}
        <div class="mb-10 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm">
                <p class="font-bold text-[#355dad] mb-2">Portofolio Pelamar</p>
                @if($application->pelamar->portfolio)
                    <a href="{{ asset('storage/public/portfolio/' . $application->pelamar->portfolio) }}" target="_blank" class="text-blue-600 underline hover:text-blue-800">
                        📄 Lihat Portofolio Profil
                    </a>
                @else
                    <span class="text-gray-400">Tidak ada portofolio di profil.</span>
                @endif
            </div>

            <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm">
                <p class="font-bold text-[#355dad] mb-2">Lampiran Khusus Proyek</p>
                @if($application->portfolio_file) 
                    {{-- Asumsi ada kolom portfolio_file di tabel applications jika upload khusus --}}
                    <a href="#" class="text-blue-600 underline">📂 Download Lampiran</a>
                @else
                     <span class="text-gray-400">Tidak ada lampiran khusus.</span>
                @endif
            </div>
        </div>

        {{-- ACTION BUTTONS --}}
        @if($application->status == 'pending')
        <div class="flex flex-col md:flex-row gap-4 justify-between mb-8">
            <form action="{{ route('umkm.application.reject', $application->id) }}" method="POST" class="flex-1">
                @csrf
                <button type="submit" class="w-full border-2 border-red-400 bg-red-50 text-red-700 py-3 rounded-xl font-bold hover:bg-red-100 transition">
                    ✖ Tolak Lamaran
                </button>
            </form>

            <a href="mailto:{{ $application->pelamar->user->email }}" class="flex-1 border-2 border-yellow-400 bg-yellow-50 text-yellow-700 py-3 rounded-xl font-bold hover:bg-yellow-100 transition text-center flex items-center justify-center">
                ✉ Kontak Email
            </a>

            <form action="{{ route('umkm.application.accept', $application->id) }}" method="POST" class="flex-1">
                @csrf
                <button type="submit" class="w-full border-2 border-green-400 bg-green-50 text-green-700 py-3 rounded-xl font-bold hover:bg-green-100 transition">
                    ✔ Terima Lamaran
                </button>
            </form>
        </div>
        @else
            <div class="p-4 rounded-xl text-center font-bold text-white mb-8 {{ $application->status == 'accepted' ? 'bg-green-500' : 'bg-red-500' }}">
                Lamaran ini telah berstatus: {{ strtoupper($application->status) }}
            </div>
        @endif

        <a href="{{ route('umkm.applications') }}" class="text-gray-500 hover:text-[#355dad] flex items-center gap-2">
            ← Kembali ke Daftar
        </a>

    </div>
</div>
@endsection