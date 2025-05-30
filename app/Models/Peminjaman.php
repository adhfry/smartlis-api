<?php

namespace App\Models;

use App\Models\BorrowRequest;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    //$table->foreignId('request_id')->constrained('borrow_requests')->onDelete('cascade');
    // $table->date('batas_pinjam');
    // $table->datetime('tanggal_kembali')->nullable();
    // $table->enum('status', ['pinjam', 'kembali'])->default('pinjam');
    // $table->decimal('denda', 10, 2)->default(0);
    protected $fillable = ['request_id', 'batas_pinjam', 'tanggal_kembali', 'status', 'denda'];
    public function request()
    {
        return $this->belongsTo(BorrowRequest::class, 'request_id');
    }

}
