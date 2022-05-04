<?php

namespace App\Http\Controllers;

use App\Models\Ban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ban::all(); // lấy toàn bộ dữ liệu từ bảng ban
        return view('admin.ban.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        $data = Ban::all();
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
            'ghe' => 'required',
        ], [
            'ghe.required' => 'Bạn chưa nhập số ghế',
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validate->errors()->toArray(),
            ]);
        } else {
            $data = Ban::updateOrCreate(
                ['id' => $request->id],
                [
                    'ghe' => $request->ghe,
                    'tinhtrang' => $request->tinhtrang
                ]
            );
            return response()->json($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ban  $ban
     * @return \Illuminate\Http\Response
     */

    public function show($ban)
    {
        $data = Ban::find($ban);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ban  $ban
     * @return \Illuminate\Http\Response
     */

    public function edit(Ban $ban)
    {
        return response()->json($ban);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ban  $ban
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ban)
    {
        // $request->validate([
        //     'ghe' => 'required',
        // ], [
        //     'ghe.required' => 'Bạn chưa nhập số ghế',
        // ]);

        // $data = Ban::find($ban);
        // $data->ghe = $request->ghe;
        // $data->tinhtrang = $request->tinhtrang;
        // $data->save();
        // $request->session()->flash('status', 'Cập nhật thành công!');

        // return redirect()->route('ban.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ban  $ban
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ban $ban)
    {
        $ban->delete();
        return response()->json('success');
        // $data = Ban::find($ban);
        // $data->delete();
        // session()->flash('status', ' Xóa thành công!');

        // return redirect()->back();

        // $data = Ban::find($ban);

        // if ($data->delete()) {
        //     return response()->json([
        //         'data' => $data,
        //         'status_code' => 200,
        //         'message' => 'Xóa thành công'
        //     ]);
        // }
        // return response()->json([
        //     'data' => null,
        //     'status_code' => 404,
        //     'message' => 'Xóa thất bại'
        // ]);
    }
}
