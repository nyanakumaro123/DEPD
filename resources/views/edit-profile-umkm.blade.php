@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans pb-12">

    <x-navbar-umkm />

    <div class="max-w-6xl mx-auto p-6 pt-8">

        <div class="flex items-center justify-between mb-10">
            <h1 class="text-4xl font-bold text-[#355dad] font-serif">
                Profile UMKM
            </h1>

            <a href="{{ route('edit-profile.umkm') }}"
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
                            src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?auto=format&fit=crop&w=600&q=80"
                            class="w-full h-full object-cover"
                            alt="Foto UMKM">
                    </div>

                    <h2 class="text-2xl font-bold text-[#355dad]">
                        Restomie
                    </h2>

                    <p class="text-gray-500 font-semibold mt-1">
                        UMKM Kuliner
                    </p>
                </div>

                {{-- DATA --}}
                <div class="lg:col-span-8 space-y-6">

                    <div>
                        <label class="text-[#355dad] font-bold block mb-2">
                            Nama UMKM
                        </label>
                        <div class="bg-[#e0e7ff] text-[#355dad] font-semibold px-4 py-3 rounded-lg">
                            Restomie
                        </div>
                    </div>

                    <div>
                        <label class="text-[#355dad] font-bold block mb-2">
                            Deskripsi UMKM
                        </label>
                        <div class="bg-[#e0e7ff] text-[#355dad] font-medium px-4 py-4 rounded-lg leading-relaxed">
                            Restomie adalah UMKM kuliner yang bergerak di bidang makanan
                            cepat saji dengan cita rasa lokal. Kami fokus menyediakan
                            produk berkualitas dengan harga terjangkau serta membuka
                            peluang kerja bagi generasi muda.
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
