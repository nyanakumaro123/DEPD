@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">Notifikasi</h1>

    @forelse ($notifications as $notif)
        <div class="border p-4 rounded mb-3
            {{ $notif->read_at ? 'bg-white' : 'bg-blue-50' }}">

            <div class="flex justify-between items-center">
                <div>
                    <p class="font-semibold">
                        {{ $notif->data['title'] ?? 'Notifikasi' }}
                    </p>

                    <p class="text-sm text-gray-600">
                        {{ $notif->data['message'] ?? '-' }}
                    </p>
                </div>

                {{-- ACTION --}}
                @if(($notif->data['type'] ?? '') === 'invitation')
                    <div class="flex gap-2">
                        <form method="POST" action="{{ route('notifikasi.accept', $notif->id) }}">
                            @csrf
                            <button class="bg-green-500 text-white px-3 py-1 rounded">
                                Accept
                            </button>
                        </form>

                        <form method="POST" action="{{ route('notifikasi.reject', $notif->id) }}">
                            @csrf
                            <button class="bg-red-500 text-white px-3 py-1 rounded">
                                Reject
                            </button>
                        </form>
                    </div>
                @endif
            </div>

            {{-- AUTO READ --}}
            @if(is_null($notif->read_at))
                <form method="POST" action="{{ route('notifikasi.read', $notif->id) }}">
                    @csrf
                    <button class="text-xs text-blue-600 mt-2">
                        Tandai sudah dibaca
                    </button>
                </form>
            @endif
        </div>
    @empty
        <p class="text-gray-500">Tidak ada notifikasi</p>
    @endforelse

    <div class="mt-6">
        {{ $notifications->links() }}
    </div>
</div>
@endsection
