@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 overflow-hidden relative font-sans pb-20">
    <!-- Decorative background elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-0 -right-4 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>

    {{-- NAVBAR --}}
    @include('layouts.navbar')

    {{-- CONTENT --}}
    <div class="relative z-10 max-w-5xl mx-auto p-6 pt-10">
        <h2 class="text-5xl font-bold text-white mb-10 font-serif">
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-white">Buat Proyek Baru</span>
        </h2>

        <div class="bg-white/10 backdrop-blur-lg border border-white/10 rounded-3xl shadow-2xl p-8 lg:p-12">
            <form action="{{ route('project.store.umkm') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                @csrf

                {{-- JUDUL --}}
                <div class="space-y-3">
                    <label class="block text-blue-200 font-bold text-sm uppercase tracking-widest">Judul Proyek</label>
                    <input type="text" name="title"
                           class="w-full bg-white/5 text-white font-semibold text-lg py-4 px-5 rounded-2xl border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white/10 transition">
                </div>

                {{-- KATEGORI --}}
                <div class="space-y-4">
                    <label class="block text-blue-200 font-bold text-sm uppercase tracking-widest">
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
                                        px-5 py-2.5
                                        rounded-full cursor-pointer
                                        bg-white/5 text-blue-200
                                        border border-white/10
                                        font-bold text-sm transition
                                        hover:bg-white/10
                                        peer-checked:bg-blue-600
                                        peer-checked:text-white
                                        peer-checked:border-blue-500
                                        leading-none shadow-lg"
                                >
                                    {{ $category }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- PORTOFOLIO & CV --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="space-y-3">
                        <label class="block text-blue-200 font-bold text-sm uppercase tracking-widest">Portofolio (Opsional)</label>
                        <input type="file" name="portofolio_file"
                               class="w-full bg-white/5 text-blue-100 border border-white/10 rounded-2xl p-3 file:mr-4 file:py-2 file:px-6 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-blue-600 file:text-white hover:file:bg-blue-500 transition cursor-pointer">
                    </div>

                    <div class="space-y-3">
                        <label class="block text-blue-200 font-bold text-sm uppercase tracking-widest">CV / Resume</label>
                        <input type="file" name="cv_file"
                               class="w-full bg-white/5 text-blue-100 border border-white/10 rounded-2xl p-3 file:mr-4 file:py-2 file:px-6 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-blue-600 file:text-white hover:file:bg-blue-500 transition cursor-pointer">
                    </div>
                </div>

                {{-- DURASI --}}
                <div class="space-y-3">
                    <label class="block text-blue-200 font-bold text-sm uppercase tracking-widest">Durasi Pengerjaan</label>
                    <div class="flex gap-4">
                        <input type="time" name="time_start" class="w-1/2 bg-white/5 text-white font-semibold py-4 px-5 rounded-2xl border border-white/10 focus:ring-2 focus:ring-blue-500 transition">
                        <input type="time" name="time_end" class="w-1/2 bg-white/5 text-white font-semibold py-4 px-5 rounded-2xl border border-white/10 focus:ring-2 focus:ring-blue-500 transition">
                    </div>
                </div>

                {{-- GAJI --}}
                <div class="bg-white/5 border border-white/10 p-8 rounded-3xl space-y-6">
                    <h3 class="text-blue-200 font-bold text-sm uppercase tracking-widest">Pengaturan Gaji</h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <input type="number" name="salary_amount" placeholder="Besaran"
                               class="bg-white/5 text-white font-semibold py-4 px-5 rounded-2xl border border-white/10 focus:ring-2 focus:ring-blue-500 transition">

                        <select name="salary_frequency" class="bg-slate-800 text-white font-semibold py-4 px-5 rounded-2xl border border-white/10 focus:ring-2 focus:ring-blue-500 transition">
                            <option value="per_hour">Per Jam</option>
                            <option value="per_day">Per Hari</option>
                            <option value="total">Total</option>
                        </select>

                        <select name="currency" class="bg-slate-800 text-white font-semibold py-4 px-5 rounded-2xl border border-white/10 focus:ring-2 focus:ring-blue-500 transition">
                            <option value="IDR">IDR</option>
                            <option value="USD">USD</option>
                            <option value="MYR">MYR</option>
                        </select>
                    </div>
                </div>

                {{-- DESKRIPSI --}}
                <div class="space-y-3">
                    <label class="block text-blue-200 font-bold text-sm uppercase tracking-widest">Deskripsi Proyek</label>
                    <textarea name="description" rows="6"
                              class="w-full bg-white/5 text-white font-medium text-lg py-4 px-5 rounded-2xl border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white/10 transition resize-none leading-relaxed"></textarea>
                </div>

                {{-- SUBMIT --}}
                <div class="pt-8 border-t border-white/10">
                    <button type="submit"
                            class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-bold text-xl py-5 rounded-2xl shadow-xl shadow-blue-900/40 transition transform hover:scale-[1.02] active:scale-[0.98]">
                        Buat Proyek
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    .animate-blob { animation: blob 7s infinite; }
    .animation-delay-2000 { animation-delay: 2s; }
    .animation-delay-4000 { animation-delay: 4s; }
</style>
@endsection
