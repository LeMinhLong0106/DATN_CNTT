<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use App\Models\VaiTro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $vaitros = VaiTro::all();
        return view('admin.nhanvien.index', compact('data', 'vaitros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $vaitros = VaiTro::all();
        // return view('admin.nhanvien.create', compact('vaitros'));
        $data = NhanVien::all();
        return response()->json([
            'data' => $data,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vaitros = VaiTro::all();
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            // 'email' => 'required|unique:users,email',
            // 'sdt' => 'required|unique:users,sdt',
            // 'vaitro_id' => 'required',
        ], [
            'name.required' => 'Bạn chưa nhập tên nhân viên',
            // 'name.unique' => 'Tên nhân viên đã tồn tại',
            // 'email.required' => 'Bạn chưa nhập email',
            // 'email.unique' => 'Email đã tồn tại',
            // 'sdt.required' => 'Bạn chưa nhập số điện thoại',
            // 'sdt.unique' => 'Số điện thoại đã tồn tại',
            // 'vaitro_id.required' => 'Bạn chưa chọn vai trò',
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validate->errors()->toArray(),
            ]);
        } else {
            $data = NhanVien::updateOrCreate(
                ['id' => $request->id],
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    // 'sdt' => $request->sdt,
                    'password' => bcrypt($request->password),
                    'vaitro_id' => $request->vaitro_id,
                ]
            );
            return response()->json([
                'status' => 'success',
                'data' => $data,
                'vaitros' => $vaitros,
            ]);
        }

        // dd($request->vaitro_id);
        // $nhanviens = NhanVien::create(
        //     [
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'vaitro_id' => $request->vaitro_id,
        //         'password' => bcrypt($request->password),
        //     ]
        // );
        // if ($nhanviens) {
        //     return redirect()->route('nhanvien.index')->with('success', 'Thêm mới thành công');
        // }
        // // $nhanviens->save();
        // // lưu vào bản nhanvien_vaitro
        // $nhanviens->vaitros()->attach($request->vaitro_id);// attach: lưu vào bản nhanvien_vaitro

        // return redirect()->route('nhanvien.index');
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
        return response()->json($data);

        // $data = NhanVien::find($nhanVien);
        // $vaitros = VaiTro::all();
        // $nhanvien_vaitro = $data->vaitros;
        // return view('admin.nhanvien.show', compact('nhanVien', 'data', 'vaitros', 'nhanvien_vaitro'));
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
        // $data = NhanVien::find($nhanVien);
        // $data->name = $request->name;
        // $data->email = $request->email;
        // $data->vaitro_id = $request->vaitro_id;
        // $data->password = bcrypt($request->password);
        // $data->save();
        // // // xóa tất cả các vai trò cũ
        // // $data->vaitros()->detach();
        // // // thêm vai trò mới
        // // $data->vaitros()->attach($request->vaitro_id);
        // // $data->vaitros()->sync($request->vaitro_id);// xóa tất cả các vai trò cũ, thêm vai trò mới

        // return redirect()->route('nhanvien.index');
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
        return response()->json('Xóa thành công');

        // $data = NhanVien::find($nhanVien);
        // $data->delete();
        // return redirect()->route('nhanvien.index');
    }
}
