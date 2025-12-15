<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'ratings';

    protected $fillable = [
        'user_id',
        'umkm_profile_id',
        'score', //★ 1-5
        'review', //text
    ];

    public function umkmProfile(): BelongsTo
    {
        return $this->belongsTo(UMKMProfile::class, 'umkm_profile_id');
    }

     public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}