@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans pb-10">

    <x-navbar-pelamar />

    <div class="max-w-6xl mx-auto p-6 pt-8">
        
        <h1 class="text-4xl font-bold text-[#355dad] mb-8 font-serif">Edit Profile</h1>

        <form action="{{ route('save.profile.pelamar') }}" method="POST" enctype="multipart/form-data"> @csrf
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                
                <div class="lg:col-span-4 flex flex-col items-center">
                    <div class="h-64 w-64 rounded-full border-4 border-[#355dad] overflow-hidden shadow-lg bg-white mb-6 relative group">
                        <img src="https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" 
                             alt="Profile Picture" 
                             class="h-full w-full object-cover group-hover:opacity-75 transition">
                        
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                            <i class="fas fa-camera text-3xl text-[#355dad]"></i>
                        </div>
                    </div>

                    <button type="button" class="bg-[#355dad] hover:bg-[#2a4a8b] text-white font-bold py-2 px-6 rounded-lg shadow-md transition w-full max-w-[200px]">
                        Edit Profile Photo
                    </button>
                </div>

                <div class="lg:col-span-8 space-y-6">
                    
                    <div class="space-y-2">
                        <label class="block text-[#355dad] font-bold text-xl">Name</label>
                        <input type="text" value="KucingMauMakan" 
                               class="w-full bg-[#e0e7ff] text-[#355dad] font-semibold text-lg py-3 px-4 rounded-lg border border-blue-200 focus:outline-none focus:ring-2 focus:ring-[#355dad] placeholder-blue-300">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="space-y-2">
                            <label class="block text-[#355dad] font-bold text-xl">Major</label>
                            <input type="text" value="VCD / DKV" 
                                   class="w-full bg-[#e0e7ff] text-[#355dad] font-semibold text-lg py-3 px-4 rounded-lg border border-blue-200 focus:outline-none focus:ring-2 focus:ring-[#355dad]">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-[#355dad] font-bold text-xl">Contact</label>
                            <input type="text" value="08126523895" 
                                   class="w-full bg-[#e0e7ff] text-[#355dad] font-semibold text-lg py-3 px-4 rounded-lg border border-blue-200 focus:outline-none focus:ring-2 focus:ring-[#355dad]">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-[#355dad] font-bold text-xl">Email</label>
                            <input type="email" value="Kucing@gmail.com" 
                                   class="w-full bg-[#e0e7ff] text-[#355dad] font-semibold text-lg py-3 px-4 rounded-lg border border-blue-200 focus:outline-none focus:ring-2 focus:ring-[#355dad]">
                        </div>
                    </div>

                    <div class="pt-4 flex items-center gap-4">
                        <label class="cursor-pointer bg-[#355dad] hover:bg-[#2a4a8b] text-white font-bold py-3 px-6 rounded-lg shadow-md transition transform active:scale-95">
                            Upload Portofolio (PDF)
                            <input type="file" class="hidden" accept=".pdf">
                        </label>
                        
                        <span class="text-[#c4a484] font-bold text-lg">Nkkkdendd.pdf</span>
                    </div>

                </div>
            </div>

            <div class="mt-16">
                <button type="submit" class="w-full bg-[#355dad] hover:bg-[#2a4a8b] text-white font-bold text-xl py-4 rounded-xl shadow-lg transition transform hover:scale-[1.01]">
                    Done
                </button>
            </div>

        </form>
    </div>
</div>
@endsection