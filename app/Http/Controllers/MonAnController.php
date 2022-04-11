<?php

namespace App\Http\Controllers;

use App\Models\DanhMucMA;
use App\Models\DonViTinh;
use App\Models\MonAn;
use Illuminate\Http\Request;

class MonAnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MonAn::all();
        $danhmuc = DanhMucMA::get();
        $donvitinh = DonViTinh::get();
        // $date = date('Y-m-d');
        return view('admin.monan.index', compact('data', 'danhmuc', 'donvitinh'));
        // dd($danhmuc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // lấy danh mục món ăn
        $danhmuc = DanhMucMA::get();
        $donvitinh = DonViTinh::get();
        return view('admin.monan.create', compact('danhmuc', 'donvitinh'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $add = MonAn::create($request->all());
        if ($add) {
            return redirect()->route('monan.index')->with('success', 'Thêm mới thành công');
        }
        return redirect()->back()->with('error', 'Thêm mới thất bại');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MonAn  $monAn
     * @return \Illuminate\Http\Response
     */
    public function show($monAn)
    {
        $data = MonAn::find($monAn);
        $danhmucs = DanhMucMA::all();
        $donvitinhs = DonViTinh::all();
        return view('admin.monan.show', compact('data', 'danhmucs', 'donvitinhs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MonAn  $monAn
     * @return \Illuminate\Http\Response
     */
    public function edit(MonAn $monAn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MonAn  $monAn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $monAn)
    {
        $data = MonAn::find($monAn);
        $data->tenmonan = $request->tenmonan;
        $data->tinhtrang = $request->tinhtrang;
        $data->mota = $request->mota;
        $data->hinhanh = $request->hinhanh;
        $data->gia = $request->gia;
        $data->donvitinh = $request->donvitinh;
        $data->danhmuc = $request->danhmuc;
        $data->save();
        return redirect()->route('monan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MonAn  $monAn
     * @return \Illuminate\Http\Response
     */
    public function destroy($monAn)
    {
        $data = MonAn::find($monAn);
        $data->delete();
        return redirect()->route('monan.index');
    }
}
