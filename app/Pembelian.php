<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $fillable = [
        'id',
        'barang',
        'jumlah',
        'harga',
        'supplier',
        'status'
    ];
}
