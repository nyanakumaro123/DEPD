@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#FFF7ED] ">

    @include('layouts.navbar')

    <!-- Page Title -->
    <h1 class="text-3xl font-bold text-blue-700 mb-6">
        Apply Judul Proyek
    </h1>

    <!-- Form Container -->
    <div class="max-w-4xl">

        <!-- Pitch Label -->
        <label for="pitch" class="font-semibold text-gray-800 mb-2 block">
            Pitch:
        </label>

        <!-- Pitch Textarea -->
        <textarea
            id="pitch"
            rows="4"
            placeholder="Tuliskan deskripsi"
            class="w-full bg-blue-50 border border-blue-200 rounded-lg p-4 outline-none focus:ring-2 focus:ring-blue-300"
        ></textarea>

        <!-- Portfolio Upload Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mt-4">

            <!-- Warning Text -->
            <p class="text-sm text-gray-500 mb-2 md:mb-0">
                Anda belum upload portofolio anda
            </p>

            <!-- Upload Button -->
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                Upload portfolio (PDF)
            </button>
        </div>

        <!-- Submit Button (Disabled) -->
        <button
            class="w-full mt-10 bg-gray-300 text-gray-600 py-3 rounded-lg border border-gray-400 cursor-not-allowed"
            disabled
        >
            Apply
        </button>

    </div>

</div>
@endsection
