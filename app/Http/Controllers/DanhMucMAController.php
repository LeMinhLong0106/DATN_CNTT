<?php

namespace App\Http\Controllers;

use App\Models\DanhMucMA;
use Illuminate\Http\Request;

class DanhMucMAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DanhMucMA::all();
        return view('admin.danhmucmonan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.danhmucmonan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $add = DanhMucMA::create($request->all());
        if($add){
            return redirect()->route('danhmucmonan.index')->with('success','Thêm mới thành công');
        }
        return redirect()->back()->with('error','Thêm mới thất bại');
        // dd($add);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DanhMucMA  $danhMucMA
     * @return \Illuminate\Http\Response
     */
    public function show($danhMucMA)
    {
        $data = DanhMucMA::find($danhMucMA);
        return view('admin.danhmucmonan.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DanhMucMA  $danhMucMA
     * @return \Illuminate\Http\Response
     */
    public function edit(DanhMucMA $danhMucMA)
    {
        return view('admin.danhmucmonan.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DanhMucMA  $danhMucMA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $danhMucMA)
    {
        $data = DanhMucMA::find($danhMucMA);
        $data->tendm = $request->tendm;
        $data->save();
        return redirect()->route('danhmucmonan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DanhMucMA  $danhMucMA
     * @return \Illuminate\Http\Response
     */
    public function destroy($danhMucMA)
    {
        $data = DanhMucMA::find($danhMucMA);
        $data->delete();
        return redirect()->route('danhmucmonan.index');
    }
}
