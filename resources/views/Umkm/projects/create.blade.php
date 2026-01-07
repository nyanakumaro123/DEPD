@extends('layouts.app')

@section('content')
<div class="p-6 bg-[#FFF7ED] min-h-screen">
    @include('layouts.navbar')
    
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow mt-6">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Buat Project Baru</h2>

        <form action="{{ route('umkm.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Judul -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Judul Project</label>
                <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200" required>
                @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Kategori -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Kategori</label>
                <select name="category" class="w-full border rounded-lg p-2" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ([
                        'Branding',
                        'Design',
                        'Marketing',
                        'Content',
                        'Development',
                        'Photography',
                        'Videography',
                        'Social Media',
                        'Finance'
                    ] as $cat)
                        <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                    @endforeach
                </select>
                @error('category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Deskripsi Pekerjaan</label>
                <textarea name="description" rows="4" class="w-full border rounded-lg p-2" required>{{ old('description') }}</textarea>
                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Waktu -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Jam Mulai</label>
                    <input type="time" name="time_start" value="{{ old('time_start') }}" class="w-full border rounded-lg p-2" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Jam Selesai</label>
                    <input type="time" name="time_end" value="{{ old('time_end') }}" class="w-full border rounded-lg p-2" required>
                </div>
            </div>

            <!-- Gaji -->
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Mata Uang</label>
                    <select name="currency" class="w-full border rounded-lg p-2">
                        <option value="IDR">IDR (Rp)</option>
                        <option value="USD">USD ($)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Nominal Gaji</label>
                    <input type="number" name="salary_amount" value="{{ old('salary_amount') }}" class="w-full border rounded-lg p-2" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Frekuensi</label>
                    <select name="salary_frequency" class="w-full border rounded-lg p-2">
                        <option value="total">Total Project</option>
                        <option value="per_hour">Per Jam</option>
                        <option value="per_day">Per Hari</option>
                        <option value="per_week">Per Minggu</option>
                        <option value="per_month">Per Bulan</option>
                    </select>
                </div>
            </div>

            <!-- Rewards -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Benefit / Rewards (Opsional)</label>
                <textarea name="rewards" rows="3" class="w-full border rounded-lg p-2" placeholder="Tulis satu benefit per baris.&#10;Contoh:&#10;Sertifikat&#10;Uang Makan">{{ old('rewards') }}</textarea>
                <p class="text-xs text-gray-500 mt-1">*Pisahkan dengan baris baru (Enter)</p>
            </div>

            <!-- File Syarat -->
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">File Syarat / Panduan (Opsional)</label>
                <input type="file" name="syarat_path" class="w-full border rounded-lg p-2 bg-gray-50">
                @error('syarat_path') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('umkm.projects.index') }}" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg">Batal</a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan Project</button>
            </div>
        </form>
    </div>
</div>
@endsection