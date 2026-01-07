@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans">

    @include('layouts.navbar')

    <div class="max-w-7xl mx-auto p-6">

        <h2 class="text-2xl font-bold text-[#355dad] font-serif mb-6">Project List</h2>

        @php
            // Get projects of the logged-in UMKM
            $projects = auth()->user()->umkmProfile
                ? \App\Models\Project::where('umkm_id', auth()->id())->latest()->get()
                : collect();
        @endphp

        @forelse ($projects as $project)
            <div class="bg-[#f2e6d8] rounded-xl p-4 shadow-md flex flex-col md:flex-row gap-5 border border-[#e6d0b8] hover:shadow-lg transition mb-4">
                <img src="{{ $project->image ?? 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&q=80' }}" 
                     alt="{{ $project->title }}" 
                     class="w-full md:w-48 h-32 object-cover rounded-lg">

                <div class="flex-1 space-y-1">
                    <h3 class="text-xl font-bold text-[#5c3d2e]">{{ $project->title }}</h3>
                    <p class="text-[#8c5e45] font-bold text-sm">
                        {{ $project->umkm->umkm_name ?? 'UMKM Name' }} -- Duration: {{ $project->time_start }} - {{ $project->time_end }}
                    </p>
                    <p class="text-[#a1887f] text-sm leading-relaxed mt-2 font-medium">
                        {{ Str::limit($project->description, 120) }}
                    </p>
                </div>
            </div>
        @empty
            <p class="text-gray-500 text-center">No projects available.</p>
        @endforelse

        <div class="text-center pt-4">
            <a href="#" class="text-[#bcaaa4] hover:text-[#8d6e63]">See more...</a>
        </div>

    </div>
</div>
@endsection
