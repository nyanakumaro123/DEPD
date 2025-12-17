<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name','email','password','role', 'profile'
    ];

    protected $hidden = [
        'password'
    ];

    public function umkmProfile()
    {
        return $this->hasOne(UmkmProfile::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'umkm_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'pelamar_id');
    }
}
