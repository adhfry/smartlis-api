<?php

namespace App\Models;

use App\Models\BorrowItem;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'barcode',
        'judul',
        'cover',
        'deskripsi',
        'author',
        'penerbit',
        'tahun_terbit',
        'jumlah'
    ];
    /**
     * Get the cover image URL.
     *
     * @return string
     */
    public function getCoverUrlAttribute()
    {
        return $this->cover ? asset('storage/' . $this->cover) : asset('images/default-cover.png');
    }
    /**
     * Get the formatted publication year.
     *
     * @return string
     */
    public function getFormattedYearAttribute()
    {
        return $this->tahun_terbit ? date('Y', strtotime($this->tahun_terbit)) : 'Unknown';
    }
    /**
     * Get the formatted author name.
     *
     * @return string
     */
    public function getFormattedAuthorAttribute()
    {
        return $this->author ? ucwords(strtolower($this->author)) : 'Unknown Author';
    }
    /**
     * Get the formatted publisher name.
     *
     * @return string
     */
    public function getFormattedPublisherAttribute()
    {
        return $this->penerbit ? ucwords(strtolower($this->penerbit)) : 'Unknown Publisher';
    }
    /**
     * Get the formatted description.
     *
     * @return string
     */
    public function getFormattedDescriptionAttribute()
    {
        return $this->deskripsi ? nl2br(e($this->deskripsi)) : 'No description available.';
    }
    /**
     * Get the formatted title.
     *
     * @return string
     */
    public function getFormattedTitleAttribute()
    {
        return $this->judul ? ucwords(strtolower($this->judul)) : 'Untitled Book';
    }

    public function borrowItems()
    {
        return $this->hasMany(BorrowItem::class);
    }
}
