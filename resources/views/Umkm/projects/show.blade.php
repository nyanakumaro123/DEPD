@extends('layouts.app')

@section('content')

@include('layouts.navbar')
<div class="p-6 bg-[#FFF7ED] min-h-screen">

<div class="p-6 max-w-6xl mx-auto">

    <h1 class="text-2xl font-bold mb-2">{{ $project->title }}</h1>
    <p class="text-gray-600 mb-6">{{ $project->category }}</p>

    <h2 class="text-xl font-semibold mb-4">Daftar Pelamar</h2>

    <div class="space-y-4">
        @forelse($project->applications as $app)
            <div class="bg-white p-4 rounded-lg shadow flex justify-between">
                <div>
                    <p class="font-bold">{{ $app->pelamar->name }}</p>
                    <p class="text-sm text-gray-600">
                        {{ $app->pelamar->pelamarProfile->major->name ?? '-' }}
                    </p>

                    @if($app->pelamar->pelamarProfile->portfolio)
                        <a href="{{ asset('storage/portfolio/' . $app->pelamar->pelamarProfile->portfolio) }}"
                           target="_blank"
                           class="text-blue-600 text-sm">
                            📄 Lihat Portfolio
                        </a>
                    @endif
                </div>

                <span class="text-sm font-semibold capitalize">
                    {{ $app->status }}
                </span>
            </div>
        @empty
            <p class="text-gray-500">Belum ada pelamar</p>
        @endforelse
    </div>

</div>
@endsection
