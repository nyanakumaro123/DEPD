@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-6">

    <h1 class="text-2xl font-bold mb-4">Notifikasi</h1>

    @forelse ($notifications as $notif)
        <div class="bg-white shadow rounded-lg p-4 mb-3
            {{ $notif->read_at ? 'opacity-70' : 'border-l-4 border-blue-500' }}">

            {{-- TYPE --}}
            @php $data = $notif->data; @endphp

            {{-- Lamaran Masuk (UMKM) --}}
            @if($data['type'] === 'application_submitted')
                <p class="font-semibold">{{ $data['title'] }}</p>
                <p class="text-sm text-gray-600">{{ $data['message'] }}</p>

            {{-- Undangan --}}
            @elseif($data['type'] === 'invitation')
                <p class="font-semibold">Undangan Project</p>
                <p class="text-sm">
                    Kamu diundang ke project
                    <b>{{ $data['project_title'] }}</b>
                    oleh {{ $data['umkm_name'] }}
                </p>

                <div class="mt-3 flex gap-2">
                    <a href="{{ route('invitation.accept', $notif->id) }}"
                       class="px-3 py-1 bg-green-600 text-white rounded text-sm">
                        Accept
                    </a>
                    <a href="{{ route('invitation.reject', $notif->id) }}"
                       class="px-3 py-1 bg-red-600 text-white rounded text-sm">
                        Reject
                    </a>
                </div>

            {{-- Status Lamaran --}}
            @elseif(in_array($data['type'], ['accepted','rejected']))
                <p class="font-semibold">
                    Lamaran {{ ucfirst($data['type']) }}
                </p>
                <p class="text-sm">
                    Project: {{ $data['project_title'] }}
                </p>
            @endif

            <p class="text-xs text-gray-400 mt-2">
                {{ $notif->created_at->diffForHumans() }}
            </p>
        </div>
    @empty
        <p class="text-gray-500">Tidak ada notifikasi</p>
    @endforelse

    <div class="mt-4">
        {{ $notifications->links() }}
    </div>
</div>
@endsection
