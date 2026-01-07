@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans pb-10">

    {{-- NAVBAR --}}
    @include('layouts.navbar')

    <div class="max-w-6xl mx-auto px-6 py-8">

        <h1 class="text-4xl font-serif font-bold text-[#355dad] mb-8">
            Daftar Pelamar Project
        </h1>

        {{-- TABLE --}}
        <div class="overflow-x-auto bg-white rounded-xl shadow">

            <table class="w-full border-collapse">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-4 text-left">Pelamar</th>
                        <th class="p-4 text-left">Project</th>
                        <th class="p-4 text-left">Tanggal Lamar</th>
                        <th class="p-4 text-left">Status</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($applications as $application)
                        <tr class="border-t">

                            {{-- Pelamar --}}
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <img
                                        src="https://i.pravatar.cc/40?u={{ $application->pelamar->id }}"
                                        class="w-8 h-8 rounded-full"
                                    >
                                    <span class="font-medium">
                                        {{ $application->pelamar->name }}
                                    </span>
                                </div>
                            </td>

                            {{-- Project --}}
                            <td class="p-4">
                                {{ $application->project->title }}
                            </td>

                            {{-- Tanggal --}}
                            <td class="p-4 text-sm text-gray-500">
                                {{ $application->created_at->format('d M Y') }}
                            </td>

                            {{-- Status --}}
                            <td class="p-4">
                                @if ($application->status === 'pending')
                                    <span class="px-3 py-1 rounded-full text-sm bg-yellow-100 text-yellow-700">
                                        Pending
                                    </span>
                                @elseif ($application->status === 'accepted')
                                    <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-700">
                                        Accepted
                                    </span>
                                @elseif ($application->status === 'rejected')
                                    <span class="px-3 py-1 rounded-full text-sm bg-red-100 text-red-700">
                                        Rejected
                                    </span>
                                @endif
                            </td>

                            {{-- Aksi --}}
                            <td class="p-4 text-center">
                                @if ($application->status === 'pending')
                                    <div class="flex justify-center gap-2">

                                        <form method="POST" action="#">
                                            @csrf
                                            <button
                                                class="px-3 py-1 bg-green-600 text-white rounded-lg text-sm hover:bg-green-700">
                                                Terima
                                            </button>
                                        </form>

                                        <form method="POST" action="#">
                                            @csrf
                                            <button
                                                class="px-3 py-1 bg-red-600 text-white rounded-lg text-sm hover:bg-red-700">
                                                Tolak
                                            </button>
                                        </form>

                                    </div>
                                @else
                                    <span class="text-gray-400 text-sm">—</span>
                                @endif
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-6 text-center text-gray-500">
                                Belum ada pelamar
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>
</div>
@endsection
