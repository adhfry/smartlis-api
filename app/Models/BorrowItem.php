<?php

namespace App\Models;

use App\Models\Book;
use App\Models\BorrowRequest;
use Illuminate\Database\Eloquent\Model;

class BorrowItem extends Model
{
    //$table->foreignId('request_id')->constrained('borrow_requests')->onDelete('cascade');
    // $table->foreignId('book_id')->constrained('books')->onDelete('cascade');
    protected $fillable = ['request_id', 'book_id'];
    public function request()
    {
        return $this->belongsTo(BorrowRequest::class, 'request_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

}
