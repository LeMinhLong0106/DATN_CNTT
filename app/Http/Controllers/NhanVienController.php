<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use App\Models\VaiTro;
use Illuminate\Http\Request;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = NhanVien::all();
        return view('admin.nhanvien.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vaitros = VaiTro::all();
        return view('admin.nhanvien.create', compact('vaitros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nhanviens = NhanVien::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]
        );
        // lưu vào bản nhanvien_vaitro
        $nhanviens->vaitros()->attach($request->vaitro_id);// attach: lưu vào bản nhanvien_vaitro

        return redirect()->route('nhanvien.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NhanVien  $nhanVien
     * @return \Illuminate\Http\Response
     */
    public function show($nhanVien)
    {
        $data = NhanVien::find($nhanVien);
        $vaitros = VaiTro::all();
        $nhanvien_vaitro = $data->vaitros;
        return view('admin.nhanvien.show', compact('nhanVien', 'data', 'vaitros', 'nhanvien_vaitro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NhanVien  $nhanVien
     * @return \Illuminate\Http\Response
     */
    public function edit(NhanVien $nhanVien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NhanVien  $nhanVien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nhanVien)
    {
        $data = NhanVien::find($nhanVien);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        // // xóa tất cả các vai trò cũ
        // $data->vaitros()->detach();
        // // thêm vai trò mới
        // $data->vaitros()->attach($request->vaitro_id);
        $data->vaitros()->sync($request->vaitro_id);// xóa tất cả các vai trò cũ, thêm vai trò mới

        return redirect()->route('nhanvien.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NhanVien  $nhanVien
     * @return \Illuminate\Http\Response
     */
    public function destroy($nhanVien)
    {
        $data = NhanVien::find($nhanVien);
        $data->delete();
        return redirect()->route('nhanvien.index');
    }
}
