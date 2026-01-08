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

    <div class="relative z-10 max-w-4xl mx-auto p-6 pt-10">
        <!-- Page Title -->
        <h2 class="text-5xl font-bold text-white mb-10 font-serif">
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-white text-4xl md:text-5xl">Apply Project</span>
        </h2>

        <!-- Form Container -->
        <div class="bg-white/10 backdrop-blur-lg border border-white/10 rounded-3xl p-8 shadow-2xl">
            <h3 class="text-2xl font-bold text-blue-100 mb-6 italic">"Judul Proyek"</h3>

            <!-- Pitch Label -->
            <label for="pitch" class="block text-blue-200 text-sm font-semibold mb-3 ml-1">
                Pitch / Deskripsi Diri:
            </label>

            <!-- Pitch Textarea -->
            <textarea
                id="pitch"
                rows="6"
                placeholder="Jelaskan mengapa Anda adalah kandidat terbaik untuk proyek ini..."
                class="w-full bg-white/5 backdrop-blur-lg border border-white/10 text-white font-medium text-lg p-4 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-400 placeholder-blue-200/30 transition duration-300"
            ></textarea>

            <!-- Portfolio Upload Section -->
            <div class="mt-8 p-6 bg-black/20 rounded-2xl border border-white/5">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div>
                        <p class="text-blue-100 font-bold text-lg">Portofolio</p>
                        <p class="text-sm text-blue-300/60 mt-1">
                            Anda belum mengunggah portofolio terbaru.
                        </p>
                    </div>

                    <label class="cursor-pointer bg-white/10 hover:bg-white/20 text-white font-bold py-2.5 px-6 rounded-xl border border-white/20 transition duration-300 transform hover:scale-105 text-sm">
                        Upload PDF
                        <input type="file" class="hidden" accept=".pdf">
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
            <button
                class="w-full mt-10 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-bold py-4 rounded-2xl transition duration-300 shadow-lg shadow-blue-900/30 transform hover:scale-[1.02] active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none"
                disabled
            >
                Kirim Lamaran
            </button>
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
    .animate-blob {
        animation: blob 7s infinite;
    }
    .animation-delay-2000 {
        animation-delay: 2s;
    }
    .animation-delay-4000 {
        animation-delay: 4s;
    }
    textarea::-webkit-scrollbar {
        width: 8px;
    }
    textarea::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
    }
</style>
@endsection
