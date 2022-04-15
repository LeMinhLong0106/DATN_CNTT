<?php

namespace App\Http\Controllers;

use App\Models\Quyen;
use App\Models\VaiTro;
use Illuminate\Http\Request;

class VaiTroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = VaiTro::all();
        return view('admin.vaitro.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quyenCha = Quyen::where('parent_id', 0)->get();
        return view('admin.vaitro.create', compact('quyenCha'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vaitro = VaiTro::create(
            [
                'tenvaitro' => $request->tenvaitro,
                'mota' => $request->mota,
            ]
        );
        // lưu vào bản quyền
        $vaitro->quyens()->attach($request->quyen_id);
        return redirect()->route('vaitro.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VaiTro  $vaiTro
     * @return \Illuminate\Http\Response
     */
    public function show($vaiTro)
    {
        $data = VaiTro::find($vaiTro);
        $quyenCha = Quyen::where('parent_id', 0)->get();
        $quyenCheck = $data->quyens;
        return view('admin.vaitro.show', compact('quyenCha', 'data', 'quyenCheck'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VaiTro  $vaiTro
     * @return \Illuminate\Http\Response
     */
    public function edit(VaiTro $vaiTro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VaiTro  $vaiTro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $vaiTro)
    {
        $data = VaiTro::find($vaiTro);
        $data->tenvaitro = $request->tenvaitro;
        $data->mota = $request->mota;
        $data->save();
        // lưu vào bản quyền
        $data->quyens()->sync($request->quyen_id);
        return redirect()->route('vaitro.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VaiTro  $vaiTro
     * @return \Illuminate\Http\Response
     */
    public function destroy(VaiTro $vaiTro)
    {
        //
    }
}
