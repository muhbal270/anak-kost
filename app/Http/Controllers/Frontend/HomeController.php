<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Kost;
use App\Models\Kota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $kosts = Kost::with('kota')->latest()->paginate(3);

        $kotas = Kota::withCount('kosts')->latest()->paginate(4);

        return view('frontend.home', compact('kotas', 'kosts'));
    }
}
