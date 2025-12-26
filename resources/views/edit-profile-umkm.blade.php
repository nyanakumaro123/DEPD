@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans pb-10">

    <x-navbar-umkm />

    <div class="max-w-6xl mx-auto p-6 pt-8">
        <h1 class="text-4xl font-bold text-[#355dad] mb-8 font-serif">Edit Profile</h1>
        <form action="{{ route('update-profile.umkm') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <div class="lg:col-span-4 flex flex-col items-center lg:items-start">
                    <div class="h-64 w-64 rounded-full border-4 border-[#355dad] overflow-hidden shadow-lg bg-white mb-6 relative group">
                        <img src="{{ $profile->user->profile ? asset('storage/profile_pictures/' . $profile->user->profile) : asset('img/user_profile.webp') }}" 
                             alt="Profile Picture" class="h-full w-full object-cover group-hover:opacity-75 transition group-image">
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                            <span class="text-[#355dad] font-bold text-3xl">+</span>
                        </div>
                    </div>
                    <label for="profilePhotoInput" class="cursor-pointer bg-[#355dad] hover:bg-[#2a4a8b] text-white font-bold py-2 px-6 rounded-lg shadow-md transition w-full max-w-[256px] text-center">
                        Ubah Foto Profile
                    </label>
                    <input type="file" name="profile_photo" id="profilePhotoInput" class="hidden" accept="image/*">
                </div>

                <div class="lg:col-span-8 space-y-6">
                    <div class="space-y-2">
                        <label class="block text-[#355dad] font-bold text-xl">Nama UMKM</label>
                        <input type="text" name="umkm_name" value="{{ old('umkm_name', $profile->umkm_name) }}"
                               class="w-full bg-[#e0e7ff] text-[#355dad] font-semibold text-lg py-3 px-4 rounded-lg border border-blue-200 focus:outline-none focus:ring-2 focus:ring-[#355dad]">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-[#355dad] font-bold text-xl">Deskripsi UMKM</label>
                        <textarea name="description" rows="8"
                               class="w-full bg-[#e0e7ff] text-[#355dad] font-medium text-lg py-3 px-4 rounded-lg border border-blue-200 focus:outline-none focus:ring-2 focus:ring-[#355dad] resize-none leading-relaxed">{{ old('description', $profile->description) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="mt-16">
                <button type="submit" class="w-full bg-[#355dad] hover:bg-[#2a4a8b] text-white font-bold text-xl py-4 rounded-xl shadow-lg transition transform hover:scale-[1.01]">
                    Selesai
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const profileInput = document.getElementById('profilePhotoInput');
    const profileImg = document.querySelector('.group-image');
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