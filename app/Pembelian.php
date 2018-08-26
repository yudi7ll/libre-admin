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

    
    public function scopeValidatePembelian($query, $request)
    {
         // validate request
         $request->validate([
            'barang' => 'required',
            'jumlah' => 'required|integer',
            'harga' => 'required',
            'supplier' => 'string|required',
            'status' => 'integer|required'
        ]);
    }
}
