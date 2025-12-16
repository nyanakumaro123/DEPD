<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id','pelamar_id','status'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function pelamar()
    {
        return $this->belongsTo(User::class, 'pelamar_id');
    }
}
