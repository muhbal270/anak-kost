<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KostFasilitas extends Model
{
    public  $fillable = [
        'kost_id',
        'fasilitas_id',
    ];

    public function kost()
    {
        return $this->belongsTo(Kost::class);
    }

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class);
    }
}
