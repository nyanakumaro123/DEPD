@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="p-6 bg-[#FFF7ED] min-h-screen">

{{-- FILTER --}}
<form method="GET" class="bg-white p-4 rounded-xl shadow mb-6">
    <select name="major_id" class="border p-2 rounded">
        <option value="">Semua Major</option>
        @foreach($majors as $major)
            <option value="{{ $major->id }}"
                {{ request('major_id') == $major->id ? 'selected' : '' }}>
                {{ $major->name }}
            </option>
        @endforeach
    </select>

    <button class="ml-2 bg-blue-600 text-white px-4 py-2 rounded">
        Filter
    </button>
</form>

{{-- LIST --}}
<div class="grid md:grid-cols-2 gap-6">
@foreach($pelamars as $pelamar)
    <div class="bg-white p-4 rounded-xl shadow">
        <h3 class="font-bold text-lg">{{ $pelamar->name }}</h3>
        <p class="text-sm text-gray-600">
            {{ $pelamar->pelamarProfile->major->name ?? '-' }}
        </p>

        <a href="{{ route('umkm.pelamar.show', $pelamar) }}"
           class="text-blue-600 font-semibold mt-3 inline-block">
           Lihat Detail
        </a>
    </div>
@endforeach
</div>

<div class="mt-6">
    {{ $pelamars->withQueryString()->links() }}
</div>

</div>
@endsection
