@extends('layouts.app')

@section('content')
<div class="bg-[#FFF7ED] min-h-screen p-6">

@include('layouts.navbar')

{{-- FILTER TOGGLE --}}
<div class="mb-6">
    <button
        onclick="document.getElementById('filterBox').classList.toggle('hidden')"
        class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold">
        Filter Kategori
    </button>
</div>

{{-- FILTER BOX --}}
<form method="GET" id="filterBox"
      class="mb-6 bg-white p-4 rounded-xl shadow hidden">

    <h3 class="font-bold mb-3">Pilih Kategori</h3>

    @php
        $categories = [
            'Branding','Design','Marketing','Content',
            'Development','Photography','Videography',
            'Social Media','Finance'
        ];
    @endphp

    <div class="flex flex-wrap gap-3">
        @foreach($categories as $cat)
            <label class="flex items-center gap-2 text-sm">
                <input type="checkbox" name="category[]"
                       value="{{ $cat }}"
                       {{ in_array($cat, request('category', [])) ? 'checked' : '' }}>
                {{ $cat }}
            </label>
        @endforeach
    </div>

    <div class="mt-4 flex gap-3">
        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg">
            Terapkan
        </button>
        <a href="{{ route('explore.index') }}"
           class="bg-gray-200 px-4 py-2 rounded-lg">
            Reset
        </a>
    </div>
</form>

{{-- LIST PROJECT --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

@forelse($projects as $project)
<div class="bg-white p-5 rounded-xl shadow flex flex-col justify-between">

    <div class="space-y-2">
        <h3 class="text-xl font-bold text-[#8B4513]">
            {{ $project->title }}
        </h3>

        <p class="text-sm text-gray-600">
            {{ $project->umkm->umkmProfile->umkm_name ?? $project->umkm->name }}
        </p>

        <div class="text-sm text-gray-700 space-y-1">
            <p><b>Kategori:</b> {{ $project->category }}</p>
            <p><b>Jam Kerja:</b> {{ $project->time_start }} - {{ $project->time_end }}</p>
            <p>
                <b>Gaji:</b>
                {{ number_format($project->salary_amount,0,',','.') }}
                {{ $project->currency }}
                ({{ str_replace('_',' ', $project->salary_frequency) }})
            </p>
        </div>

        <p class="text-xs text-gray-500 line-clamp-3">
            {{ $project->description }}
        </p>
    </div>

    <div class="mt-4 flex justify-between items-center">
        <a href="{{ route('explore.show', $project) }}"
           class="text-blue-600 font-semibold">
            Detail
        </a>

        @if(in_array($project->id, $appliedProjectIds ?? []))
            <span class="text-green-600 font-bold text-sm">
                ✔ Sudah Melamar
            </span>
        @endif
    </div>

</div>
@empty
<p class="text-gray-500">Tidak ada proyek ditemukan</p>
@endforelse

</div>

{{-- PAGINATION --}}
<div class="mt-8">
    {{ $projects->withQueryString()->links() }}
</div>

</div>
@endsection
