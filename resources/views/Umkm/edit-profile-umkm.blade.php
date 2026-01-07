@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans pb-12">

    @include('layouts.navbar')

    <div class="max-w-6xl mx-auto p-6 pt-8">
        <form action="{{ route('save-profile.umkm', $profile->user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                
                <div class="lg:col-span-4 flex flex-col items-center lg:items-start">
                    <div class="h-64 w-64 rounded-full border-4 border-[#355dad] overflow-hidden shadow-lg bg-white mb-6 relative group">
                        <img src="{{ $profile->user->profile ? asset('storage/profile_pictures/' . $profile->user->profile) : asset('img/user_profile.webp') }}" 
                             alt="Profile Picture" 
                             class="h-full w-full object-cover group-hover:opacity-75 transition">
                        
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#355dad" class="w-10 h-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                            </svg>
                        </div>
                    </div>

                    <label for="profilePhotoInput"
                        class="cursor-pointer bg-[#355dad] hover:bg-[#2a4a8b] text-white font-bold py-2 px-6 rounded-lg shadow-md transition w-full max-w-[256px] text-center">
                        Ubah Foto Profile
                    </label>
                    <input type="file" name="profile_photo" id="profilePhotoInput" class="hidden" accept="image/*">

                </div>

                <div class="lg:col-span-8 space-y-6">
                    
                    <div class="space-y-2">
                        <label class="block text-[#355dad] font-bold text-xl">Nama</label>
                        <input type="text"
                                name="umkm_name"
                                value="{{ old('umkm_name', $profile->umkm_name) }}"
                               class="w-full bg-[#e0e7ff] text-[#355dad] font-semibold text-lg py-3 px-4 rounded-lg border border-blue-200 focus:outline-none focus:ring-2 focus:ring-[#355dad]">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-[#355dad] font-bold text-xl">Deskripsi UMKM</label>
                        <textarea name="description" rows="8"
                               class="w-full bg-[#e0e7ff] text-[#355dad] font-medium text-lg py-3 px-4 rounded-lg border border-blue-200 focus:outline-none focus:ring-2 focus:ring-[#355dad] resize-none leading-relaxed">{{ old('description', $profile->description) }}</textarea>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    const profileInput = document.getElementById('profilePhotoInput');
    const profileImg = document.querySelector('.group img');

    profileInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                profileImg.src = e.target.result;
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>

@endsection
