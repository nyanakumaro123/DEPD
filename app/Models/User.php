<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name','email','password','role', 'profile' // Tambahkan 'profile'
    ];

    protected $hidden = [
        'password'
    ];

    public function umkmProfile()
    {
        return $this->hasOne(UmkmProfile::class);
    }
    
    // Relasi baru dari Kumaro
    public function pelamarProfile()
    {
        return $this->hasOne(PelamarProfile::class);
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