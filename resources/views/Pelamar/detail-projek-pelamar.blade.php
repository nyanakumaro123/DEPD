@extends('layouts.app')

@section('content')
    <div
        class="min-h-screen w-full bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 overflow-hidden relative font-sans pb-20">
        <!-- Decorative background elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
            <div
                class="absolute -top-24 -left-24 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob">
            </div>
            <div
                class="absolute top-0 -right-4 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000">
            </div>
            <div
                class="absolute -bottom-8 left-20 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000">
            </div>
        </div>

        @include('layouts.navbar')

        <div class="relative z-10 max-w-4xl mx-auto px-6 mt-10">
            {{-- BACK BUTTON --}}
            <div class="mb-6">
                <a href="javascript:history.back()"
                    class="text-blue-400 hover:text-blue-200 transition flex items-center gap-2 text-sm font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>

            <div class="bg-white/10 backdrop-blur-lg rounded-3xl shadow-2xl border border-white/10 overflow-hidden">
                {{-- HEADER SECTION --}}
                <div class="p-8 md:p-10 border-b border-white/10 bg-white/5">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                        <div>
                            <span
                                class="px-3 py-1 bg-blue-500/20 text-blue-300 text-xs font-bold rounded-full border border-blue-500/30 uppercase tracking-wider">
                                {{ $project->category }}
                            </span>
                            <h1 class="text-4xl font-bold text-white mt-3 font-serif leading-tight">
                                {{ $project->title }}
                            </h1>
                            <p class="text-blue-400 font-semibold text-xl mt-2 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                {{ $project->umkm->umkmProfile->umkm_name ?? $project->umkm->name }}
                            </p>
                        </div>
                        <div class="text-right">
                            <div
                                class="inline-block bg-white/5 rounded-2xl p-4 border border-white/10 text-center min-w-[140px]">
                                <p class="text-blue-300/70 text-xs uppercase font-bold tracking-widest">Tanggal Dibuat</p>
                                <p class="text-white text-lg font-bold mt-1">
                                    {{ \Carbon\Carbon::parse($project->created_at)->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-8 md:p-10">
                    {{-- META INFORMATION GRID --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                        {{-- WORK SCHEDULE --}}
                        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-5 border border-white/10">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="p-2 bg-blue-500/20 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <h3 class="text-blue-200 font-bold">Jadwal Kerja</h3>
                            </div>
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span class="text-blue-300/70">Mulai</span>
                                    <span class="text-white font-medium">{{ substr($project->time_start, 0, 5) }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-blue-300/70">Selesai</span>
                                    <span class="text-white font-medium">{{ substr($project->time_end, 0, 5) }}</span>
                                </div>
                                @if ($project->working_days)
                                    <div class="flex justify-between">
                                        <span class="text-blue-300/70">Hari Kerja</span>
                                        <span class="text-white font-medium">{{ $project->working_days }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- SALARY INFORMATION --}}
                        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-5 border border-white/10">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="p-2 bg-green-500/20 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <h3 class="text-blue-200 font-bold">Informasi Gaji</h3>
                            </div>
                            <div class="space-y-2">
                                <div class="flex justify-between items-center">
                                    <span class="text-blue-300/70">Mata Uang</span>
                                    <span class="text-white font-medium px-2 py-1 bg-white/10 rounded text-sm">
                                        {{ $project->currency == 'IDR' ? 'IDR (Rp)' : 'USD ($)' }}
                                    </span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-blue-300/70">Nominal</span>
                                    <span class="text-white font-bold">
                                        {{ $project->currency == 'IDR' ? 'Rp' : '$' }}
                                        {{ number_format($project->salary_amount, 0, ',', '.') }}
                                    </span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-blue-300/70">Frekuensi</span>
                                    <span class="text-white font-medium">
                                        @php
                                            $frequencyMap = [
                                                'total' => 'Total Project',
                                                'per_hour' => 'Per Jam',
                                                'per_day' => 'Per Hari',
                                                'per_week' => 'Per Minggu',
                                                'per_month' => 'Per Bulan',
                                            ];
                                        @endphp
                                        {{ $frequencyMap[$project->salary_frequency] ?? $project->salary_frequency }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- PROJECT STATUS --}}
                        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-5 border border-white/10">
                            <div class="flex items-center gap-3 mb-4">
                                <div
                                    class="p-2 {{ $project->status == 'open' ? 'bg-green-500/20' : 'bg-red-500/20' }} rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 {{ $project->status == 'open' ? 'text-green-400' : 'text-red-400' }}"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <h3 class="text-blue-200 font-bold">Status Project</h3>
                            </div>
                            <div class="text-center">
                                <span
                                    class="px-4 py-2 rounded-lg {{ $project->status == 'open' ? 'bg-green-500/20 text-green-400 border border-green-500/30' : 'bg-red-500/20 text-red-400 border border-red-500/30' }} font-bold text-sm tracking-widest">
                                    {{ strtoupper($project->status == 'open' ? 'TERBUKA' : 'TERTUTUP') }}
                                </span>
                                @if ($project->application_deadline)
                                    <p class="text-blue-300/70 text-sm mt-3">
                                        Deadline:
                                        {{ \Carbon\Carbon::parse($project->application_deadline)->format('d M Y') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- MAIN CONTENT SECTIONS --}}
                    <div class="space-y-8">
                        {{-- PROJECT DESCRIPTION --}}
                        <section class="bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10">
                            <h3 class="text-xl font-bold text-blue-200 flex items-center gap-3 mb-4">
                                <span class="w-8 h-1 bg-blue-500 rounded-full"></span>
                                Deskripsi Pekerjaan
                            </h3>
                            <div class="text-blue-100/80 leading-relaxed">
                                {!! nl2br(e($project->description)) !!}
                            </div>
                        </section>

                        {{-- REWARDS/BENEFITS --}}
                        @if ($project->rewards && !empty($project->rewards))
                            <section class="bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10">
                                <h3 class="text-xl font-bold text-blue-200 flex items-center gap-3 mb-4">
                                    <span class="w-8 h-1 bg-indigo-500 rounded-full"></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                    Benefit / Rewards
                                </h3>
                                <div class="space-y-3">
                                    @php
                                        // Check if rewards is already an array
                                        if (is_array($project->rewards)) {
                                            $rewards = $project->rewards;
                                        } else {
                                            // If it's a string, explode it
                                            $rewards = explode("\n", (string) $project->rewards);
                                        }
                                        // Filter out empty values
                                        $rewards = array_filter($rewards, function ($item) {
                                            return !empty(trim($item));
                                        });
                                    @endphp

                                    @if (count($rewards) > 0)
                                        @foreach ($rewards as $reward)
                                            @if (trim($reward))
                                                <div class="flex items-start gap-3 p-3 bg-white/5 rounded-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5 text-green-400 mt-0.5 flex-shrink-0" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    <span class="text-blue-100/80">{{ trim($reward) }}</span>
                                                </div>
                                            @endif
                                        @endforeach
                                    @else
                                        <p class="text-blue-300/70 text-sm italic">Tidak ada benefit yang ditambahkan</p>
                                    @endif
                                </div>
                            </section>
                        @endif

                        {{-- REQUIREMENT FILE --}}
                        @if ($project->syarat_path)
                            <section class="bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10">
                                <h3 class="text-xl font-bold text-blue-200 flex items-center gap-3 mb-4">
                                    <span class="w-8 h-1 bg-purple-500 rounded-full"></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    File Syarat / Panduan
                                </h3>
                                <div class="flex items-center gap-4 p-4 bg-white/5 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                    <div class="flex-1">
                                        <p class="text-white font-medium">Syarat Project</p>
                                        <p class="text-blue-300/70 text-sm">File panduan dan persyaratan</p>
                                    </div>
                                    <a href="{{ asset('storage/' . $project->syarat_path) }}" target="_blank"
                                        class="px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white rounded-lg transition flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Download
                                    </a>
                                </div>
                            </section>
                        @endif

                        {{-- ADDITIONAL INFORMATION --}}
                        <section class="bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10">
                            <h3 class="text-xl font-bold text-blue-200 flex items-center gap-3 mb-4">
                                <span class="w-8 h-1 bg-amber-500 rounded-full"></span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Informasi Tambahan
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="p-3 bg-white/5 rounded-lg">
                                    <p class="text-blue-300/70 text-sm">Kategori</p>
                                    <p class="text-white font-medium">{{ $project->category }}</p>
                                </div>
                                <div class="p-3 bg-white/5 rounded-lg">
                                    <p class="text-blue-300/70 text-sm">Tipe Pekerjaan</p>
                                    <p class="text-white font-medium">{{ $project->employment_type ?? 'Full-time' }}</p>
                                </div>
                                <div class="p-3 bg-white/5 rounded-lg">
                                    <p class="text-blue-300/70 text-sm">Sistem Kerja</p>
                                    <p class="text-white font-medium">{{ $project->work_system ?? 'On-site' }}</p>
                                </div>
                                <div class="p-3 bg-white/5 rounded-lg">
                                    <p class="text-blue-300/70 text-sm">Lokasi</p>
                                    <p class="text-white font-medium">{{ $project->location ?? 'Remote' }}</p>
                                </div>
                            </div>
                        </section>
                    </div>

                    {{-- ACTION BUTTONS --}}
                    <div class="mt-12 pt-8 border-t border-white/10">
                        @if ($alreadyApplied)
                            <div
                                class="flex items-center justify-center gap-3 bg-white/5 text-blue-300/50 py-5 rounded-2xl border border-white/10 font-bold text-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Anda Sudah Melamar Project Ini
                            </div>
                        @elseif($project->status !== 'open')
                            <div
                                class="flex items-center justify-center gap-3 bg-red-500/10 text-red-400 py-5 rounded-2xl border border-red-500/20 font-bold text-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Lowongan Sudah Ditutup
                            </div>
                        @else
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <a href="{{ route('umkm.projects.index') }}"
                                    class="px-6 py-4 text-center bg-white/10 hover:bg-white/20 text-white rounded-2xl transition border border-white/10 font-bold flex items-center justify-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                    </svg>
                                    Lihat Project Lain
                                </a>
                                <form action="{{ route('apply.project', $project) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white py-4 rounded-2xl font-bold text-xl transition-all shadow-xl shadow-blue-900/40 flex items-center justify-center gap-3 group">
                                        Lamar Sekarang
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 group-hover:translate-x-2 transition-transform" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
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
