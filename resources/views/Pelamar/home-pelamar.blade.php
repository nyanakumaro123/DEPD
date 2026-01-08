@extends('layouts.app')

@section('content')
    <div
        class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 font-sans text-white relative overflow-x-hidden">

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

        <div class="relative z-10 max-w-7xl mx-auto p-4 md:p-6 grid grid-cols-1 lg:grid-cols-12 gap-6">

            {{-- SIDEBAR: APPLY STATUS --}}
            <div class="lg:col-span-4 space-y-4">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-bold text-blue-200">Status Lamaran</h2>
                    @if ($applications->count() > 0)
                        <a href="{{ route('pelamar.applications') }}"
                            class="text-xs text-gray-400 hover:text-yellow-400 transition">
                            Lihat semua
                        </a>
                    @endif
                </div>

                <div class="space-y-2">
                    @forelse($applications as $app)
                        <div
                            class="bg-white/5 backdrop-blur-md border border-white/10 rounded-lg p-2.5 flex justify-between items-center hover:bg-white/10 transition duration-200">
                            <div class="flex items-center gap-2.5 overflow-hidden">
                                {{-- Foto Profil UMKM --}}
                                @if ($app->project->umkm->umkmProfile && $app->project->umkm->umkmProfile->profile_photo)
                                    <img src="{{ asset('storage/' . $app->project->umkm->umkmProfile->profile_photo) }}"
                                        alt="UMKM Photo"
                                        class="h-8 w-8 rounded-full object-cover border border-white/20 flex-shrink-0">
                                @else
                                    <div
                                        class="h-8 w-8 rounded-full bg-blue-500/80 flex items-center justify-center border border-white/20 flex-shrink-0">
                                        @php
                                            $umkmName = $app->project->umkm->umkmProfile->umkm_name ?? $app->project->umkm->name;
                                            $initials = substr($umkmName, 0, 2);
                                        @endphp
                                        <span class="font-bold text-xs">{{ $initials }}</span>
                                    </div>
                                @endif

                                <div class="flex flex-col truncate">
                                    <span class="font-medium text-white text-xs truncate">{{ $app->project->title }}</span>
                                    <span class="text-[10px] text-blue-300/70 truncate">
                                        {{ $app->project->umkm->umkmProfile->umkm_name ?? $app->project->umkm->name }}
                                    </span>
                                </div>
                            </div>

                            {{-- Badge Status --}}
                            @php
                                $statusColor = match ($app->status) {
                                    'accepted' => 'bg-green-500/20 text-green-300 border-green-500/30',
                                    'rejected' => 'bg-red-500/20 text-red-300 border-red-500/30',
                                    default => 'bg-blue-500/20 text-blue-300 border-blue-500/30',
                                };
                            @endphp
                            <span class="{{ $statusColor }} border px-1.5 py-0.5 rounded-full text-[10px] font-semibold capitalize">
                                {{ $app->status }}
                            </span>
                        </div>
                    @empty
                        <div class="text-gray-400 text-xs italic bg-white/5 p-3 rounded-lg border border-white/10">
                            Belum ada lamaran yang dikirim.
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- MAIN CONTENT: COMPACT PROJECT FEED WITH SAME IMAGE STRUCTURE --}}
            <div class="lg:col-span-8 space-y-4">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-bold text-blue-200">Project Terbaru</h2>
                    <a href="{{ route('explore.index') }}"
                        class="text-xs text-blue-300 hover:text-white transition flex items-center gap-1">
                        Explore Lebih Banyak
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3">
                            <path fill-rule="evenodd"
                                d="M16.28 11.47a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 011.06-1.06l7.5 7.5z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>

                <div class="space-y-3">
                    @forelse($projects as $project)
                        @php
                            // EXACT SAME IMAGE LOGIC AS BEFORE
                            $businessImages = [
                                // Office Spaces
                                'https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=300&h=200&fit=crop&crop=center',
                                'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=300&h=200&fit=crop&crop=center',
                                'https://images.unsplash.com/photo-1497366216548-37526070297c?w=300&h=200&fit=crop&crop=center',
                                
                                // Workspaces
                                'https://images.unsplash.com/photo-1552664730-d307ca884978?w=300&h=200&fit=crop&crop=center',
                                'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=300&h=200&fit=crop&crop=center',
                                'https://images.unsplash.com/photo-1541746972996-4e0b0f43e02a?w=300&h=200&fit=crop&crop=center',
                                
                                // Business Meetings
                                'https://images.unsplash.com/photo-1513475382585-d06e58bcb0e0?w=300&h=200&fit=crop&crop=center',
                                'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=300&h=200&fit=crop&crop=center',
                                'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=300&h=200&fit=crop&crop=center',
                                
                                // Modern Office
                                'https://images.unsplash.com/photo-1497215728101-856f4ea42174?w=300&h=200&fit=crop&crop=center',
                                'https://images.unsplash.com/photo-1559136555-9303baea8ebd?w=300&h=200&fit=crop&crop=center',
                                'https://images.unsplash.com/photo-1517502884422-41eaead166d4?w=300&h=200&fit=crop&crop=center',
                            ];
                            
                            // EXACT SAME IMAGE SELECTION LOGIC
                            $imageIndex = $project->id % count($businessImages);
                            $imageUrl = $businessImages[$imageIndex];
                            
                            $umkmName = $project->umkm->umkmProfile->umkm_name ?? $project->umkm->name;
                            $alreadyApplied = in_array($project->id, $appliedProjectIds ?? []);
                            
                            $frequencyMap = [
                                'total' => 'Total',
                                'per_hour' => '/Jam',
                                'per_day' => '/Hari',
                                'per_week' => '/Minggu',
                                'per_month' => '/Bulan'
                            ];
                            $salaryFrequency = $frequencyMap[$project->salary_frequency] ?? $project->salary_frequency;
                        @endphp

                        <div class="group bg-white/5 backdrop-blur-lg border border-white/10 rounded-xl overflow-hidden hover:bg-white/10 transition duration-200">
                            <div class="flex flex-col md:flex-row">
                                {{-- EXACT SAME IMAGE SECTION STRUCTURE --}}
                                <div class="md:w-48 h-40 flex-shrink-0 relative overflow-hidden">
                                    <img src="{{ $imageUrl }}" 
                                         alt="{{ $project->title }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                                         loading="lazy"
                                         onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=300&h=200&fit=crop&crop=center';">

                                    {{-- EXACT SAME CATEGORY BADGE --}}
                                    <div class="absolute top-2 right-2">
                                        <span class="bg-black/60 backdrop-blur-sm px-2 py-0.5 rounded-full text-[10px] font-bold text-white">
                                            {{ $project->category }}
                                        </span>
                                    </div>
                                    
                                    {{-- EXACT SAME APPLIED BADGE --}}
                                    @if($alreadyApplied)
                                        <div class="absolute top-2 left-2">
                                            <span class="bg-green-600/80 backdrop-blur-sm px-2 py-0.5 rounded-full text-[10px] font-bold text-white flex items-center gap-0.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-2.5 w-2.5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                </svg>
                                                Sudah Melamar
                                            </span>
                                        </div>
                                    @endif
                                </div>

                                {{-- COMPACT CONTENT SECTION --}}
                                <div class="flex-1 p-3">
                                    <div class="flex flex-col h-full">
                                        {{-- Header --}}
                                        <div class="mb-2">
                                            <h3 class="text-sm font-bold text-white group-hover:text-blue-300 transition line-clamp-1">
                                                {{ $project->title }}
                                            </h3>
                                            <p class="text-xs text-blue-300/80 mt-0.5">
                                                {{ $umkmName }}
                                            </p>
                                        </div>

                                        {{-- Essential Info Grid --}}
                                        <div class="grid grid-cols-2 gap-2 mb-2">
                                            <div class="flex items-center gap-1.5 text-xs">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span class="text-blue-100">{{ substr($project->time_start, 0, 5) }} - {{ substr($project->time_end, 0, 5) }}</span>
                                            </div>
                                            
                                            <div class="flex items-center gap-1.5 text-xs">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span class="text-blue-100 font-semibold">
                                                    {{ number_format($project->salary_amount, 0, ',', '.') }} {{ $project->currency }}
                                                    <span class="text-blue-300/70 font-normal"> {{ $salaryFrequency }}</span>
                                                </span>
                                            </div>
                                            
                                            @if($project->work_system)
                                            <div class="flex items-center gap-1.5 text-xs">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                </svg>
                                                <span class="text-blue-100">{{ ucfirst($project->work_system) }}</span>
                                            </div>
                                            @endif
                                            
                                            @if($project->employment_type)
                                            <div class="flex items-center gap-1.5 text-xs">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>
                                                <span class="text-blue-100">{{ ucfirst($project->employment_type) }}</span>
                                            </div>
                                            @endif
                                        </div>

                                        {{-- Compact Description --}}
                                        <p class="text-xs text-blue-200/60 leading-relaxed line-clamp-2 flex-grow mb-2">
                                            {{ Str::limit($project->description, 90) }}
                                        </p>

                                        {{-- Footer --}}
                                        <div class="pt-2 mt-auto border-t border-white/10 flex justify-between items-center">
                                            <span class="text-[10px] text-gray-400">
                                                {{ $project->created_at->diffForHumans() }}
                                            </span>
                                            <a href="{{ route('explore.show', $project) }}"
                                                class="text-xs text-blue-400 hover:text-blue-300 transition flex items-center gap-0.5 group/link">
                                                Lihat Detail
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3 group-hover/link:translate-x-0.5 transition-transform">
                                                    <path fill-rule="evenodd"
                                                        d="M12.97 3.97a.75.75 0 011.06 0l7.5 7.5a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 11-1.06-1.06l6.22-6.22H3a.75.75 0 010-1.5h16.19l-6.22-6.22a.75.75 0 010-1.06z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8 bg-white/5 rounded-xl border border-white/10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-400 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            <p class="text-gray-400 text-sm">Belum ada project yang tersedia saat ini.</p>
                        </div>
                    @endforelse
                </div>

                {{-- Compact View All Button --}}
                @if($projects->count() > 0)
                    <div class="pt-2">
                        <a href="{{ route('explore.index') }}" 
                           class="block w-full text-center bg-white/5 hover:bg-white/10 border border-white/10 text-white text-xs py-2 rounded-lg transition duration-200">
                            Tampilkan Semua Project
                        </a>
                    </div>
                @endif
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
        
        /* Line clamp utilities */
        .line-clamp-1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection