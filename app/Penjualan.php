<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $fillable = [
        'id',
        'buku_id',
        'tanggal_jual',
        'harga'
    ];
}
