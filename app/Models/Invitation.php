<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable = [
        'umkm_id','pelamar_id','project_id','status'
    ];
}
