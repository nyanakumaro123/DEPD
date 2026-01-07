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

        <h2 class="text-3xl font-bold text-blue-200 font-serif mb-8 text-center lg:text-left">Project List</h2>

        <div class="space-y-6">

        @php
            // Get projects of the logged-in UMKM
            $projects = auth()->user()->umkmProfile
                ? \App\Models\Project::where('umkm_id', auth()->id())->latest()->get()
                : collect();
        @endphp

        @forelse ($projects as $project)
            <div class="bg-white/10 backdrop-blur-lg rounded-xl p-4 shadow-lg shadow-blue-900/30 flex flex-col md:flex-row gap-5 border border-white/10 hover:border-blue-400 transition mb-4">
                <img src="{{ $project->image ?? 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&q=80' }}" 
                     alt="{{ $project->title }}" 
                     class="w-full md:w-48 h-32 object-cover rounded-lg">

                <div class="flex-1 space-y-1">
                    <h3 class="text-xl font-bold text-white">{{ $project->title }}</h3>
                    <p class="text-blue-200 font-bold text-sm">
                        {{ $project->umkm->umkm_name ?? 'UMKM Name' }} -- Duration: {{ $project->time_start }} - {{ $project->time_end }}
                    </p>
                    <p class="text-blue-200/80 text-sm leading-relaxed mt-2 font-medium">
                        {{ Str::limit($project->description, 120) }}
                    </p>
                </div>
            </div>
        @empty
            <p class="text-blue-300 text-center text-lg py-10">No projects available yet. Start by creating one!</p>
        @endforelse

        </div> {{-- End of space-y-6 --}}

        <div class="text-center pt-8">
            <a href="#" class="text-blue-300 hover:text-blue-100 transition duration-300 text-lg font-semibold">See more...</a>
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
</style>
@endsection
