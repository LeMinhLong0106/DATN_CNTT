<?php

namespace App\Http\Controllers;

use App\Models\DSQuyen;
use Illuminate\Http\Request;

class DSQuyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DSQuyen::all();
        return view('admin.dsquyen.index', compact('data'));
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
     * @param  \App\Models\DSQuyen  $dSQuyen
     * @return \Illuminate\Http\Response
     */
    public function show(DSQuyen $dSQuyen)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DSQuyen  $dSQuyen
     * @return \Illuminate\Http\Response
     */
    public function edit(DSQuyen $dSQuyen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DSQuyen  $dSQuyen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DSQuyen $dSQuyen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DSQuyen  $dSQuyen
     * @return \Illuminate\Http\Response
     */
    public function destroy(DSQuyen $dSQuyen)
    {
        //
    }
}
