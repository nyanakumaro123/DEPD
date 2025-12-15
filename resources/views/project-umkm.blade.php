@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans">

    {{-- NAVBAR --}}
    <x-navbar-umkm />

    {{-- CONTENT --}}
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-3xl font-bold text-[#355dad] font-serif mb-6 border-b pb-2">
            Buat Proyek Baru
        </h1>

        <form action="{{ route('project.store.umkm') }}" method="POST" enctype="multipart/form-data"
              class="bg-white p-8 rounded-xl shadow-lg space-y-8">
            @csrf

            {{-- JUDUL --}}
            <div>
                <label class="text-lg font-bold text-[#355dad] block mb-2">Judul</label>
                <input type="text" name="title"
                       class="w-full border-2 border-gray-300 rounded-lg p-3">
            </div>

            {{-- KATEGORI --}}
            <div>
                <label class="text-lg font-bold text-[#355dad] block mb-3">
                    Kategori
                </label>

                <div class="flex flex-wrap gap-3 items-center">
                    @php
                        $categories = [
                            'Branding','Design','Marketing','Content',
                            'Development','Photography','Videography',
                            'Social Media','Finance'
                        ];
                    @endphp

                    @foreach($categories as $category)
                        <div class="flex">
                            <input
                                type="checkbox"
                                id="cat-{{ $category }}"
                                name="category[]"
                                value="{{ $category }}"
                                class="hidden peer"
                            >

                            <label
                                for="cat-{{ $category }}"
                                class="min-w-[120px] text-center
                                    px-5 py-2
                                    rounded-full cursor-pointer
                                    bg-yellow-400 text-[#355dad]
                                    border-2 border-[#355dad]
                                    font-medium transition
                                    hover:bg-yellow-300
                                    peer-checked:bg-[#355dad]
                                    peer-checked:text-white
                                    leading-none"
                            >
                                {{ $category }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- PORTOFOLIO & CV --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label class="font-bold text-[#355dad]">Portofolio</label>
                    <input type="file" name="portofolio_file"
                           class="w-full mt-2 border-2 border-gray-300 rounded-lg p-2">
                </div>

                <div>
                    <label class="font-bold text-[#355dad]">CV</label>
                    <input type="file" name="cv_file"
                           class="w-full mt-2 border-2 border-gray-300 rounded-lg p-2">
                </div>
            </div>

            {{-- DURASI --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label class="font-bold text-[#355dad]">Durasi</label>
                    <div class="flex gap-2 mt-2">
                        <input type="time" name="time_start" class="border-2 rounded-lg p-2 w-1/2">
                        <input type="time" name="time_end" class="border-2 rounded-lg p-2 w-1/2">
                    </div>
                </div>
            </div>

            {{-- GAJI --}}
            <div class="bg-[#e0e7ff] p-4 rounded-xl">
                <h3 class="font-bold text-[#355dad] mb-3">Pengaturan Gaji</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <input type="number" name="salary_amount" placeholder="Besaran"
                           class="border-2 rounded-lg p-2">

                    <select name="salary_frequency" class="border-2 rounded-lg p-2">
                        <option value="per_hour">Per Jam</option>
                        <option value="per_day">Per Hari</option>
                        <option value="total">Total</option>
                    </select>

                    <select name="currency" class="border-2 rounded-lg p-2">
                        <option value="IDR">IDR</option>
                        <option value="USD">USD</option>
                        <option value="MYR">MYR</option>
                    </select>
                </div>
            </div>

            {{-- DESKRIPSI --}}
            <div>
                <label class="font-bold text-[#355dad]">Deskripsi</label>
                <textarea name="description" rows="4"
                          class="w-full border-2 rounded-lg p-3"></textarea>
            </div>

            {{-- SUBMIT --}}
            <button type="submit"
                    class="w-full bg-[#355dad] text-white text-xl font-bold
                           p-4 rounded-xl hover:bg-[#2a4a8b] transition">
                Buat
            </button>
        </form>
    </div>
</div>
@endsection
