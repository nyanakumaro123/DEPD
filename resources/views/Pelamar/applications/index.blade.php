@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-6">

    <h1 class="text-2xl font-bold mb-4">Status Lamaran Saya</h1>

    <table class="w-full border bg-white rounded-lg overflow-hidden">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="p-3">Project</th>
                <th class="p-3">UMKM</th>
                <th class="p-3">Status</th>
                <th class="p-3">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($applications as $app)
                <tr class="border-t">
                    <td class="p-3">{{ $app->project->title }}</td>
                    <td class="p-3">{{ $app->project->umkm->name }}</td>
                    <td class="p-3">
                        @if($app->status === 'pending')
                            <span class="text-yellow-600 font-semibold">Pending</span>
                        @elseif($app->status === 'accepted')
                            <span class="text-green-600 font-semibold">Accepted</span>
                        @elseif($app->status === 'rejected')
                            <span class="text-red-600 font-semibold">Rejected</span>
                        @endif
                    </td>
                    <td class="p-3 text-sm text-gray-500">
                        {{ $app->created_at->format('d M Y') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">
                        Belum ada lamaran
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
