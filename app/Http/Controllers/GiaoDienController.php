<?php

namespace App\Http\Controllers;

use App\Models\DanhMucMA;
use App\Models\MonAn;
use Illuminate\Http\Request;

class GiaoDienController extends Controller
{
    public function majestic()
    {
        $monan_moi = MonAn::where('danhmuc', '=', 1)->orderBy('created_at', 'desc')->take(8)->get();
        $monan_db = MonAn::where('danhmuc', '=', 6)->get();
        return view('majestic', compact('monan_db', 'monan_moi'));
    }
    
    public function menu()
    {
        $data = DanhMucMA::all();
        $monans = MonAn::all();
        // $monans = MonAn::where('danhmuc', '=', 1)->get();
        // dd($monans);
        return view('menu', compact('data', 'monans'));
        // dd($monans);
    }

    public function detail($id)
    {
        $data = MonAn::find($id);
        return view('detail', compact('data'));
    }

    public function about()
    {
        return view('about');
    }

    public function search(Request $request)
    {
        $keyword = $request->timkiem;
        $data = $keyword;
        $monans = MonAn::where('tenmonan', 'like', '%'.$keyword.'%')->get();
        return view('search', compact('monans', 'data'));
        // dd($monans);
    }
}
