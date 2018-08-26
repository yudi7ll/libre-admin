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

    public function scopeValidateStaff($query, $request)
    {
        $request->validate([
            'nama' => 'required|max:191|string',
            'email' => 'email|required|unique:users',
            'jabatan' => 'required|string',
            'nip' => 'required|unique:users',
        ]);
    }
}
