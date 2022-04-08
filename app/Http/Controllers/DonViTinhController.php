<?php

namespace App\Http\Controllers;

use App\Models\DonViTinh;
use Illuminate\Http\Request;

class DonViTinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DonViTinh::all();
        return view('admin.donvitinh.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.donvitinh.create');
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
     * @param  \App\Models\DonViTinh  $donViTinh
     * @return \Illuminate\Http\Response
     */
    public function show(DonViTinh $donViTinh)
    {
        return view('admin.donvitinh.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DonViTinh  $donViTinh
     * @return \Illuminate\Http\Response
     */
    public function edit(DonViTinh $donViTinh)
    {
        return view('admin.donvitinh.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DonViTinh  $donViTinh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DonViTinh $donViTinh)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DonViTinh  $donViTinh
     * @return \Illuminate\Http\Response
     */
    public function destroy(DonViTinh $donViTinh)
    {
        //
    }
}
