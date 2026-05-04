<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        'name',
        'apartment',
        'block',
        'phone',
        'email',
        'photo_path',
        'status',
        'rfid_tag'
    ];

    public function accessLogs()
    {
        return $this->hasMany(AccessLog::class);
    }
}
