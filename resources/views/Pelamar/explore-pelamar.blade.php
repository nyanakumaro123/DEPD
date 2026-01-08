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

    <div class="relative z-10 max-w-7xl mx-auto p-6 pt-10">
        {{-- FILTER TOGGLE --}}
        <div class="mb-6">
            <button
                onclick="document.getElementById('filterBox').classList.toggle('hidden')"
                class="bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-bold py-2.5 px-6 rounded-xl transition duration-300 shadow-lg shadow-blue-900/30 transform hover:scale-105 inline-block tracking-wide">
                Filter Kategori
            </button>
        </div>

        {{-- FILTER BOX --}}
        <form method="GET" id="filterBox"
            class="mb-6 bg-white/10 backdrop-blur-lg border border-white/20 p-4 rounded-xl shadow-lg hidden">

            <h3 class="font-bold mb-3 text-white">Pilih Kategori</h3>

            @php
                $categories = [
                    'Branding','Design','Marketing','Content',
                    'Development','Photography','Videography',
                    'Social Media','Finance'
                ];
            @endphp

            <div class="flex flex-wrap gap-3">
                @foreach($categories as $cat)
                    <label class="flex items-center gap-2 text-sm text-blue-200">
                        <input type="checkbox" name="category[]"
                            value="{{ $cat }}"
                            {{ in_array($cat, request('category', [])) ? 'checked' : '' }} class="form-checkbox text-blue-500 bg-gray-700 border-gray-600 rounded focus:ring-blue-500">
                        {{ $cat }}
                    </label>
                @endforeach
            </div>

            <div class="mt-4 flex gap-3">
                <button class="bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-bold py-2 px-5 rounded-xl transition duration-300 shadow-lg shadow-blue-900/30 transform hover:scale-105">
                    Terapkan
                </button>
                <a href="{{ route('explore.index') }}"
                class="bg-gray-700 hover:bg-gray-600 text-white px-5 py-2 rounded-xl transition duration-300 shadow-lg shadow-gray-900/30 transform hover:scale-105">
                    Reset
                </a>
            </div>
        </form>

        {{-- LIST PROJECT --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse($projects as $project)
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
                @endphp

                <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-xl shadow-lg overflow-hidden hover:shadow-blue-900/30 transition-all duration-300 group">
                    
                    {{-- Image Section --}}
                    <div class="relative overflow-hidden h-48">
                        <img src="{{ $imageUrl }}" 
                             alt="{{ $project->title }}"
                             class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-110"
                             loading="lazy"
                             onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=300&h=200&fit=crop&crop=center';">
                        
                        {{-- Category Badge --}}
                        <div class="absolute top-3 right-3">
                            <span class="bg-black/60 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-white">
                                {{ $project->category }}
                            </span>
                        </div>
                        
                        {{-- Applied Badge --}}
                        @if(in_array($project->id, $appliedProjectIds ?? []))
                            <div class="absolute top-3 left-3">
                                <span class="bg-green-600/80 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-white flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Sudah Melamar
                                </span>
                            </div>
                        @endif
                    </div>
                    
                    {{-- Content Section --}}
                    <div class="p-5 space-y-3">
                        <div>
                            <h3 class="text-xl font-bold text-white group-hover:text-blue-300 transition-colors">
                                {{ $project->title }}
                            </h3>
                            <p class="text-sm text-blue-200 mt-1">
                                {{ $project->umkm->umkmProfile->umkm_name ?? $project->umkm->name }}
                            </p>
                        </div>

                        <div class="space-y-2">
                            {{-- Time --}}
                            <div class="flex items-center gap-2 text-sm text-blue-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                </svg>
                                <span>{{ substr($project->time_start, 0, 5) }} - {{ substr($project->time_end, 0, 5) }}</span>
                            </div>
                            
                            {{-- Salary --}}
                            <div class="flex items-center gap-2 text-sm text-blue-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                                </svg>
                                <span class="font-semibold">
                                    {{ number_format($project->salary_amount, 0, ',', '.') }} {{ $project->currency }} 
                                    ({{ str_replace('_', ' ', $project->salary_frequency) }})
                                </span>
                            </div>
                        </div>

                        <p class="text-sm text-blue-200 line-clamp-2">
                            {{ Str::limit($project->description, 100) }}
                        </p>

                        <div class="pt-3 border-t border-white/10 flex justify-between items-center">
                            <a href="{{ route('explore.show', $project) }}"
                               class="text-blue-400 hover:text-blue-300 font-semibold transition-colors flex items-center gap-1 group/link">
                                Lihat Detail
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 group-hover/link:translate-x-1 transition-transform">
                                    <path fill-rule="evenodd"
                                        d="M12.97 3.97a.75.75 0 011.06 0l7.5 7.5a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 11-1.06-1.06l6.22-6.22H3a.75.75 0 010-1.5h16.19l-6.22-6.22a.75.75 0 010-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            
                            {{-- Time ago --}}
                            <span class="text-xs text-gray-400">
                                {{ $project->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16">
                    <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-xl p-8 max-w-md mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-blue-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <p class="text-gray-400 text-lg font-medium">Tidak ada proyek ditemukan</p>
                        <p class="text-gray-500 text-sm mt-2">Coba filter kategori yang berbeda atau coba lagi nanti.</p>
                    </div>
                </div>
            @endforelse

        </div>

        {{-- PAGINATION --}}
        @if($projects->hasPages())
            <div class="mt-8">
                {{ $projects->withQueryString()->links('pagination::tailwind') }}
            </div>
        @endif
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
</style>
@endsection