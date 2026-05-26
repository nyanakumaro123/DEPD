<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'issued_by',
        'date'
    ];

    // public function pelamarProfile(): BelongsTo
    // {
    //     return $this->belongsTo(PelamarProfile::class);
    // }
}
