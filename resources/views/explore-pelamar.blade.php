@extends('layouts.app')

@section('content')
<div class="w-full min-h-screen bg-[#FFF7ED] ">

    <x-navbar-pelamar />

    <div class="flex items-center gap-3 mb-6 px-6 pt-6">
        <input 
            type="text" 
            placeholder="Telusuri disini.." 
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300"
        />

        <button class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full">
            🔍
        </button>
    </div>

    <div class="flex flex-wrap gap-3 mb-8 px-6">
        <button class="px-4 py-2 rounded-full bg-blue-700 text-white">branding</button>
        <button class="px-4 py-2 rounded-full bg-blue-100 text-blue-700">design</button>
        <button class="px-4 py-2 rounded-full bg-blue-100 text-blue-700">Marketing</button>
        <button class="px-4 py-2 rounded-full bg-yellow-500 text-white">Sertifikat</button>
        <button class="px-4 py-2 rounded-full bg-yellow-100 text-yellow-800">Gaji</button>
    </div>

    <div class="px-6 pb-10">
        <h2 class="text-xl font-semibold mb-4">Hasil pencarian</h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <div class="space-y-5">
                @foreach([1,2,3,4] as $item)
                <div class="flex bg-white shadow-sm rounded-lg p-3 gap-4">
                    <img 
                        src="https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=300&q=80"
                        class="w-36 h-24 object-cover rounded-md"
                    />
                    <div class="flex-1">
                        <h3 class="text-lg font-bold text-gray-800">Judul Proyek</h3>
                        <p class="text-sm text-gray-600">NamaUMKM &bull; Sertifikat</p>
                        <p class="text-xs text-gray-400 truncate mt-1">Deskripsi singkat proyek...</p>
                    </div>
                    <div class="flex items-center">
                        <a href="{{ route('detail.projek') }}" class="bg-yellow-200 hover:bg-yellow-300 px-4 py-2 rounded-lg text-yellow-900 text-sm font-medium">
                            Detail
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="hidden lg:block bg-white shadow-md p-6 rounded-xl h-fit sticky top-20">
                <h2 class="text-4xl font-extrabold text-[#8B4513] mb-2">JudulProyek</h2>
                <p class="text-lg text-gray-600 mb-1">NamaUMKM</p>
                <p class="text-lg font-semibold text-yellow-600 mb-4">Durasi: 08.00 - 20.00</p>
                <h3 class="font-semibold text-gray-800 mb-1">Deskripsi:</h3>
                <p class="text-gray-600 leading-relaxed">
                    Ini adalah preview deskripsi proyek. Klik tombol detail pada list di samping untuk melihat informasi selengkapnya.
                </p>
            </div>

        </div>
    </div>
</div>
@endsection