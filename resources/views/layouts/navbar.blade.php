@php
    $user = auth()->user();
    $unread = $user 
        ? \App\Models\Notification::where('user_id', $user->id)
            ->where('is_read', false)
            ->count()
        : 0;
@endphp

<nav class="bg-slate-900/70 backdrop-blur-lg border-b border-white/10 px-6 py-3 shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center">

        {{-- LOGO --}}
        <div class="flex items-center gap-2">
            <img src="{{ asset('img/logo-pathloka.png') }}" class="h-10">
            <span class="text-2xl font-bold text-white">Path<span class="text-yellow-400">Loka</span></span>
        </div>

        {{-- MENU --}}
        <div class="hidden md:flex items-center gap-8 text-blue-200 font-semibold">
            @auth
                {{-- HOME --}}
                <a href="{{ route($user->role === 'pelamar' ? 'home.pelamar' : 'home.umkm') }}" class="{{ request()->routeIs('home.*') ? 'text-yellow-400 font-bold' : 'hover:text-yellow-400' }} transition-colors">
                    Home
                </a>

                {{-- PROFILE --}}
                <a href="{{ route(
                    $user->role === 'pelamar' ? 'profile.pelamar' : 'profile.umkm',
                    $user->id
                ) }}" class="{{ request()->routeIs('profile.*') ? 'text-yellow-400 font-bold' : 'hover:text-yellow-400' }} transition-colors">
                    Profile
                </a>

                {{-- EXPLORE (HANYA PELAMAR) --}}
                @if($user->role === 'pelamar')
                    <a href="{{ route('explore.index') }}" class="{{ request()->routeIs('explore.*') ? 'text-yellow-400 font-bold' : 'hover:text-yellow-400' }} transition-colors">
                        Explore
                    </a>
                @endif

                {{-- MENU KHUSUS UMKM --}}
                @if($user->role === 'umkm')
                    <a href="{{ route('umkm.pelamar.index') }}" class="{{ request()->routeIs('umkm.pelamar.*') ? 'text-yellow-400 font-bold' : 'hover:text-yellow-400' }} transition-colors">
                        Pelamar
                    </a>
                @endif

                @if($user->role === 'umkm')
                    <a href="{{ route('umkm.projects.index') }}" class="{{ request()->routeIs('umkm.projects.*') ? 'text-yellow-400 font-bold' : 'hover:text-yellow-400' }} transition-colors">Project</a>
                @endif

            @endauth
        </div>

        {{-- RIGHT --}}
        <div class="flex items-center gap-4">
            @auth
                {{-- NOTIFICATION --}}
                <a href="{{ route('notifikasi') }}" class="relative {{ request()->routeIs('notifikasi') ? 'text-yellow-400' : 'text-blue-300 hover:text-white' }} transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7">
                        <path fill-rule="evenodd" d="M11.25 4.5A6.75 6.75 0 004.5 11.25v5.69l-1.72 1.72a.75.75 0 00.53 1.28h15.38a.75.75 0 00.53-1.28l-1.72-1.72v-5.69A6.75 6.75 0 0012.75 4.5h-1.5zM12 21a3 3 0 003-3H9a3 3 0 003 3z" clip-rule="evenodd" />
                    </svg>
                    @if($unread > 0)
                        <span class="absolute top-0 right-0 flex h-4 w-4">
                            <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500 text-white text-[10px] items-center justify-center">
                                {{ $unread > 9 ? '9+' : $unread }}
                            </span>
                        </span>
                    @endif
                </a>

            {{-- PROFILE PICTURE --}}
                <a href="{{ route(
                    $user->role === 'pelamar' ? 'profile.pelamar' : 'profile.umkm',
                    $user->id
                ) }}"
                class="w-10 h-10 rounded-full overflow-hidden border-2 border-blue-400 transition-all duration-300 {{ request()->routeIs('profile.*') ? 'ring-2 ring-yellow-400' : 'hover:ring-2 hover:ring-yellow-400' }}">
                    <img src="{{ $user->profile ? asset('storage/profile_pictures/' . $user->profile) : asset('img/user_profile.webp') }}"
                        class="w-full h-full object-cover">
                </a>
            @endauth
        </div>

    </div>
</nav>
