<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessLog extends Model
{
    protected $fillable = [
        'tenant_id',
        'device_name',
        'direction',
        'access_time'
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
