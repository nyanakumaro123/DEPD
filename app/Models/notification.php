<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type', // application_submitted, invitation || accepted, rejected
        'title',
        'message',
        'project_id',
        'is_read'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}