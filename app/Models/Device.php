<?php

namespace App\Models;

use App\Models\AccessLog;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    // name location is_active last_seen
    protected $fillable = ['name', 'location', 'is_active', 'last_seen'];

    public function accessLogs()
    {
        return $this->hasMany(AccessLog::class);
    }

}
