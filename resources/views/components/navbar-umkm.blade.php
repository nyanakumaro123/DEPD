<nav class="bg-[#355dad] px-6 py-3 shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        
        <div class="flex items-center gap-2">
            <img src="{{ asset('img/logo-pathloka.png') }}" alt="PathLoka" class="h-10 w-auto">
            <span class="text-2xl font-bold font-serif text-yellow-400 tracking-wide"
                  style="-webkit-text-stroke: 0.5px #b89200;">
                PathLoka
            </span>
        </div>

        <div class="hidden md:flex space-x-8 text-white font-bold text-lg">
            
            {{-- Home --}}
            <a href="{{ route('home.umkm') }}" 
               class="hover:text-yellow-400 transition pb-1 
               {{ Request::routeIs('home.umkm') ? 'border-b-2 border-white' : '' }}">
               Home
            </a>
            
            {{-- Profile --}}
            <a href="{{ route('profile.umkm') }}" 
               class="hover:text-yellow-400 transition pb-1 
               {{ Request::routeIs('profile.umkm') ? 'border-b-2 border-white' : '' }}">
               Profile
            </a>
            
            {{-- Project --}}
            <a href="{{ route('project.umkm') }}"
               class="hover:text-yellow-400 transition pb-1 
               {{ Request::routeIs('project.umkm') || Request::routeIs('project.create.umkm') ? 'border-b-2 border-white' : '' }}">
               Project
            </a>
            
            {{-- Workspace --}}
            <a href="#" class="hover:text-yellow-400 transition pb-1">Workspace</a>
            
            {{-- Request --}}
            <a href="{{ route('request.umkm') }}" 
               class="hover:text-yellow-400 transition pb-1 
               {{ Request::routeIs('request.umkm') ? 'border-b-2 border-white' : '' }}">
               Request
            </a>
        </div>

        <a href="{{ route('profile.umkm') }}"
           class="h-10 w-10 rounded-full overflow-hidden border-2 border-white">
            <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38"
                 class="h-full w-full object-cover">
        </a>
    </div>
</nav>