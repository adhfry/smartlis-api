<?php

namespace App\Models;

use App\Models\Card;
use App\Models\User;
use App\Models\Device;
use Illuminate\Database\Eloquent\Model;

class AccessLog extends Model
{

    protected $fillable = ['card_id', 'user_id', 'device_id', 'access_type', 'access_time'];
    public function card()
    {
        return $this->belongsTo(Card::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}