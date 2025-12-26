@extends('layouts.app')

@section('content')
<div class="bg-[#FFF7ED] min-h-screen pb-10">

    <x-navbar-pelamar />

    <div class="w-full h-64 md:h-80 overflow-hidden">
        <img 
            src="https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=1200&q=80"
            class="w-full h-full object-cover"
        >
    </div>

    <div class="max-w-6xl mx-auto bg-white rounded-t-3xl shadow-sm -mt-10 p-6 md:p-10 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2">
                <h1 class="text-4xl font-extrabold text-[#8B4513]">JudulProyek</h1>
                <p class="text-green-600 font-semibold text-lg">NamaUMKM</p>
                <div class="mt-4 space-y-1 text-gray-700">
                    <p><span class="font-semibold">Durasi:</span> 08.00 - 20.00</p>
                    <p><span class="font-semibold">Reward:</span> Certificate</p>
                </div>
                <div class="mt-6">
                    <h3 class="font-semibold text-xl text-[#8B4513]">Deskripsi:</h3>
                    <p class="text-gray-600 leading-relaxed mt-2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
            </div>

            <div class="space-y-4 flex flex-col items-start md:items-end">
                <p class="text-gray-700"><span class="font-semibold">Jumlah Pelamar:</span> 44</p>
                <button class="w-full md:w-48 bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg text-center font-medium">Syarat Lamar</button>
                <a href="{{ route('apply.projek') }}" class="w-full md:w-48 bg-yellow-100 hover:bg-yellow-200 text-yellow-800 border border-yellow-300 py-2 rounded-lg text-center font-medium block">
                    Apply Project
                </a>
            </div>
        </div>
    </div>
</div>
@endsection