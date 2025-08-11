<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $fillable = [
        'nama_kota',
        'gambar_kota',
        'slug',
    ];

    public function kosts()
    {
        return $this->hasMany(Kost::class);
    }
}
