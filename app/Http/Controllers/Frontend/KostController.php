<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Kost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KostController extends Controller
{
    public function index()
    {
        return view('frontend.kost.index');
    }

    public function kostArea()
    {
        return view('frontend.kost.area');
    }

    public function kostDetail($slug)
    {
        $kost = Kost::with('kota')->where('slug', $slug)->firstOrFail();
        return view('frontend.kost.detail', compact('kost'));
    }
}
