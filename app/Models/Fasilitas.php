<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $fillable = [
        'nama_fasilitas',
        'icon_fasilitas',
    ];

    public function kosts()
    {
        return $this->belongsToMany(Kost::class, 'kost_fasilitas', 'fasilitas_id', 'kost_id');
    }
}
