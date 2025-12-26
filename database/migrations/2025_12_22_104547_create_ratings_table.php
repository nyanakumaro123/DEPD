<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('umkm_profile_id')->constrained('umkm_profiles')->cascadeOnDelete(); // Pastikan tabel umkm_profiles sudah ada
            $table->tinyInteger('score');
            $table->text('review')->nullable();
            $table->timestamps();
            $table->unique(['user_id', 'umkm_profile_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
