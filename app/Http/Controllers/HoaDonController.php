<?php

namespace App\Http\Controllers;

use App\Models\Ban;
use App\Models\CTHD;
use App\Models\CTHDOnline;
use App\Models\CTHDTaiQuay;
use App\Models\HDOnline;
use App\Models\HDTaiQuay;
use App\Models\HoaDon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HoaDonController extends Controller
{
    public function indexHDTQ()
    {
        $data = HoaDon::where('loaihd_id', 0)->get();
        $cthd = CTHD::all();
        return view('admin.hdtaiquay.index', compact('data', 'cthd'));
    }

    public function showHDTQ($hDTaiQuay)
    {
        $data = HoaDon::find($hDTaiQuay);
        $cthd = CTHD::where('hoadon_id', $hDTaiQuay)->get();
        //  $html =  $this->xyz($hDTaiQuay);
        // return $html;
        return response()->json([
            'data' => $data,
            'cthd' => $cthd
        ]);
        // dd($cthd);
        // return view('admin.hdtaiquay.show', compact('data', 'cthd'));
    }

    public function thanhtoan($id)
    {
        $user = Auth::user();
        $sale = HoaDon::find($id);
        $sale->tinhtrang = 1;
        $sale->nhanvien_tn = $user->name;
        $sale->save();
        $tabs = Ban::find($sale->ban_id);
        $tabs->tinhtrang = 0;
        $tabs->save();
    }

    public function thanhtoanon($id)
    {
        $user = Auth::user();
        $sale = HoaDon::find($id);
        $sale->tinhtrang = 1;
        $sale->nhanvien_tn = $user->name;
        $sale->save();
        return $this->indexHDO();
    }

    public function showReceipt($id)
    {
        $sale = HoaDon::find($id);
        $cthd = CTHD::where('hoadon_id', $id)->get();
        return view('admin.hdtaiquay.showReceipt', compact('sale', 'cthd'));
    }

    public function deleteHD($hDTaiQuay)
    {
        $data = HoaDon::find($hDTaiQuay);
        $data->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Xóa thành công'
        ]);
    }

    public function deleteCTHD($id)
    {
        $cthd = CTHD::find($id);

        $id_hd = $cthd->hoadon_id;
        $cthd->delete(); //xoa cthd

        $hd = HoaDon::find($id_hd);
        $hd->tongtien = $hd->tongtien - ($cthd->giaban * $cthd->soluong); //tong tien
        $hd->save(); //luu hd

        return response()->json([
            'status' => 200,
            'message' => 'Xóa thành công'
        ]);
    }

    public function indexHDO()
    {
        $data = HoaDon::where('loaihd_id',1)->get();

        return view('admin.hdonline.index', compact('data'));
    }

    public function showHDO($hDOnline)
    {
        $data = HoaDon::find($hDOnline);
        $cthd = CTHD::where('hoadon_id', $hDOnline)->get();
        // dd($cthd);
        return view('admin.hdonline.show', compact('data', 'cthd'));
    }

    public function deleteHDO($hDOnline)
    {
        $data = HoaDon::find($hDOnline);
        $data->delete();
        return redirect()->back();
    }
}
