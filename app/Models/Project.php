<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'umkm_id',
        'title',
        'category',
        'employment_type',
        'work_system',
        'working_days',
        'time_start',
        'time_end',
        'salary_amount',
        'salary_frequency',
        'currency',
        'salary_min',
        'salary_max',
        'description',
        'benefits',
        'application_deadline',
        'status',
        'syarat_path',
    ];


    protected $casts = [
        'rewards' => 'array'
    ];

    public function umkm()
    {
        return $this->belongsTo(User::class, 'umkm_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function isOpen(): bool
    {
        return $this->status === 'open';
    }
}
