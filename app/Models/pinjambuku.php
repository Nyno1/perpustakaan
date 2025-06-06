<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pinjambuku extends Model
{
    protected $fillable = [
        'user_id',
        'book_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status'
    ];

    public function user() {
       return $this->belongsTo(user::class);
    }

    public function book() {
       return $this->belongsTo(book::class);
    }
}
    
