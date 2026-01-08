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

        <div class="relative z-10 max-w-7xl mx-auto p-6 pt-10">

            <h2 class="text-3xl font-bold text-blue-200 font-serif mb-8 text-center lg:text-left">Project List</h2>

            <div class="space-y-6">

                @php
                    // Get projects of the logged-in UMKM
                    $projects = auth()->user()->umkmProfile
                        ? \App\Models\Project::where('umkm_id', auth()->id())
                            ->latest()
                            ->get()
                        : collect();
                @endphp

                @forelse ($projects as $project)
                    <div
                        class="bg-white/10 backdrop-blur-lg rounded-xl p-4 shadow-lg shadow-blue-900/30 flex flex-col md:flex-row gap-5 border border-white/10 hover:border-blue-400 transition mb-4">
                        <!-- Business/Office themed image with more reliable sources -->
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

                            // Handle rewards - check if it's already an array or needs decoding
                            $rewardsArray = [];
                            if ($project->rewards) {
                                if (is_array($project->rewards)) {
                                    $rewardsArray = $project->rewards;
                                } else {
                                    $rewardsArray = json_decode($project->rewards, true) ?? [];
                                }
                            }
                        @endphp

                        <img src="{{ $imageUrl }}" alt="{{ $project->title }}"
                            class="w-full md:w-48 h-32 object-cover rounded-lg transition-transform duration-500 ease-out hover:scale-110"
                            loading="lazy"
                            onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=300&h=200&fit=crop&crop=center';">

                        <div class="flex-1 space-y-1">
                            <h3 class="text-xl font-bold text-white">{{ $project->title }}</h3>
                            <p class="text-blue-200 font-bold text-sm">
                                Duration: {{ substr($project->time_start, 0, 5) }} - {{ substr($project->time_end, 0, 5) }}
                            </p>
                            <p class="text-blue-200/80 text-sm leading-relaxed mt-2 font-small">
                                {{ Str::limit($project->description, 120) }}
                            </p>

                            <!-- Display other project details -->
                            <div class="mt-3 flex flex-wrap gap-2 items-center">
                                <span class="px-3 py-1 bg-blue-500/20 text-blue-300 rounded-full text-xs">
                                    {{ $project->category }}
                                </span>
                                <span class="px-3 py-1 bg-green-500/20 text-green-300 rounded-full text-xs">
                                    {{ $project->currency }} {{ number_format($project->salary_amount) }} /
                                    {{ str_replace('_', ' ', $project->salary_frequency) }}
                                </span>

                                <!-- Display actual benefits - compact version -->
                                @if (!empty($rewardsArray))
                                    <div class="mt-2">
                                        <span class="text-xs text-purple-300 font-medium mb-1 block">Benefits:</span>
                                        <div class="flex flex-wrap gap-1">
                                            @foreach ($rewardsArray as $reward)
                                                @if (!empty(trim($reward)))
                                                    <span
                                                        class="px-2 py-0.5 bg-purple-500/15 text-purple-300 rounded text-xs border border-purple-500/20">
                                                        {{ trim($reward) }}
                                                    </span>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-blue-300 text-center text-lg py-10">No projects available yet. Start by creating one!</p>
                @endforelse
            </div>

        </div> {{-- End of space-y-6 --}}

        <div class="text-center pt-8">
            <a href="#" class="text-blue-300 hover:text-blue-100 transition duration-300 text-lg font-semibold">See
                more...</a>
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
