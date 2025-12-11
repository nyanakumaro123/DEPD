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
        'major',
        'portfolio',
        'certificate'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}

//php artisan make:seeder PelamarProfileSeeder

//php artisan db:seed
//php artisan migrate:fresh --seed
