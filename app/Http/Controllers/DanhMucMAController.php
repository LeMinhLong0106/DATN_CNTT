<?php

namespace App\Http\Controllers;

use App\Models\DanhMucMA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DanhMucMAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DanhMucMA::all(); // lấy toàn bộ dữ liệu từ bảng ban
        return view('admin.danhmucmonan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DanhMucMA::all();
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
        $validate = Validator::make($request->all(), [
            'tendm' => 'required|unique:danh_muc_m_a_s,tendm',
        ], [
            'tendm.required' => 'Bạn chưa nhập tên danh mục',
            'tendm.unique' => 'Tên danh mục đã tồn tại',
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validate->errors()->toArray(),
            ]);
        } else {
            $data = DanhMucMA::updateOrCreate(
                ['id' => $request->id],
                [
                    'tendm' => $request->tendm,
                ]
            );
            return response()->json($data);
        }
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
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DanhMucMA  $danhMucMA
     * @return \Illuminate\Http\Response
     */

    public function edit(DanhMucMA $danhMucMA)
    {
        // return response()->json($danhMucMA);
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
        return response()->json('Xóa thành công');
    }
}
