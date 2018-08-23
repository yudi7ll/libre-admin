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
}
