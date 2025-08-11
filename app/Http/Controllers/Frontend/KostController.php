<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function kostDetail()
    {
        return view('frontend.kost.detail');
    }
}
