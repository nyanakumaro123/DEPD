<nav class="bg-[#355dad] px-6 py-3 shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center">

        <div class="flex items-center gap-2">
            <img src="{{ asset('img/logo-pathloka.png') }}" alt="PathLoka" class="h-10 w-auto object-contain">
            <span class="text-2xl font-bold font-serif text-yellow-400 tracking-wide"
                  style="-webkit-text-stroke: 0.5px #b89200;">PathLoka</span>
        </div>

        @php
            $active = 'text-yellow-400 underline decoration-2 underline-offset-4';
            $inactive = 'hover:text-yellow-400 transition';
        @endphp

        <div class="hidden md:flex space-x-8 text-white font-bold text-lg">

            <a href="{{ route($user->role == false ? 'home.pelamar' : 'home.umkm') }}"
               class="{{ request()->routeIs('home.*') ? $active : $inactive }}">
                Home
            </a>

            <a href="{{ route($user->role == false ? 'profile.pelamar' : 'profile.umkm', ['userId' => $user->id]) }}"
               class="{{ request()->routeIs('profile.*') ? $active : $inactive }}">
                Profile
            </a>

            <a href="#"
               class="{{ request()->routeIs('project.*') ? $active : $inactive }}">
                Project
            </a>

            <a href="#"
               class="{{ request()->routeIs('workspace.*') ? $active : $inactive }}">
                Workspace
            </a>

            <a href="#"
               class="{{ request()->routeIs('request.*') ? $active : $inactive }}">
                Request
            </a>
        </div>

        <a href="{{ route($user->role == false ? 'profile.pelamar' : 'profile.umkm', ['userId' => $user->id]) }}"
           class="h-10 w-10 rounded-full overflow-hidden border-2 border-white cursor-pointer hover:shadow-lg transition hover:border-yellow-400">
            <img src="{{ $user->profile 
                ? asset('storage/profile_pictures/' . $user->profile) 
                : asset('img/user_profile.webp') }}"
                 alt="Profile"
                 class="h-full w-full object-cover">
        </a>
    </div>
</nav>
