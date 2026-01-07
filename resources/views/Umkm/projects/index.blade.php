@extends('layouts.app')

@section('content')

@include('layouts.navbar')
<div class="p-6 max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Project Saya</h1>
        <a href="{{ route('umkm.projects.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            + Tambah Project
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid md:grid-cols-2 gap-6">
        @forelse($projects as $project)
            <div class="bg-white p-5 rounded-xl shadow flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start">
                        <h3 class="font-bold text-lg">{{ $project->title }}</h3>
                        <span class="text-xs bg-orange-100 text-orange-600 px-2 py-1 rounded-full">
                            {{ $project->category }}
                        </span>
                    </div>
                    
                    <p class="mt-2 text-sm text-gray-600 line-clamp-2">
                        {{ $project->description }}
                    </p>

                    <p class="mt-3 text-sm font-medium">
                        👥 {{ $project->applications_count }} Pelamar
                    </p>
                </div>

                <div class="mt-4 flex items-center justify-between border-t pt-4">
                    <a href="{{ route('umkm.projects.show', $project) }}"
                       class="text-blue-600 font-semibold text-sm hover:underline">
                        Lihat Detail
                    </a>

                    <div class="flex space-x-2">
                        <a href="{{ route('umkm.projects.edit', $project) }}" 
                           class="text-gray-500 hover:text-yellow-600">
                            ✏️ Edit
                        </a>
                        
                        <form action="{{ route('umkm.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus project ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-gray-500 hover:text-red-600">
                                🗑️ Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-2 text-center py-10 text-gray-500">
                Belum ada project. Silakan buat project baru.
            </div>
        @endforelse
    </div>
</div>
@endsection