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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MonAn  $monAn
     * @return \Illuminate\Http\Response
     */
    public function show(MonAn $monAn)
    {
        //
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
    public function update(Request $request, MonAn $monAn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MonAn  $monAn
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonAn $monAn)
    {
        //
    }
}
