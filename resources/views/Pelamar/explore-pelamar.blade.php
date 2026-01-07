@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 overflow-hidden relative font-sans pb-20">
    <!-- Decorative background elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-0 -right-4 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>

@include('layouts.navbar')

<div class="relative z-10 max-w-7xl mx-auto p-6 pt-10">
{{-- FILTER TOGGLE --}}
<div class="mb-6">
    <button
        onclick="document.getElementById('filterBox').classList.toggle('hidden')"
        class="bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-bold py-2.5 px-6 rounded-xl transition duration-300 shadow-lg shadow-blue-900/30 transform hover:scale-105 inline-block tracking-wide">
        Filter Kategori
    </button>
</div>

{{-- FILTER BOX --}}
<form method="GET" id="filterBox"
      class="mb-6 bg-white/10 backdrop-blur-lg border border-white/20 p-4 rounded-xl shadow-lg hidden">

    <h3 class="font-bold mb-3 text-white">Pilih Kategori</h3>

    @php
        $categories = [
            'Branding','Design','Marketing','Content',
            'Development','Photography','Videography',
            'Social Media','Finance'
        ];
    @endphp

    <div class="flex flex-wrap gap-3">
        @foreach($categories as $cat)
            <label class="flex items-center gap-2 text-sm text-blue-200">
                <input type="checkbox" name="category[]"
                       value="{{ $cat }}"
                       {{ in_array($cat, request('category', [])) ? 'checked' : '' }} class="form-checkbox text-blue-500 bg-gray-700 border-gray-600 rounded focus:ring-blue-500">
                {{ $cat }}
            </label>
        @endforeach
    </div>

    <div class="mt-4 flex gap-3">
        <button class="bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-bold py-2 px-5 rounded-xl transition duration-300 shadow-lg shadow-blue-900/30 transform hover:scale-105">
            Terapkan
        </button>
        <a href="{{ route('explore.index') }}"
           class="bg-gray-700 hover:bg-gray-600 text-white px-5 py-2 rounded-xl transition duration-300 shadow-lg shadow-gray-900/30 transform hover:scale-105">
            Reset
        </a>
    </div>
</form>

{{-- LIST PROJECT --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

@forelse($projects as $project)
<div class="bg-white/10 backdrop-blur-lg border border-white/20 p-5 rounded-xl shadow-lg flex flex-col justify-between">

    <div class="space-y-2">
        <h3 class="text-xl font-bold text-white">
            {{ $project->title }}
        </h3>

        <p class="text-sm text-blue-200">
            {{ $project->umkm->umkmProfile->umkm_name ?? $project->umkm->name }}
        </p>

        <div class="text-sm text-blue-100 space-y-1">
            <p><b>Kategori:</b> {{ $project->category }}</p>
            <p><b>Jam Kerja:</b> {{ $project->time_start }} - {{ $project->time_end }}</p>
            <p>
                <b>Gaji:</b>
                {{ number_format($project->salary_amount,0,',','.') }}
                {{ $project->currency }}
                ({{ str_replace('_',' ', $project->salary_frequency) }})
            </p>
        </div>

        <p class="text-xs text-blue-200 line-clamp-3">
            {{ $project->description }}
        </p>
    </div>

    <div class="mt-4 flex justify-between items-center">
        <a href="{{ route('explore.show', $project) }}"
           class="text-blue-400 hover:text-blue-300 font-semibold transition-colors">
            Detail
        </a>

        @if(in_array($project->id, $appliedProjectIds ?? []))
            <span class="text-green-400 font-bold text-sm">
                ✔ Sudah Melamar
            </span>
        @endif
    </div>

</div>
@empty
<p class="text-gray-400 text-lg">Tidak ada proyek ditemukan</p>
@endforelse

</div>

{{-- PAGINATION --}}
<div class="mt-8">
    {{ $projects->withQueryString()->links('pagination::tailwind') }}
</div>

</div>

<style>
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    .animate-blob {
        animation: blob 7s infinite;
    }
    .animation-delay-2000 {
        animation-delay: 2s;
    }
    .animation-delay-4000 {
        animation-delay: 4s;
    }
</style>
@endsection
