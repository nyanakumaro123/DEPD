<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name','email','password','role', 'profile'
    ];

    protected $hidden = [
        'password'
    ];

     public function isPelamar(): bool
    {
        return $this->role === 'pelamar';
    }

    public function isUmkm(): bool
    {
        return $this->role === 'umkm';
    }

    public function pelamarProfile(): HasOne
    {
        return $this->hasOne(PelamarProfile::class);
    }

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

    public function unreadNotificationsCount()
    {
        return $this->hasMany(\App\Models\Notification::class)
                    ->where('is_read', false)
                    ->count();
    }

}
