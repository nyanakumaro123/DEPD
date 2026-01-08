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

        <div class="relative z-10 max-w-7xl mx-auto p-6 grid grid-cols-1 lg:grid-cols-12 gap-8">

            {{-- SIDEBAR: APPLY STATUS --}}
            <div class="lg:col-span-4 space-y-4">
                <h2 class="text-2xl font-bold text-blue-200">Status Lamaran</h2>

                <div class="space-y-3">
                    @forelse($applications as $app)
                        <div
                            class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl p-3 flex justify-between items-center shadow-lg hover:bg-white/15 transition">
                            <div class="flex items-center gap-3 overflow-hidden">
                                {{-- Foto Profil UMKM --}}
                                @if ($app->project->umkm->umkmProfile && $app->project->umkm->umkmProfile->profile_photo)
                                    <img src="{{ asset('storage/' . $app->project->umkm->umkmProfile->profile_photo) }}"
                                        alt="UMKM Photo"
                                        class="h-10 w-10 rounded-full object-cover border-2 border-white/30 flex-shrink-0">
                                @else
                                    <div
                                        class="h-10 w-10 rounded-full bg-blue-500 flex items-center justify-center border-2 border-white/30 flex-shrink-0">
                                        @php
                                            // Get UMKM name or initials
                                            $umkmName = $app->project->umkm->umkmProfile->umkm_name ?? $app->project->umkm->name;
                                            $initials = substr($umkmName, 0, 2);
                                        @endphp
                                        <span class="font-bold text-xs">{{ $initials }}</span>
                                    </div>
                                @endif

                                <div class="flex flex-col truncate">
                                    <span class="font-bold text-white text-sm truncate">{{ $app->project->title }}</span>
                                    <span class="text-xs text-blue-300 truncate">
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
                            <span class="{{ $statusColor }} border px-2 py-1 rounded-full text-xs font-bold capitalize">
                                {{ $app->status }}
                            </span>
                        </div>
                    @empty
                        <div class="text-gray-400 text-sm italic bg-white/5 p-4 rounded-xl border border-white/10">
                            Belum ada lamaran yang dikirim.
                        </div>
                    @endforelse
                </div>

                @if ($applications->count() > 0)
                    <a href="{{ route('pelamar.applications') }}"
                        class="block text-right text-gray-400 hover:text-yellow-400 text-sm mt-2 transition">
                        Lihat semua lamaran →
                    </a>
                @endif
            </div>


            {{-- MAIN CONTENT: PROJECT FEED --}}
            <div class="lg:col-span-8 space-y-6">

                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-bold text-blue-200">Project Terbaru</h2>
                    <a href="{{ route('explore.index') }}"
                        class="text-blue-300 hover:text-white transition text-sm flex items-center gap-1">
                        Explore Lebih Banyak
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M16.28 11.47a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 011.06-1.06l7.5 7.5z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>

                <div class="space-y-4">
                    @forelse($projects as $project)
                        <div
                            class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-xl p-4 shadow-lg flex flex-col md:flex-row gap-5 hover:bg-white/10 transition duration-300 group">

                            {{-- Business/Office themed image --}}
                            <div class="w-full md:w-48 h-32 flex-shrink-0 rounded-lg overflow-hidden relative">
                                @php
                                    // Collection of reliable business/office image URLs
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
                                    
                                    // Select image based on project ID for consistency
                                    $imageIndex = $project->id % count($businessImages);
                                    $imageUrl = $businessImages[$imageIndex];
                                    
                                    // Get UMKM name
                                    $umkmName = $project->umkm->umkmProfile->umkm_name ?? $project->umkm->name;
                                @endphp
                                
                                <img src="{{ $imageUrl }}" 
                                     alt="{{ $project->title }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                                     loading="lazy"
                                     onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=300&h=200&fit=crop&crop=center';">

                                <div
                                    class="absolute top-2 right-2 bg-black/60 backdrop-blur-sm px-2 py-1 rounded text-xs font-bold text-white">
                                    {{ $project->category }}
                                </div>
                            </div>

                            <div class="flex-1 flex flex-col justify-between">
                                <div>
                                    <div class="flex justify-between items-start">
                                        <h3 class="text-xl font-bold text-white group-hover:text-blue-300 transition">
                                            {{ $project->title }}
                                        </h3>
                                        <span class="text-xs text-gray-400 whitespace-nowrap">
                                            {{ $project->created_at->diffForHumans() }}
                                        </span>
                                    </div>

                                    <p class="text-blue-300 font-bold text-sm mt-1">
                                        {{ $umkmName }}
                                        <span class="text-gray-400 font-normal mx-1">•</span>
                                        {{ $project->salary_frequency == 'total' ? 'Total' : 'Gaji' }}:
                                        {{ number_format($project->salary_amount, 0, ',', '.') }} {{ $project->currency }}
                                    </p>

                                    <p class="text-gray-300 text-sm leading-relaxed mt-2 line-clamp-2">
                                        {{ $project->description }}
                                    </p>
                                </div>

                                <div class="mt-3 pt-3 border-t border-white/10 flex justify-end">
                                    <a href="{{ route('explore.show', $project) }}"
                                        class="text-sm font-semibold text-yellow-400 hover:text-yellow-300 transition flex items-center gap-1">
                                        Lihat Detail
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-4 h-4">
                                            <path fill-rule="evenodd"
                                                d="M12.97 3.97a.75.75 0 011.06 0l7.5 7.5a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 11-1.06-1.06l6.22-6.22H3a.75.75 0 010-1.5h16.19l-6.22-6.22a.75.75 0 010-1.06z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-10 bg-white/5 rounded-xl border border-white/10">
                            <p class="text-gray-400 text-lg">Belum ada project yang tersedia saat ini.</p>
                        </div>
                    @endforelse
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