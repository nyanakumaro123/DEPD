@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#FFF7ED] ">

    <x-navbar-pelamar />

    <!-- Page Title -->
    <h1 class="text-4xl font-bold text-blue-700 mb-6">Notifikasi</h1>

    <div class="space-y-4 max-w-4xl">

        {{-- @foreach([1,2,3,4,5,6] as $item) --}}
        <div class="bg-blue-100 rounded-lg p-3 flex items-start gap-3 shadow-sm">

            <!-- Notification Image -->
            <img 
                src="https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=400&q=80"
                class="w-12 h-12 rounded-md object-cover"
            />

            <!-- Message Content -->
            <div class="flex-1 text-blue-900 text-sm">

                <!-- Example of Short Message -->
                {{-- @if($loop->index !== 2) --}}
                    <p class="font-semibold">Selamat! Magang anda diterima di Restomie!</p>
                {{-- @else --}}
                <!-- Example of Long Expandable Message -->
                    <details class="group">
                        <summary class="font-semibold cursor-pointer select-none">
                            Magang anda ditolak Restomie.
                        </summary>

                        <p class="mt-1 text-gray-700">
                            "ABCIWAKDARIWAKoswoskJDWIJDJOQDNQNALLOEMBVFISHHCK{RYOP MAIACOJD JIJK
                            SKKDNJWBJDJDJADJNASDANDDKKWPPWWWWWWWWWWWWWWWWWWWWWPPPPPPP..."
                        </p>
                    </details>
                {{-- @endif --}}

            </div>

            <!-- Optional Dropdown Icon -->
            <button class="text-blue-700 text-xl px-1">
                ˅
            </button>

        </div>
        {{-- @endforeach --}}

    </div>

</div>
@endsection
