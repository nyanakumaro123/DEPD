@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#FFF7ED] ">

    <x-navbar-pelamar />

    <div class="p-6 md:p-10 max-w-4xl mx-auto">
        <h1 class="text-4xl font-bold text-blue-700 mb-6">Notifikasi</h1>
        <div class="space-y-4">
            <div class="bg-blue-100 rounded-lg p-4 flex items-start gap-4 shadow-sm">
                <img src="https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=100&q=80" class="w-12 h-12 rounded-md object-cover"/>
                <div class="flex-1 text-blue-900 text-sm">
                    <p class="font-semibold text-base">Selamat! Lamaran magang anda diterima!</p>
                    <p class="text-xs text-gray-500 mt-1">2 Jam yang lalu</p>
                </div>
            </div>
            
            <div class="bg-white border border-gray-200 rounded-lg p-4 flex items-start gap-4 shadow-sm">
                 <div class="flex-1 text-gray-800 text-sm">
                    <details class="group">
                        <summary class="font-semibold cursor-pointer select-none list-none flex justify-between items-center">
                            <span>Info terbaru terkait lamaran anda</span>
                            <span class="text-blue-500 text-xs">Lihat Detail ▾</span>
                        </summary>
                        <p class="mt-2 text-gray-600 bg-gray-50 p-3 rounded-md">
                            Silakan cek email anda untuk informasi lebih lanjut.
                        </p>
                    </details>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection