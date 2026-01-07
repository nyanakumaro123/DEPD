@extends('layouts.app')

@section('content')
<div class="bg-[#FFF7ED] min-h-screen pb-10">
@include('layouts.navbar')

<div class="max-w-6xl mx-auto bg-white rounded-xl shadow p-8 mt-6">

    {{-- HEADER --}}
    <h1 class="text-3xl font-extrabold text-[#8B4513]">
        {{ $project->title }}
    </h1>

    <p class="text-green-700 font-semibold text-lg">
        {{ $project->umkm->umkmProfile->umkm_name ?? $project->umkm->name }}
    </p>

    {{-- META --}}
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-6 text-sm text-gray-700">
        <p><b>Kategori:</b> {{ $project->category }}</p>
        <p><b>Tipe:</b> {{ ucfirst($project->employment_type) }}</p>
        <p><b>Sistem:</b> {{ ucfirst($project->work_system) }}</p>
        <p><b>Hari Kerja:</b> {{ $project->working_days }}</p>
        <p><b>Jam Kerja:</b> {{ $project->time_start }} - {{ $project->time_end }}</p>
        <p>
            <b>Gaji:</b>
            {{ $project->currency }}
            {{ number_format($project->salary_min) }}
            -
            {{ number_format($project->salary_max) }}
            / {{ str_replace('_',' ', $project->salary_frequency) }}
        </p>
        <p><b>Deadline:</b> {{ \Carbon\Carbon::parse($project->application_deadline)->format('d M Y') }}</p>
        <p>
            <b>Status:</b>
            <span class="{{ $project->status === 'open' ? 'text-green-600' : 'text-red-600' }}">
                {{ strtoupper($project->status) }}
            </span>
        </p>
    </div>

    {{-- DESKRIPSI --}}
    <div class="mt-8">
        <h3 class="text-xl font-bold text-[#8B4513]">Deskripsi Pekerjaan</h3>
        <p class="text-gray-700 leading-relaxed mt-2">
            {{ $project->description }}
        </p>
    </div>

    {{-- BENEFIT --}}
    @if($project->benefits)
    <div class="mt-6">
        <h3 class="text-xl font-bold text-[#8B4513]">Benefit</h3>
        <p class="text-gray-700 mt-2">
            {{ $project->benefits }}
        </p>
    </div>
    @endif

    {{-- ACTION --}}
    <div class="mt-8">
        @if($alreadyApplied)
            <button disabled
                class="bg-gray-300 text-gray-600 px-6 py-3 rounded-lg font-semibold">
                Sudah Melamar
            </button>
        @elseif($project->status !== 'open')
            <button disabled
                class="bg-red-200 text-red-700 px-6 py-3 rounded-lg font-semibold">
                Lowongan Ditutup
            </button>
        @else
            <form action="{{ route('apply.project', $project) }}" method="POST">
                @csrf
                <button
                    class="bg-yellow-400 hover:bg-yellow-500 px-6 py-3 rounded-lg font-bold">
                    Apply Sekarang
                </button>
            </form>
        @endif
    </div>

</div>
</div>
@endsection
