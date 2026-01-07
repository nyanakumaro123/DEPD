<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PelamarProfile extends Model
{
    use HasFactory;

    protected $table = 'pelamar_profiles';

    protected $fillable = [
        'user_id',
        'major_id',
        'full_name',
        'education_level',
        'portfolio',
        'portfolio_type',
        'portfolio_file',
        'portfolio_link',
        'about_me',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function major(): BelongsTo
    {
        return $this->belongsTo(Major::class, 'major_id');
    }

}

//php artisan make:seeder PelamarProfileSeeder

//php artisan db:seed
//php artisan migrate:fresh --seed
