@extends('layouts.app')

@section('content')
<div class="p-6 bg-[#FFF7ED] min-h-screen">

@include('layouts.navbar')

<div class="bg-white p-6 rounded-xl shadow max-w-xl">
    <h2 class="text-2xl font-bold">{{ $user->name }}</h2>

    <p class="mt-2">
        <strong>Major:</strong>
        {{ $user->pelamarProfile->major->name ?? '-' }}
    </p>

    @if($user->pelamarProfile->portfolio)
        <a href="{{ asset('storage/'.$user->pelamarProfile->portfolio) }}"
           target="_blank"
           class="mt-4 inline-block bg-green-600 text-white px-4 py-2 rounded">
           Lihat Portfolio PDF
        </a>
    @endif

    {{-- INVITE --}}
    <form method="POST" action="{{ route('umkm.invite') }}" class="mt-6">
        @csrf
        <input type="hidden" name="pelamar_id" value="{{ $user->id }}">

        <select name="project_id" class="border p-2 rounded w-full mb-3">
            @foreach(auth()->user()->projects as $project)
                <option value="{{ $project->id }}">
                    {{ $project->title }}
                </option>
            @endforeach
        </select>

        <button class="bg-blue-600 text-white px-4 py-2 rounded w-full">
            Invite ke Project
        </button>
    </form>
</div>

</div>
@endsection
