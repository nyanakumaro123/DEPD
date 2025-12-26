@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans">

    <x-navbar-umkm />

    <div class="max-w-4xl mx-auto p-6 pt-10">
        <h1 class="text-3xl font-bold text-[#355dad] font-serif mb-6 border-b pb-2">
            Buat Proyek Baru
        </h1>

        <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-xl shadow-lg space-y-8">
            @csrf

            {{-- JUDUL --}}
            <div>
                <label class="text-lg font-bold text-[#355dad] block mb-2">Judul Proyek</label>
                <input type="text" name="title" required class="w-full border-2 border-gray-300 rounded-lg p-3 focus:border-[#355dad] outline-none">
            </div>

            {{-- KATEGORI --}}
            <div>
                <label class="text-lg font-bold text-[#355dad] block mb-3">Kategori</label>
                <div class="flex flex-wrap gap-3 items-center">
                    @php
                        $categories = ['Branding','Design','Marketing','Content','Development','Photography','Videography','Social Media','Finance'];
                    @endphp

                    @foreach($categories as $category)
                        <div class="flex">
                            <input type="checkbox" id="cat-{{ $category }}" name="category[]" value="{{ $category }}" class="hidden peer">
                            <label for="cat-{{ $category }}" class="min-w-[100px] text-center px-4 py-2 rounded-full cursor-pointer bg-yellow-100 text-yellow-800 border border-yellow-300 font-medium transition hover:bg-yellow-200 peer-checked:bg-[#355dad] peer-checked:text-white peer-checked:border-[#355dad]">
                                {{ $category }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- FILE UPLOAD (Disatukan agar sesuai DB) --}}
            <div>
                <label class="font-bold text-[#355dad] block mb-2">Dokumen Pendukung / Syarat (PDF/ZIP)</label>
                <input type="file" name="syarat_file" class="w-full border-2 border-gray-300 rounded-lg p-2 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                <p class="text-sm text-gray-500 mt-1">*Opsional: Upload detail brief atau syarat khusus.</p>
            </div>

            {{-- DURASI --}}
            <div>
                <label class="font-bold text-[#355dad]">Jam Kerja (Durasi)</label>
                <div class="flex gap-4 mt-2">
                    <div class="w-1/2">
                        <span class="text-sm text-gray-500">Mulai</span>
                        <input type="time" name="time_start" required class="w-full border-2 rounded-lg p-2">
                    </div>
                    <div class="w-1/2">
                        <span class="text-sm text-gray-500">Selesai</span>
                        <input type="time" name="time_end" required class="w-full border-2 rounded-lg p-2">
                    </div>
                </div>
            </div>

            {{-- GAJI --}}
            <div class="bg-[#e0e7ff] p-5 rounded-xl border border-blue-200">
                <h3 class="font-bold text-[#355dad] mb-3">Pengaturan Gaji / Reward</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <input type="number" name="salary_amount" placeholder="Nominal (Contoh: 1000000)" required class="border-2 rounded-lg p-2 w-full">
                    
                    <select name="salary_frequency" class="border-2 rounded-lg p-2 w-full">
                        <option value="total">Total Project</option>
                        <option value="per_day">Per Hari</option>
                        <option value="per_hour">Per Jam</option>
                    </select>

                    <select name="currency" class="border-2 rounded-lg p-2 w-full">
                        <option value="IDR">IDR (Rp)</option>
                        <option value="USD">USD ($)</option>
                    </select>
                </div>
            </div>

            {{-- DESKRIPSI --}}
            <div>
                <label class="font-bold text-[#355dad]">Deskripsi Lengkap</label>
                <textarea name="description" rows="5" required class="w-full border-2 rounded-lg p-3 focus:border-[#355dad] outline-none"></textarea>
            </div>

            {{-- SUBMIT --}}
            <button type="submit" class="w-full bg-[#355dad] text-white text-xl font-bold p-4 rounded-xl hover:bg-[#2a4a8b] transition shadow-md">
                Terbitkan Proyek
            </button>
        </form>
    </div>
</div>
@endsection