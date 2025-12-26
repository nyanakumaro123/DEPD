@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans">

    <x-navbar-umkm />

    <div class="max-w-5xl mx-auto px-6 py-10">
        <h1 class="text-4xl font-serif font-bold text-[#355dad] mb-8">Permohonan Lamaran</h1>

        {{-- PENDING --}}
        <section class="mb-10">
            <h2 class="text-2xl font-serif text-[#355dad] mb-4 border-b-2 border-yellow-200 inline-block pb-1">
                Menunggu Konfirmasi ({{ $pending->count() }})
            </h2>

            <div class="space-y-3">
                @forelse ($pending as $app)
                    <div class="flex flex-col md:flex-row md:items-center justify-between bg-white border border-blue-200 rounded-xl px-6 py-4 shadow-sm hover:shadow-md transition">
                        <div class="flex items-center gap-4 mb-3 md:mb-0">
                            <img src="{{ $app->pelamar->user->profile ? asset('storage/profile_pictures/'.$app->pelamar->user->profile) : asset('img/user_profile.webp') }}" class="w-12 h-12 rounded-full object-cover border border-gray-200">
                            <div>
                                <h4 class="text-[#355dad] font-bold text-lg">{{ $app->pelamar->user->name }}</h4>
                                <p class="text-sm text-gray-500">Melamar: {{ $app->project->title }}</p>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <a href="{{ route('umkm.application.detail', $app->id) }}" class="px-6 py-2 rounded-lg bg-yellow-100 text-yellow-800 font-bold hover:bg-yellow-200 transition">
                                Detail
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 italic">Belum ada lamaran baru.</p>
                @endforelse
            </div>
        </section>

        {{-- DITERIMA --}}
        <section class="mb-10">
            <h2 class="text-2xl font-serif text-green-700 mb-4">Diterima</h2>
            <div class="space-y-3">
                @foreach ($accepted as $app)
                    <div class="flex items-center justify-between bg-green-50 border border-green-200 rounded-xl px-6 py-3">
                        <div class="flex items-center gap-3">
                            <span class="font-bold text-green-800">{{ $app->pelamar->user->name }}</span>
                            <span class="text-sm text-green-600">- {{ $app->project->title }}</span>
                        </div>
                        <span class="bg-green-200 text-green-800 text-xs px-3 py-1 rounded-full font-bold">ACCEPTED</span>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- DITOLAK --}}
        <section>
            <h2 class="text-2xl font-serif text-red-700 mb-4">Ditolak</h2>
            <div class="space-y-3">
                @foreach ($rejected as $app)
                    <div class="flex items-center justify-between bg-red-50 border border-red-200 rounded-xl px-6 py-3 grayscale opacity-75">
                         <div class="flex items-center gap-3">
                            <span class="font-bold text-red-800">{{ $app->pelamar->user->name }}</span>
                             <span class="text-sm text-red-600">- {{ $app->project->title }}</span>
                        </div>
                        <span class="bg-red-200 text-red-800 text-xs px-3 py-1 rounded-full font-bold">REJECTED</span>
                    </div>
                @endforeach
            </div>
        </section>

    </div>
</div>
@endsection