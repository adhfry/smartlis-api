<?php

namespace App\Models;

use App\Models\User;
use App\Models\AccessLog;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['uid', 'user_id', 'assigned_by', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    public function accessLogs()
    {
        return $this->hasMany(AccessLog::class);
    }
}
