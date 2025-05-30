<?php

namespace App\Models;

use App\Models\User;
use App\Models\BorrowItem;
use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Model;

class BorrowRequest extends Model
{
    // $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
    //         $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
    //         $table->foreignId('proccessed_by')->nullable()->constrained('users')->onDelete('cascade');
    //         $table->timestamp('proccessed_at')->nullable();
    protected $fillable = ['user_id', 'status', 'proccessed_by', 'proccessed_at'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function processedBy()
    {
        return $this->belongsTo(User::class, 'proccessed_by');
    }
    public function borrowItems()
    {
        return $this->hasMany(BorrowItem::class, 'request_id');
    }

    public function peminjaman()
    {
        return $this->hasOne(Peminjaman::class, 'request_id');
    }

}