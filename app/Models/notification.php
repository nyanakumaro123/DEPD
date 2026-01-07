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
        'type', // application submitted, invitation, application || accepted, rejected
        'title',
        'message',
        'project_id',
        'invitation_id',
        'application_id',
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

    public function invitation(): BelongsTo
    {
        return $this->belongsTo(Invitation::class);
    }
    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class);
    }
}