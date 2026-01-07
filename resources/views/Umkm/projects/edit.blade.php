@extends('layouts.app')

@section('content')
<div class="p-6 bg-[#FFF7ED] min-h-screen">
    @include('layouts.navbar')
    
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow mt-6">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Project</h2>

        <form action="{{ route('umkm.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Judul -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Judul Project</label>
                <input type="text" name="title" value="{{ old('title', $project->title) }}" class="w-full border rounded-lg p-2" required>
            </div>

            <!-- Kategori -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Kategori</label>
                <input type="text" name="category" value="{{ old('category', $project->category) }}" class="w-full border rounded-lg p-2" required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Deskripsi Pekerjaan</label>
                <textarea name="description" rows="4" class="w-full border rounded-lg p-2" required>{{ old('description', $project->description) }}</textarea>
            </div>

            <!-- Waktu -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Jam Mulai</label>
                    {{-- Format time agar sesuai input type time (H:i) --}}
                    <input type="time" name="time_start" value="{{ old('time_start', \Carbon\Carbon::parse($project->time_start)->format('H:i')) }}" class="w-full border rounded-lg p-2" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Jam Selesai</label>
                    <input type="time" name="time_end" value="{{ old('time_end', \Carbon\Carbon::parse($project->time_end)->format('H:i')) }}" class="w-full border rounded-lg p-2" required>
                </div>
            </div>

            <!-- Gaji -->
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Mata Uang</label>
                    <select name="currency" class="w-full border rounded-lg p-2">
                        <option value="IDR" {{ $project->currency == 'IDR' ? 'selected' : '' }}>IDR (Rp)</option>
                        <option value="USD" {{ $project->currency == 'USD' ? 'selected' : '' }}>USD ($)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Nominal Gaji</label>
                    <input type="number" name="salary_amount" value="{{ old('salary_amount', $project->salary_amount) }}" class="w-full border rounded-lg p-2" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Frekuensi</label>
                    <select name="salary_frequency" class="w-full border rounded-lg p-2">
                        <option value="total" {{ $project->salary_frequency == 'total' ? 'selected' : '' }}>Total Project</option>
                        <option value="per_hour" {{ $project->salary_frequency == 'per_hour' ? 'selected' : '' }}>Per Jam</option>
                        <option value="per_day" {{ $project->salary_frequency == 'per_day' ? 'selected' : '' }}>Per Hari</option>
                        <option value="per_week" {{ $project->salary_frequency == 'per_week' ? 'selected' : '' }}>Per Minggu</option>
                        <option value="per_month" {{ $project->salary_frequency == 'per_month' ? 'selected' : '' }}>Per Bulan</option>
                    </select>
                </div>
            </div>

            <!-- Rewards -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Benefit / Rewards</label>
                {{-- Implode array rewards menjadi string dengan baris baru --}}
                <textarea name="rewards" rows="3" class="w-full border rounded-lg p-2">{{ old('rewards', $project->rewards ? implode("\n", $project->rewards) : '') }}</textarea>
                <p class="text-xs text-gray-500 mt-1">*Pisahkan dengan baris baru (Enter)</p>
            </div>

            <!-- File Syarat -->
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">File Syarat / Panduan</label>
                @if($project->syarat_path)
                    <div class="text-sm text-blue-600 mb-2">
                        <a href="{{ asset('storage/' . $project->syarat_path) }}" target="_blank">📄 File saat ini (Klik untuk lihat)</a>
                    </div>
                @endif
                <input type="file" name="syarat_path" class="w-full border rounded-lg p-2 bg-gray-50">
                <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah file.</p>
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('umkm.projects.index') }}" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg">Batal</a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update Project</button>
            </div>
        </form>
    </div>
</div>
@endsection