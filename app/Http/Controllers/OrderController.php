<?php

namespace App\Http\Controllers;

use App\Models\Ban;
use App\Models\DanhMucMA;
use App\Models\HDTaiQuay;
use App\Models\MonAn;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = HDTaiQuay::all();
        $bans = Ban::all();
        return view('admin.order.index', compact('data', 'bans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = HDTaiQuay::all();
        $danhmucs = DanhMucMA::all();
        $monans = MonAn::all();
        $bans = Ban::get('id');
        // dd($bans);
        return view('admin.order.create', compact('data', 'danhmucs', 'monans', 'bans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = new HDTaiQuay();
        // $data->monan = $request->monan;
        // $data->soluong = $request->soluong;
        // $data->ghichu = $request->ghichu;
        // $data->save();
        // return redirect()->route('admin.order.index');
        $add = HDTaiQuay::create($request->all());
        // $add = CTHDTaiQuay::create($request->all());

        if ($add) {
            return redirect()->route('order.index')->with('success', 'Thêm mới thành công');
        }
        return redirect()->back()->with('error', 'Thêm mới thất bại');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HDTaiQuay  $hDTaiQuay
     * @return \Illuminate\Http\Response
     */
    public function show(HDTaiQuay $hDTaiQuay)
    {
        return view('admin.order.show');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HDTaiQuay  $hDTaiQuay
     * @return \Illuminate\Http\Response
     */
    public function destroy(HDTaiQuay $hDTaiQuay)
    {
        //
    }
}
