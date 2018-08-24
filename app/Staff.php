<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'email', 'jabatan', 'nip',
    ];
}
