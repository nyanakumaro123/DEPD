@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#fff8f0] font-sans pb-10">

    @extends('layouts.navbar')

    <div class="max-w-6xl mx-auto p-6 pt-8">
        
        <h1 class="text-4xl font-bold text-[#355dad] mb-8 font-serif">Edit Profile</h1>

        <form action="{{ route('save-profile.pelamar', $profile->user->id) }}" method="POST" enctype="multipart/form-data"> @csrf
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                
                <div class="lg:col-span-4 flex flex-col items-center">
                    <div class="h-64 w-64 rounded-full border-4 border-[#355dad] overflow-hidden shadow-lg bg-white mb-6 relative group">
                        <img src="{{ asset('storage/profile_pictures/' . $profile->user->profile) ?? asset('img/user_profile.webp') }}" 
                             alt="Profile Picture" 
                             class="h-full w-full object-cover group-hover:opacity-75 transition">
                        
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                            <i class="fas fa-camera text-3xl text-[#355dad]"></i>
                        </div>
                    </div>

                    <label for="profilePhotoInput" class="cursor-pointer bg-[#355dad] hover:bg-[#2a4a8b] text-white font-bold py-2 px-6 rounded-lg shadow-md transition w-full max-w-[200px] text-center">
                        Edit Profile Photo
                    </label>
                    <input type="file" name="profile_photo" id="profilePhotoInput" class="hidden" accept="image/*">

                </div>

                <div class="lg:col-span-8 space-y-6">
                    
                    <div class="space-y-2">
                        <label class="block text-[#355dad] font-bold text-xl">Name</label>
                        <input type="text" name="name" value="{{ $profile->user->name }}" 
                               class="w-full bg-[#e0e7ff] text-[#355dad] font-semibold text-lg py-3 px-4 rounded-lg border border-blue-200 focus:outline-none focus:ring-2 focus:ring-[#355dad] placeholder-blue-300">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="space-y-2">
                            <label class="block text-[#355dad] font-bold text-xl">Major</label>
                            <select name="major_id"
                                    class="w-full bg-[#e0e7ff] text-[#355dad] font-semibold text-lg py-3 px-4 rounded-lg border border-blue-200 focus:outline-none focus:ring-2 focus:ring-[#355dad]">
                                <option value="">-- Select Major --</option>
                                @foreach ($majors as $major)
                                    <option value="{{ $major->id }}"
                                        {{ $profile->major_id == $major->id ? 'selected' : '' }}>
                                        {{ $major->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-[#355dad] font-bold text-xl">Contact</label>
                            <input type="text" name="contact" value="08126523895" 
                                   class="w-full bg-[#e0e7ff] text-[#355dad] font-semibold text-lg py-3 px-4 rounded-lg border border-blue-200 focus:outline-none focus:ring-2 focus:ring-[#355dad]">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-[#355dad] font-bold text-xl">Email</label>
                            <input type="email" name="email" value="{{ $profile->user->email }}" 
                                   class="w-full bg-[#e0e7ff] text-[#355dad] font-semibold text-lg py-3 px-4 rounded-lg border border-blue-200 focus:outline-none focus:ring-2 focus:ring-[#355dad]">
                        </div>
                    </div>

                    <div class="pt-4 flex items-center gap-4">
                        <label class="cursor-pointer bg-[#355dad] hover:bg-[#2a4a8b] text-white font-bold py-3 px-6 rounded-lg shadow-md transition transform active:scale-95">
                            Upload Portofolio (PDF)
                            <input type="file" name="portfolio" id="portfolioInput" class="hidden" accept=".pdf">
                        </label>
                        
                        <span id="portfolioName" class="text-[#c4a484] font-bold text-lg">No File Selected</span>
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

<script>
document.getElementById('portfolioInput').addEventListener('change', function () {
    const fileNameSpan = document.getElementById('portfolioName');

    if (this.files && this.files.length > 0) {
        fileNameSpan.textContent = this.files[0].name;
    } else {
        fileNameSpan.textContent = 'No file selected';
    }
});
</script>

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