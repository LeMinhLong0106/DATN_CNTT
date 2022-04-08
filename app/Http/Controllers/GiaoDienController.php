<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GiaoDienController extends Controller
{
    public function majestic()
    {
        return view('majestic');
    }
    
    public function menu()
    {
        return view('menu');
    }

    public function about()
    {
        return view('about');
    }
}
