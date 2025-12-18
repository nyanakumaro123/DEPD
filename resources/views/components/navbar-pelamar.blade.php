<nav class="bg-[#355dad] px-6 py-3 shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center">

        {{-- LOGO --}}
        <div class="flex items-center gap-2">
            <img src="{{ asset('img/logo-pathloka.png') }}" alt="PathLoka"
                 class="h-10 w-auto object-contain">
            <span class="text-2xl font-bold font-serif text-yellow-400 tracking-wide"
                  style="-webkit-text-stroke: 0.5px #b89200;">
                PathLoka
            </span>
        </div>

        {{-- MENU --}}
        <div class="hidden md:flex space-x-8 text-white font-bold text-lg">
            <a href="{{ route('home.pelamar') }}"
               class="hover:text-yellow-400 transition
               {{ Request::routeIs('home.pelamar') ? 'border-b-2 border-white' : '' }}">
               Home
            </a>

            <a href="{{ route('profile.pelamar') }}"
               class="hover:text-yellow-400 transition
               {{ Request::routeIs('profile.pelamar') ? 'border-b-2 border-white' : '' }}">
               Profile
            </a>

            {{-- FITUR BELUM ADA --}}
            <a href="#"
               class="hover:text-yellow-400 transition cursor-not-allowed opacity-70">
               Explore
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

        {{-- RIGHT ICON --}}
        <div class="flex items-center gap-4">
            {{-- NOTIFICATION (DISABLE) --}}
            <div class="relative p-2 text-white opacity-70 cursor-not-allowed">
                <div class="bg-[#5a7bc2] rounded-full p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke-width="2"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M14.857 17.082a23.848 23.848 0 005.454-1.31
                                 A8.967 8.967 0 0118 9.75V9
                                 a6 6 0 00-12 0v.75
                                 a8.967 8.967 0 01-2.312 6.022
                                 c1.733.64 3.56 1.085 5.455 1.31
                                 m5.714 0a24.255 24.255 0 01-5.714 0
                                 m5.714 0a3 3 0 11-5.714 0" />
                    </svg>
                </div>
            </div>

            {{-- AVATAR --}}
            <div class="h-10 w-10 rounded-full overflow-hidden border-2 border-white">
                <img src="https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?auto=format&fit=crop&w=150&q=80"
                     alt="User"
                     class="h-full w-full object-cover">
            </div>
        </div>
    </div>
</nav>
