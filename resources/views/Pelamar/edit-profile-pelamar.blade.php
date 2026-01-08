@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 overflow-hidden relative font-sans pb-20">
    <!-- Decorative background elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-0 -right-4 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>

    @include('layouts.navbar')

    <div class="relative z-10 max-w-6xl mx-auto p-6 pt-10">

        <form action="{{ route('save-profile.pelamar', $profile->user->id) }}" method="POST" enctype="multipart/form-data"> @csrf
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                
                <div class="lg:col-span-4 flex flex-col items-center">
                    <div class="h-64 w-64 rounded-full border-4 border-blue-400 overflow-hidden shadow-lg bg-white mb-6 relative group">
                        <img src="{{ $profile->user->profile ? asset('storage/profile_pictures/' . $profile->user->profile) : asset('img/user_profile.webp') }}" 
                             alt="Profile Picture" 
                             class="h-full w-full object-cover group-hover:opacity-75 transition">
                        
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                            <i class="fas fa-camera text-3xl text-blue-300"></i>
                        </div>
                    </div>

                    <label for="profilePhotoInput" class="cursor-pointer bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-bold py-2.5 px-6 rounded-xl transition duration-300 shadow-lg shadow-blue-900/30 transform hover:scale-105 inline-block tracking-wide w-full max-w-[200px] text-center">
                        Edit Profile Photo
                    </label>
                    <input type="file" name="profile_photo" id="profilePhotoInput" class="hidden" accept="image/*">

                </div>

                {{-- DATA --}}
                <div class="lg:col-span-8 space-y-6">
                    
                    <div class="space-y-2">
                        <label class="block text-blue-200 text-sm font-semibold mb-2 ml-1">Name</label>
                        <input type="text" name="name" value="{{ $profile->user->name }}" 
                               class="w-full bg-white/10 backdrop-blur-lg border border-white/10 text-white font-semibold text-lg py-3 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 placeholder-blue-200/50">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="space-y-2">
                            <label class="block text-blue-200 text-sm font-semibold mb-2 ml-1">Major</label>
                            <select name="major_id"
                                    class="w-full bg-white/10 backdrop-blur-lg border border-white/10 text-white font-semibold text-lg py-3 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
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
                            <label class="block text-blue-200 text-sm font-semibold mb-2 ml-1">Contact</label>
                            <input type="number" name="phone" value="{{ $profile->phone }}"
                                   class="w-full bg-white/10 backdrop-blur-lg border border-white/10 text-white font-semibold text-lg py-3 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-blue-200 text-sm font-semibold mb-2 ml-1">Email</label>
                            <input type="email" name="email" value="{{ $profile->user->email }}" 
                                   class="w-full bg-white/10 backdrop-blur-lg border border-white/10 text-white font-semibold text-lg py-3 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                    </div>

                    <div class="pt-4 flex items-center gap-4">
                        <label
                            class="cursor-pointer bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-bold py-3.5 px-8 rounded-xl transition duration-300 shadow-lg shadow-blue-900/30 transform hover:scale-105 inline-block tracking-wide shrink-0 w-[240px] text-center"
                        >
                            Upload Portofolio (PDF)
                            <input type="file" name="portfolio" id="portfolioInput" class="hidden" accept=".pdf">
                        </label>

                        <span id="portfolioName" class="text-blue-200 font-bold text-lg">No File Selected</span>
                    </div>

                </div>
            </div>

            <div class="pt-8 flex justify-end lg:pr-12">
                <button type="submit"
                    class="min-w-[240px] bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-bold py-3.5 px-8 rounded-xl transition duration-300 shadow-lg shadow-blue-900/30 transform hover:scale-105">
                    Save Profile
                </button>
            </div>

        </div>

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

<style>
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    .animate-blob {
        animation: blob 7s infinite;
    }
    .animation-delay-2000 {
        animation-delay: 2s;
    }
    .animation-delay-4000 {
        animation-delay: 4s;
    }
</style>
@endsection