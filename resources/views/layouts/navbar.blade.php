@php
    $user = auth()->user();
    $unread = $user 
        ? \App\Models\Notification::where('user_id', $user->id)
            ->where('is_read', false)
            ->count()
        : 0;
@endphp

<nav class="bg-[#355dad] px-6 py-3 shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center">

        {{-- LOGO --}}
        <div class="flex items-center gap-2">
            <img src="{{ asset('img/logo-pathloka.png') }}" class="h-10">
            <span class="text-2xl font-bold text-yellow-400">PathLoka</span>
        </div>

        {{-- MENU --}}
        <div class="hidden md:flex gap-8 text-white font-bold">

            {{-- HOME --}}
            @auth
                <a href="{{ route($user->role === 'pelamar' ? 'home.pelamar' : 'home.umkm') }}">
                    Home
                </a>
            @endauth

            {{-- PROFILE --}}
            @auth
                <a href="{{ route(
                    $user->role === 'pelamar' ? 'profile.pelamar' : 'profile.umkm',
                    $user->id
                ) }}">
                    Profile
                </a>
            @endauth

            {{-- EXPLORE (SEMUA ROLE BOLEH) --}}
            <a href="{{ route('explore.index') }}">Explore</a>

            {{-- MENU KHUSUS UMKM --}}
            @auth
                @if($user && $user->role === 'umkm')
                <a href="{{ route('umkm.pelamar.index') }}">Pelamar</a>
            @endif
            @endauth

        </div>

        {{-- RIGHT --}}
        <div class="flex items-center gap-4">

            {{-- NOTIFICATION --}}
            @auth
                <a href="{{ route('notifikasi') }}" class="relative text-white">
                    🔔
                    @if($unread > 0)
                        <span class="absolute -top-1 -right-2 bg-red-500 text-xs px-2 rounded-full">
                            {{ $unread }}
                        </span>
                    @endif
                </a>
            @endauth

            {{-- PROFILE PICTURE --}}
                <a href="{{ route(
                    $user->role === 'pelamar' ? 'profile.pelamar' : 'profile.umkm',
                    $user->id
                ) }}"
                class="w-10 h-10 rounded-full overflow-hidden border-2 border-white">
                    <img src="{{ $user->profile ? asset('storage/profile_pictures/' . $user->profile) : asset('img/user_profile.webp') }}"
                        class="w-full h-full object-cover">
                </a>

        </div>
    </div>
</nav>
