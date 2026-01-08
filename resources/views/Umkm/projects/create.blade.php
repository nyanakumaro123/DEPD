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
    
    <div class="relative z-10 max-w-3xl mx-auto bg-white/10 backdrop-blur-lg p-8 rounded-xl shadow-lg shadow-blue-900/30 mt-6 border border-white/10">
        <h2 class="text-3xl font-bold mb-6 text-blue-200 font-serif">Buat Project Baru</h2>

        <form action="{{ route('umkm.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Judul -->
            <div class="mb-5">
                <label class="block text-blue-200 font-medium mb-2">Judul Project</label>
                <input type="text" name="title" value="{{ old('title') }}" class="w-full bg-white/5 border border-blue-400/50 rounded-lg p-3 text-white placeholder-blue-300/70 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" required>
                @error('title') <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Kategori -->
            <div class="mb-4">
                <label class="block text-blue-200 font-medium mb-2">Kategori</label>
                <select name="category" class="w-full border rounded-lg p-2 border-blue-400/50 placeholder-blue-300/70 focus:ring-blue-500 text-white" required>
                    <option value="" class="bg-slate-900">-- Pilih Kategori --</option>
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
                        <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }} class="bg-slate-900">
                            {{ $cat }}
                        </option>
                    @endforeach
                </select>
                @error('category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Deskripsi -->
            <div class="mb-5">
                <label class="block text-blue-200 font-medium mb-2">Deskripsi Pekerjaan</label>
                <textarea name="description" rows="4" class="w-full bg-white/5 border border-blue-400/50 rounded-lg p-3 text-white placeholder-blue-300/70 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition custom-scrollbar" required>{{ old('description') }}</textarea>
                @error('description') <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Waktu -->
            <div class="grid grid-cols-2 gap-4 mb-5">
                <div>
                    <label class="block text-blue-200 font-medium mb-2">Jam Mulai</label>
                    <input type="time" name="time_start" value="{{ old('time_start') }}" class="w-full bg-white/5 border border-blue-400/50 rounded-lg p-3 text-blue-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition custom-scrollbar [color-scheme:dark]" required>
                    @error('time_start') <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-blue-200 font-medium mb-2">Jam Selesai</label>
                    <input type="time" name="time_end" value="{{ old('time_end') }}" class="w-full bg-white/5 border border-blue-400/50 rounded-lg p-3 text-blue-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition custom-scrollbar [color-scheme:dark]" required>
                    @error('time_end') <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Gaji -->
            <div class="grid grid-cols-3 gap-4 mb-5">
                <div>
                    <label class="block text-blue-200 font-medium mb-2">Mata Uang</label>
                    <select name="currency" class="w-full bg-white/5 border border-blue-400/50 rounded-lg p-3 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition custom-scrollbar [&>option]:bg-slate-900">
                        <option value="IDR" class="bg-slate-900">IDR (Rp)</option>
                        <option value="USD" class="bg-slate-900">USD ($)</option>
                    </select>
                    @error('currency') <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-blue-200 font-medium mb-2">Nominal Gaji</label>
                    <input type="number" name="salary_amount" value="{{ old('salary_amount') }}" class="w-full bg-white/5 border border-blue-400/50 rounded-lg p-3 text-white placeholder-blue-300/70 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition custom-scrollbar" required>
                    @error('salary_amount') <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-blue-200 font-medium mb-2">Frekuensi</label>
                    <select name="salary_frequency" class="w-full bg-white/5 border border-blue-400/50 rounded-lg p-3 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition custom-scrollbar [&>option]:bg-slate-900">
                        <option value="total" class="bg-slate-900">Total Project</option>
                        <option value="per_hour" class="bg-slate-900">Per Jam</option>
                        <option value="per_day" class="bg-slate-900">Per Hari</option>
                        <option value="per_week" class="bg-slate-900">Per Minggu</option>
                        <option value="per_month" class="bg-slate-900">Per Bulan</option>
                    </select>
                    @error('salary_frequency') <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Rewards -->
            <div class="mb-5">
                <label class="block text-blue-200 font-medium mb-2">Benefit / Rewards (Opsional)</label>
                <textarea name="rewards" rows="3" class="w-full bg-white/5 border border-blue-400/50 rounded-lg p-3 text-white placeholder-blue-300/70 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition custom-scrollbar resize-none" placeholder="Tulis satu benefit per baris.&#10;Contoh:&#10;Sertifikat&#10;Uang Makan">{{ old('rewards') }}</textarea>
                <p class="text-xs text-blue-300/70 mt-1">*Pisahkan dengan baris baru (Enter)</p>
                @error('rewards') <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- File Syarat -->
            <div class="mb-7">
                <label class="block text-blue-200 font-medium mb-2">File Syarat / Panduan (Opsional)</label>
                <input type="file" name="syarat_path" class="w-full bg-white/5 border border-blue-400/50 rounded-lg p-3 text-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-500/20 file:text-blue-300 hover:file:bg-blue-500/30 transition cursor-pointer">
                @error('syarat_path') <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('umkm.projects.index') }}" class="px-6 py-3 text-blue-300 hover:text-white hover:bg-white/10 rounded-lg transition">Batal</a>
                <button type="submit" class="px-6 py-3 bg-blue-700 text-white rounded-lg hover:bg-blue-600 transition shadow-md">Simpan Project</button>
            </div>
        </form>
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

    /* Global Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }
    ::-webkit-scrollbar-track {
        background: rgba(15, 23, 42, 0.1);
    }
    ::-webkit-scrollbar-thumb {
        background: rgba(59, 130, 246, 0.2);
        border-radius: 10px;
        border: 2px solid transparent;
        background-clip: content-box;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: rgba(59, 130, 246, 0.5);
    }

    /* Custom Scrollbar Styling */
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: rgba(147, 197, 253, 0.2);
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: rgba(147, 197, 253, 0.5);
    }

    /* Style for the time picker icon */
    input[type="time"]::-webkit-calendar-picker-indicator {
        filter: invert(48%) sepia(79%) saturate(2476%) hue-rotate(190deg) brightness(118%) contrast(119%);
        cursor: pointer;
    }
</style>
@endsection