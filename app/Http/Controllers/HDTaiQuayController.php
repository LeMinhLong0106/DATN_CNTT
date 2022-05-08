<?php

namespace App\Http\Controllers;

use App\Models\Ban;
use App\Models\CTHDTaiQuay;
use App\Models\HDTaiQuay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HDTaiQuayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = HDTaiQuay::all();
        $cthd = CTHDTaiQuay::all();
        return view('admin.hdtaiquay.index', compact('data', 'cthd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HDTaiQuay  $hDTaiQuay
     * @return \Illuminate\Http\Response
     */
    public function show($hDTaiQuay)
    {
        $data = HDTaiQuay::find($hDTaiQuay);
        $cthd = CTHDTaiQuay::where('hdtaiquay_id', $hDTaiQuay)->get();
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
        $sale = HDTaiQuay::find($id);
        $sale->tinhtrang = 1;
        $sale->nhanvien_tn = $user->name;
        $sale->save();
        $tabs = Ban::find($sale->ban_id);
        $tabs->tinhtrang = 0;
        $tabs->save();
        // return './cashier/showReceipt/' . $saleid;
        // return redirect()->route('admin.hdtaiquay.showReceipt', $id);
        // return redirect()->route('admin.hdtaiquay.index');
    }

    public function showReceipt($id)
    {
        $sale = HDTaiQuay::find($id);
        $cthd = CTHDTaiQuay::where('hdtaiquay_id', $id)->get();
        return view('admin.hdtaiquay.showReceipt', compact('sale', 'cthd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HDTaiQuay  $hDTaiQuay
     * @return \Illuminate\Http\Response
     */
    public function edit(HDTaiQuay $hDTaiQuay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HDTaiQuay  $hDTaiQuay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HDTaiQuay $hDTaiQuay)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HDTaiQuay  $hDTaiQuay
     * @return \Illuminate\Http\Response
     */
    public function destroy($hDTaiQuay)
    {
        // $data = HDTaiQuay::find($hDTaiQuay);
        // $data->delete();
        // return response()->json([
        //     'data' => $data
        // ]);
    }

    public function deleteHD($hDTaiQuay)
    {
        $data = HDTaiQuay::find($hDTaiQuay);
        $data->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Xóa thành công'
        ]);
    }

    public function deleteCTHD($id)
    {
        $cthd = CTHDTaiQuay::find($id);

        $id_hd = $cthd->hdtaiquay_id;
        $cthd->delete(); //xoa cthd

        $hd = HDTaiQuay::find($id_hd);
        $hd->tongtien = $hd->tongtien - ($cthd->giaban * $cthd->soluong); //tong tien
        $hd->save(); //luu hd

        return response()->json([
            'status' => 200,
            'message' => 'Xóa thành công'
        ]);
    }
}
