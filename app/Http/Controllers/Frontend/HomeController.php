<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Kota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $kotas = Kota::latest()->paginate(4);

        return view('frontend.home', compact('kotas'));
    }
}
