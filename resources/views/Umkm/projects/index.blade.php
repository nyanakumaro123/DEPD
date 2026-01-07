@extends('layouts.app')

@section('content')
<div class="p-6 bg-[#FFF7ED] min-h-screen">

@include('layouts.navbar')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Project Saya</h1>

    <div class="grid md:grid-cols-2 gap-6">
        @foreach($projects as $project)
            <div class="bg-white p-4 rounded-xl shadow">
                <h3 class="font-bold text-lg">{{ $project->title }}</h3>
                <p class="text-sm text-gray-500">{{ $project->category }}</p>

                <p class="mt-2 text-sm">
                    👥 {{ $project->applications_count }} Pelamar
                </p>

                <a href="{{ route('umkm.projects.show', $project) }}"
                   class="inline-block mt-3 text-blue-600 font-semibold">
                    Lihat Detail →
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
