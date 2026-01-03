@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">

    <h1 class="text-3xl font-bold mb-6">Notifikasi</h1>

    @forelse($notifications as $notif)
        <form action="{{ route('notifications.read', $notif->id) }}" method="POST">
            @csrf

            <button class="w-full text-left mb-4">
                <div class="p-4 rounded-lg shadow
                    {{ $notif->read_at ? 'bg-gray-100' : 'bg-blue-100' }}">

                    <p class="font-semibold">
                        {{ $notif->data['title'] ?? 'Notifikasi' }}
                    </p>

                    <p class="text-sm text-gray-700">
                        {{ $notif->data['message'] ?? '' }}
                    </p>

                    <span class="text-xs text-gray-500">
                        {{ $notif->created_at->diffForHumans() }}
                    </span>
                </div>
            </button>
        </form>
    @empty
        <div class="text-center text-gray-500">
            Tidak ada notifikasi
        </div>
    @endforelse

    <div class="mt-6">
        {{ $notifications->links() }}
    </div>

</div>
@endsection
