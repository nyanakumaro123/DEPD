<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
{
    Schema::table('projects', function (Blueprint $table) {

        if (!Schema::hasColumn('projects', 'employment_type')) {
            $table->enum('employment_type', [
                'full-time',
                'part-time',
                'freelance',
                'contract'
            ])->nullable()->after('category');
        }

        if (!Schema::hasColumn('projects', 'work_system')) {
            $table->enum('work_system', [
                'onsite',
                'remote',
                'hybrid'
            ])->nullable()->after('employment_type');
        }

        if (!Schema::hasColumn('projects', 'working_days')) {
            $table->string('working_days')->nullable()->after('work_system');
        }

        if (!Schema::hasColumn('projects', 'salary_min')) {
            $table->decimal('salary_min', 15, 2)->nullable()->after('salary_amount');
        }

        if (!Schema::hasColumn('projects', 'salary_max')) {
            $table->decimal('salary_max', 15, 2)->nullable()->after('salary_min');
        }

        if (!Schema::hasColumn('projects', 'benefits')) {
            $table->text('benefits')->nullable()->after('description');
        }

        if (!Schema::hasColumn('projects', 'application_deadline')) {
            $table->date('application_deadline')->nullable()->after('benefits');
        }

    });
}


    public function down(): void
{
    Schema::table('projects', function (Blueprint $table) {

        if (Schema::hasColumn('projects', 'application_deadline')) {
            $table->dropColumn('application_deadline');
        }

        if (Schema::hasColumn('projects', 'benefits')) {
            $table->dropColumn('benefits');
        }

        if (Schema::hasColumn('projects', 'salary_max')) {
            $table->dropColumn('salary_max');
        }

        if (Schema::hasColumn('projects', 'salary_min')) {
            $table->dropColumn('salary_min');
        }

        if (Schema::hasColumn('projects', 'working_days')) {
            $table->dropColumn('working_days');
        }

        if (Schema::hasColumn('projects', 'work_system')) {
            $table->dropColumn('work_system');
        }

        if (Schema::hasColumn('projects', 'employment_type')) {
            $table->dropColumn('employment_type');
        }
    });
}

};
