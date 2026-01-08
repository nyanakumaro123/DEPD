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

    <div class="relative z-10 max-w-5xl mx-auto p-6 pt-10">
        <h2 class="text-5xl font-bold text-white mb-10 font-serif">
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-white">Edit Profil UMKM</span>
        </h2>

        <div class="bg-white/10 backdrop-blur-lg border border-white/10 rounded-3xl shadow-2xl p-8 lg:p-12">
            <form action="{{ route('save-profile.umkm', $profile->user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                    
                    <div class="lg:col-span-4 flex flex-col items-center">
                        <div class="h-64 w-64 rounded-3xl border-2 border-white/20 overflow-hidden shadow-2xl bg-white/5 mb-6 relative group">
                            <img src="{{ $profile->user->profile ? asset('storage/profile_pictures/' . $profile->user->profile) : asset('img/user_profile.webp') }}" 
                                 alt="Profile Picture" 
                                 class="h-full w-full object-cover group-hover:scale-110 transition duration-500">
                            
                            <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-12 h-12">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                                </svg>
                            </div>
                        </div>

                        <label for="profilePhotoInput"
                            class="cursor-pointer bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 px-8 rounded-xl shadow-lg shadow-blue-900/40 transition w-full text-center">
                            Ubah Foto Profile
                        </label>
                        <input type="file" name="profile_photo" id="profilePhotoInput" class="hidden" accept="image/*">
                    </div>

                    <div class="lg:col-span-8 space-y-8">
                        
                        <div class="space-y-3">
                            <label class="block text-blue-200 font-bold text-sm uppercase tracking-widest">Nama UMKM</label>
                            <input type="text"
                                    name="umkm_name"
                                    value="{{ old('umkm_name', $profile->umkm_name) }}"
                                   class="w-full bg-white/5 text-white font-semibold text-lg py-4 px-5 rounded-2xl border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white/10 transition">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-blue-200 text-sm font-semibold mb-2 ml-1">Contact</label>
                            <input type="text" name="phone" value="{{ $profile->user->phone ?? '' }}"
                                class="w-full bg-white/10 backdrop-blur-lg border border-white/10 text-white font-semibold text-lg py-3 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>

                        <div class="space-y-3">
                            <label class="block text-blue-200 font-bold text-sm uppercase tracking-widest">Deskripsi UMKM</label>
                            <textarea name="description" rows="6"
                                   class="w-full bg-white/5 text-white font-medium text-lg py-4 px-5 rounded-2xl border border-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white/10 transition resize-none leading-relaxed">{{ old('description', $profile->description) }}</textarea>
                        </div>

                    </div>
                </div>

                <div class="mt-12 pt-8 border-t border-white/10">
                    <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-bold text-xl py-5 rounded-2xl shadow-xl shadow-blue-900/40 transition transform hover:scale-[1.02] active:scale-[0.98]">
                        Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>
    </div>
    </div>

<style>
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    .animate-blob { animation: blob 7s infinite; }
    .animation-delay-2000 { animation-delay: 2s; }
    .animation-delay-4000 { animation-delay: 4s; }
</style>

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
