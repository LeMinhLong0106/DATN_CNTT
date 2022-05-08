<?php

namespace App\Http\Controllers;

use App\Models\CTHD;
use App\Models\HoaDon;
use App\Models\MonAn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaoCaoController extends Controller
{
    public function index()
    {
        $soluongmon = CTHD::select('monan_id', DB::raw('sum(soluong) as total'))
            ->groupBy('monan_id')
            ->orderBy('total', 'desc')
            ->get();

        $hdtq = HoaDon::where('loaihd_id', 0)->where('tinhtrang', 1)->get();
        $tttq = HoaDon::where('loaihd_id', 0)->where('tinhtrang', 1)->sum('tongtien');

        $date_from = date('d-m-Y', strtotime('-1 month'));
        $date_to = date('d-m-Y');
        if (request()->date_from && request()->date_to) {
            $date_from =  request()->date_from;
            $date_to = request()->date_to;
            $hdtq = HoaDon::where('loaihd_id', 0)->where('tinhtrang', 1)->whereBetween('created_at', [$date_from, $date_to])->get();
            $tttq = HoaDon::whereBetween('created_at', [$date_from, $date_to])->sum('tongtien');
        }

        // $tongtienhomnay = HoaDon::select('created_at', DB::raw('sum(tongtien) as total'))
        //     ->groupBy('created_at')
        //     ->where('created_at', '=', date('Y-m-d'))
        //     ->get();

        // $tongtienhomqua = HoaDon::select('created_at', DB::raw('sum(tongtien) as total'))
        //     ->groupBy('created_at')
        //     ->where('created_at', '=', date('Y-m-d', strtotime('-1 day')))
        //     ->get();
        // dd($tongtienhomqua);

        return view('admin.baocao.index', compact('hdtq', 'tttq', 'date_from', 'date_to', 'soluongmon'));
    }

    
}
