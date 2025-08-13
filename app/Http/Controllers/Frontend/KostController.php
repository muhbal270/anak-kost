<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Kost;
use App\Models\Kota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KostController extends Controller
{
    public function index()
    {
        $kotas = Kota::all();
        
        return view('frontend.kost.index', compact('kotas'));
    }

    public function kostArea()
    {
        return view('frontend.kost.area');
    }

    public function kostDetail($slug)
    {
        $kost = Kost::with('kota', 'fasilitas')->where('slug', $slug)->firstOrFail();
        return view('frontend.kost.detail', compact('kost'));
    }
}
