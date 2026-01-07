@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans">

    @include('layouts.navbar')

    <div class="max-w-3xl mx-auto p-6 space-y-6">

        <h2 class="text-3xl font-bold text-[#355dad] text-center mb-6">Notifications</h2>

        @forelse ($notifications as $notif)
            @php
                // Color coding based on type
                $bgColor = 'bg-white';
                $borderColor = 'border-gray-300';
                $textColor = 'text-gray-800';
                $statusColor = 'bg-gray-100 text-gray-700';

                switch($notif->type) {
                    case 'accepted':
                        $bgColor = 'bg-[#d1fae5]';
                        $borderColor = 'border-green-300';
                        $textColor = 'text-green-900';
                        $statusColor = 'bg-white text-green-700';
                        break;
                    case 'rejected':
                        $bgColor = 'bg-[#fee2e2]';
                        $borderColor = 'border-red-300';
                        $textColor = 'text-red-900';
                        $statusColor = 'bg-white text-red-700';
                        break;
                    case 'invitation':
                        $bgColor = 'bg-[#e0e7ff]';
                        $borderColor = 'border-blue-200';
                        $textColor = 'text-[#355dad]';
                        $statusColor = 'bg-white text-[#355dad]';
                        break;
                    case 'application submitted':
                        $bgColor = 'bg-[#fff4e6]';
                        $borderColor = 'border-yellow-300';
                        $textColor = 'text-[#b45309]';
                        $statusColor = 'bg-white text-[#b45309]';
                        break;
                }
            @endphp

            <div class="{{ $bgColor }} border {{ $borderColor }} rounded-xl p-6 shadow-md hover:shadow-lg transition flex flex-col md:flex-row items-center gap-5">
                
                <img src="https://i.pravatar.cc/150?img={{ $notif->user_id }}" 
                     alt="{{ $notif->user->name }}" 
                     class="h-16 w-16 rounded-full object-cover border border-gray-300">

                <div class="flex-1 space-y-1 text-center md:text-left">
                    <h3 class="font-bold text-xl {{ $textColor }}">
                        {{ $notif->user->name }}
                    </h3>
                    <p class="text-gray-700 text-sm">
                        {{ $notif->title }} — {{ $notif->message }}
                    </p>
                </div>

                @if($notif->type === 'invitation')
                    <a href="{{ route('invitation.detail', {{-- $notif->invitation_id --}}) }}"
                    class="px-4 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition">
                        Detail
                    </a>
                @elseif($notif->type === 'application')
                    <a href="{{ route('umkm.applications', {{-- $notif->application_id --}}) }}"
                    class="px-4 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition">
                        Detail
                    </a>
                @else
                    <span class="font-bold {{ $statusColor }} px-4 py-1 rounded-full text-sm uppercase">
                        {{ $notif->type }}
                    </span>
                @endif

            </div>
        @empty
            <p class="text-gray-500 text-center">No notifications available</p>
        @endforelse

        <div class="mt-4 text-center">
            {{ $notifications->links() }}
        </div>

    </div>
</div>
@endsection
