<?php

namespace App\Http\Controllers;

use App\Models\CTHDOnline;
use App\Models\HDOnline;
use Illuminate\Http\Request;

class HDOnlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = HDOnline::all();

        return view('admin.hdonline.index', compact('data'));
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
     * @param  \App\Models\HDOnline  $hDOnline
     * @return \Illuminate\Http\Response
     */
    public function show($hDOnline)
    {
        $data = HDOnline::find($hDOnline);
        $cthd = CTHDOnline::where('hdonline_id', $hDOnline)->get();
        // dd($cthd);
        return view('admin.hdonline.show', compact('data', 'cthd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HDOnline  $hDOnline
     * @return \Illuminate\Http\Response
     */
    public function edit(HDOnline $hDOnline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HDOnline  $hDOnline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HDOnline $hDOnline)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HDOnline  $hDOnline
     * @return \Illuminate\Http\Response
     */
    public function destroy($hDOnline)
    {
        $data = HDOnline::find($hDOnline);
        $data->delete();
        return redirect()->back();
    }
}
