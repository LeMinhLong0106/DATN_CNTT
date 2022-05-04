<?php

namespace App\Http\Controllers;

use App\Models\Quyen;
use Illuminate\Http\Request;

class QuyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Quyen::all();
        return view('admin.quyen.index', compact('data'));
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
     * @param  \App\Models\Quyen  $quyen
     * @return \Illuminate\Http\Response
     */
    public function show(Quyen $quyen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quyen  $quyen
     * @return \Illuminate\Http\Response
     */
    public function edit(Quyen $quyen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quyen  $quyen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quyen $quyen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quyen  $quyen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quyen $quyen)
    {
        //
    }
}
