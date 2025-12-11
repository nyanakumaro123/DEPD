<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class notification extends Model
{
    use HasFactory;

    protected $table = 'attendances';

    protected $fillable = [
        'notification_id',
        'user_id',
        'description',
    ];
}