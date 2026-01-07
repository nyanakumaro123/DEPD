@extends('layouts.app')

@section('content')
<div class="p-6 bg-[#FFF7ED] min-h-screen">

@include('layouts.navbar')

    <h1 class="text-2xl font-bold mb-6">Project yang Saya Lamar</h1>

    <div class="space-y-4">
        @foreach($applications as $app)
            <div class="bg-white p-4 rounded-xl shadow">
                <h3 class="font-bold text-lg">{{ $app->project->title }}</h3>
                <p class="text-sm text-gray-500">
                    UMKM: {{ $app->project->umkm->name }}
                </p>

                <div class="mt-2 flex justify-between">
                    <span class="text-sm">
                        Status: <b class="capitalize">{{ $app->status }}</b>
                    </span>

                    <a href="{{ route('explore.show', $app->project) }}"
                       class="text-blue-600 font-semibold">
                        Detail →
                    </a>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
