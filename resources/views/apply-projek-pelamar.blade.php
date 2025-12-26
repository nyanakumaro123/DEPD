@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#FFF7ED] ">

    <x-navbar-pelamar />

    <div class="p-6 md:p-10 max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-blue-700 mb-6">Apply Judul Proyek</h1>

        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="pitch" class="font-semibold text-gray-800 mb-2 block">Pitch (Promosikan diri anda):</label>
            <textarea id="pitch" name="pitch" rows="4" placeholder="Saya sangat tertarik dengan proyek ini karena..." class="w-full bg-blue-50 border border-blue-200 rounded-lg p-4 outline-none focus:ring-2 focus:ring-blue-300"></textarea>

            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mt-6 p-4 bg-white rounded-lg shadow-sm border">
                <div>
                    <p class="text-gray-700 font-medium">Portofolio</p>
                    <p class="text-sm text-gray-500 mb-2 md:mb-0">Upload portofolio (PDF) khusus untuk proyek ini</p>
                </div>
                <input type="file" name="portfolio" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"/>
            </div>

            <button type="submit" class="w-full mt-10 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg transition-colors">Kirim Lamaran</button>
        </form>
    </div>
</div>
@endsection