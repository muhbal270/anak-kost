<?php

namespace App\Models;

use App\Models\Kota;
use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    protected $fillable = [
        'kota_id',
        'nama_kost',
        'gambar_kost1',
        'gambar_kost2',
        'gambar_kost3',
        'slug',
        'alamat',
        'map',
        'harga',
        'jumlah_kamar',
        'deskripsi',
    ];

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }

    public function fasilitas()
    {
        return $this->belongsToMany(Fasilitas::class, 'kost_fasilitas', 'kost_id', 'fasilitas_id');
    }
}
