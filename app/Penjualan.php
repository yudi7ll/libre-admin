<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $fillable = [
        'id',
        'buku_id',
        'buku',
        'jumlah',
        'tanggal_jual',
        'harga'
    ];


    public function scopeValidatePenjualan($query, $request)
    {
         // validate request
         $request->validate([
            'buku' => 'required',
            'tanggal_jual' => 'required',
            'jumlah' => 'required|string|max:5',
            'harga' => 'required'
        ]);
    }
}
