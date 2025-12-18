@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans pb-20 relative">

    <x-navbar-pelamar />

    <div class="max-w-7xl mx-auto p-6 pt-10">

        <h1 class="text-4xl font-bold text-[#355dad] mb-8 font-serif">Profile</h1>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

            {{-- FOTO --}}
            <div class="lg:col-span-4 flex justify-center lg:justify-start">
                <div class="h-64 w-64 lg:h-80 lg:w-80 rounded-full border-4 border-[#355dad]
                            overflow-hidden shadow-lg bg-white">
                    <img src="https://i.pravatar.cc/400"
                         class="h-full w-full object-cover">
                </div>
            </div>

            {{-- INFO --}}
            <div class="lg:col-span-8 space-y-8">

                <div>
                    <h2 class="text-5xl font-bold text-[#355dad] font-serif">
                        {{ Auth::user()->name }}
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">

                        <div>
                            <label class="text-[#355dad] font-bold">Major</label>
                            <div class="bg-[#e0e7ff] p-3 rounded-lg font-semibold text-[#355dad]">
                                {{ Auth::user()->major ?? 'Belum diisi' }}
                            </div>
                        </div>

                        <div>
                            <label class="text-[#355dad] font-bold">Contact</label>
                            <div class="bg-[#e0e7ff] p-3 rounded-lg font-semibold text-[#355dad]">
                                {{ Auth::user()->phone ?? '-' }}
                            </div>
                        </div>

                        <div>
                            <label class="text-[#355dad] font-bold">Email</label>
                            <div class="bg-[#e0e7ff] p-3 rounded-lg font-semibold text-[#355dad] truncate">
                                {{ Auth::user()->email }}
                            </div>
                        </div>
                    </div>

                    <button class="mt-6 bg-[#355dad] text-white font-bold px-8 py-3 rounded-lg shadow hover:bg-[#2a4a8b]">
                        My Portfolio
                    </button>
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

            </div>
        </div>
    </div>

    {{-- EDIT BUTTON --}}
    <div class="fixed bottom-10 left-10">
        <a href="{{ route('edit-profile.pelamar') }}"
           class="bg-[#355dad] hover:bg-[#2a4a8b] text-white p-5 rounded-full shadow-2xl transition">
            ✏️
        </a>
    </div>

</div>
@endsection
