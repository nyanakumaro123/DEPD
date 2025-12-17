<nav class="bg-[#355dad] px-6 py-3 shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center">

        {{-- Logo --}}
        <div class="flex items-center gap-2">
            <img src="{{ asset('img/logo-pathloka.png') }}" alt="PathLoka" class="h-10 w-auto object-contain">
            <span class="text-2xl font-bold font-serif text-yellow-400 tracking-wide"
                  style="-webkit-text-stroke: 0.5px #b89200;">PathLoka</span>
        </div>

        @php
            $active = 'text-yellow-400 underline decoration-2 underline-offset-4';
            $inactive = 'hover:text-yellow-400 transition';
        @endphp

        {{-- Nav Links --}}
        <div class="hidden md:flex space-x-8 text-white font-bold text-lg">
            <a href="{{ route($user->role == false ? 'home.pelamar' : 'home.umkm') }}"
               class="{{ request()->routeIs('home.*') ? $active : $inactive }}">
                Home
            </a>

            <a href="{{ route($user->role == false ? 'profile.pelamar' : 'profile.umkm', ['userId' => $user->id]) }}"
               class="{{ request()->routeIs('profile.*') ? $active : $inactive }}">
                Profile
            </a>

            <a href="#" class="{{ request()->routeIs('project.*') ? $active : $inactive }}">
                Project
            </a>

            <a href="#" class="{{ request()->routeIs('workspace.*') ? $active : $inactive }}">
                Workspace
            </a>

            <a href="#" class="{{ request()->routeIs('request.*') ? $active : $inactive }}">
                Request
            </a>
        </div>

        {{-- Right Side Actions --}}
        <div class="flex items-center gap-4">
            {{-- Notification Button --}}
            <button class="relative text-white hover:text-yellow-400 transition">
                <div class="bg-[#5a7bc2] rounded-full p-2 hover:bg-[#6b8ed6] transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                    </svg>
                </div>

                {{-- Notification dot (optional) --}}
                {{-- <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span> --}}
            </button>

            {{-- Profile --}}
            <a href="{{ route($user->role == false ? 'profile.pelamar' : 'profile.umkm', ['userId' => $user->id]) }}"
               class="h-10 w-10 rounded-full overflow-hidden border-2 border-white cursor-pointer hover:shadow-lg transition hover:border-yellow-400">
                <img src="{{ $user->profile
                    ? asset('storage/profile_pictures/' . $user->profile)
                    : asset('img/user_profile.webp') }}"
                     alt="Profile"
                     class="h-full w-full object-cover">
            </a>
        </div>

    </div>
</nav>
