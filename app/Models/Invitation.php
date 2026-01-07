<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable = [
        'umkm_id','pelamar_id','project_id','status'
    ];

    public function umkm()
    {
        return $this->belongsTo(User::class, 'umkm_id');
    }
    public function pelamar()
    {
        return $this->belongsTo(User::class, 'pelamar_id');
    }
}
