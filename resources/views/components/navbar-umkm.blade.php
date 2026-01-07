<nav class="bg-[#355dad] px-6 py-3 shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center">

        {{-- LOGO --}}
        <div class="flex items-center gap-2">
            <img src="{{ asset('img/logo-pathloka.png') }}" alt="PathLoka"
                 class="h-10 w-auto">
            <span class="text-2xl font-bold font-serif text-yellow-400 tracking-wide"
                  style="-webkit-text-stroke: 0.5px #b89200;">
                PathLoka
            </span>
        </div>

        {{-- MENU --}}
        <div class="hidden md:flex space-x-8 text-white font-bold text-lg">

            <a href="{{ route('home.umkm') }}"
               class="hover:text-yellow-400 transition
               {{ Request::routeIs('home.umkm') ? 'border-b-2 border-white' : '' }}">
               Home
            </a>

            <a href="{{ route('profile.umkm') }}"
               class="hover:text-yellow-400 transition
               {{ Request::routeIs('profile.umkm') ? 'border-b-2 border-white' : '' }}">
               Profile
            </a>

            {{-- BELUM ADA --}}
            <a href="#"
               class="hover:text-yellow-400 transition cursor-not-allowed opacity-70">
               Project
            </a>

            <a href="#"
               class="hover:text-yellow-400 transition cursor-not-allowed opacity-70">
               Workspace
            </a>

            <a href="#"
               class="hover:text-yellow-400 transition cursor-not-allowed opacity-70">
               Request
            </a>
        </div>

        {{-- AVATAR --}}
        <a href="{{ route('profile.umkm') }}"
           class="h-10 w-10 rounded-full overflow-hidden border-2 border-white">
            <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?auto=format&fit=crop&w=150&q=80"
                 class="h-full w-full object-cover">
        </a>
    </div>
</nav>
