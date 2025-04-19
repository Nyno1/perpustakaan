<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $fillable = [
        'judul_buku',
        'penulis',
        'kategori',
        'tahun_terbit',
        'jumlah_stok',
        'status',
        'deskripsi',
        'loan_status',
    ];

    public function loans()
    {
        return $this->hasMany(pinjambuku::class);
    }
}
