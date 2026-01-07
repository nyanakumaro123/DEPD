<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('umkm_id')->constrained('users')->cascadeOnDelete();
            $table->string('title');
            $table->string('category');
            $table->json('rewards')->nullable();
            $table->time('time_start');
            $table->time('time_end');
            $table->decimal('salary_amount', 12, 2);
            $table->enum('salary_frequency', ['per_hour','per_day', 'per_month', 'total']);
            $table->string('currency', 10);
            $table->text('description');
            $table->string('syarat_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
