<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $fillable = [
      'id',
      'judul',
      'penulis',
      'penerbit',
      'tahun_terbit',
      'jumlah',
      'genre',
      'harga'];

    public function scopeValidateBuku($query, $request)
    {
      $request->validate([
        'judul'     => 'required|max:200',
        'penulis' => 'max:100',
        'penerbit' => 'max:100',
        'tahun_terbit' => 'required|integer',
        'jumlah' => 'integer|required',
        'genre' => 'required',
        'harga' => 'required',
      ]);
    }

}
