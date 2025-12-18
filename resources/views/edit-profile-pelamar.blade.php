@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans pb-12">

    <x-navbar-pelamar />

    <div class="max-w-6xl mx-auto p-6 pt-8">

        <div class="flex items-center justify-between mb-10">
            <h1 class="text-4xl font-bold text-[#355dad] font-serif">
                My Profile
            </h1>

            <a href="{{ route('edit-profile.pelamar') }}"
               class="bg-[#355dad] hover:bg-[#2a4a8b] text-white font-bold px-6 py-3 rounded-lg shadow transition">
                Edit Profile
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-10">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">

                {{-- FOTO --}}
                <div class="lg:col-span-4 flex flex-col items-center text-center">
                    <div class="h-60 w-60 rounded-full overflow-hidden border-4 border-[#355dad] shadow-lg mb-6">
                        <img
                            src="https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?auto=format&fit=crop&w=600&q=80"
                            class="w-full h-full object-cover"
                            alt="Profile Photo">
                    </div>

                    <h2 class="text-2xl font-bold text-[#355dad]">
                        KucingMauMakan
                    </h2>

                    <p class="text-gray-500 font-semibold mt-1">
                        VCD / DKV
                    </p>
                </div>

                {{-- DATA --}}
                <div class="lg:col-span-8 space-y-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <label class="text-[#355dad] font-bold block mb-1">
                                Email
                            </label>
                            <div class="bg-[#e0e7ff] text-[#355dad] font-semibold px-4 py-3 rounded-lg">
                                kucing@gmail.com
                            </div>
                        </div>

                        <div>
                            <label class="text-[#355dad] font-bold block mb-1">
                                Contact
                            </label>
                            <div class="bg-[#e0e7ff] text-[#355dad] font-semibold px-4 py-3 rounded-lg">
                                08126523895
                            </div>
                        </div>

                    </div>

                    <div>
                        <label class="text-[#355dad] font-bold block mb-1">
                            Major
                        </label>
                        <div class="bg-[#e0e7ff] text-[#355dad] font-semibold px-4 py-3 rounded-lg">
                            Visual Communication Design (DKV)
                        </div>
                    </div>

                    <div>
                        <label class="text-[#355dad] font-bold block mb-2">
                            Portfolio
                        </label>

                        <a href="#"
                           class="inline-flex items-center gap-3 bg-[#355dad] hover:bg-[#2a4a8b] text-white font-bold px-6 py-3 rounded-lg shadow transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2a5 5 0 00-5 5v3H6a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2v-8a2 2 0 00-2-2h-1V7a5 5 0 00-5-5zm-3 8V7a3 3 0 016 0v3H9z"/>
                            </svg>
                            Download Portfolio (PDF)
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
