<?php

namespace App\Http\Controllers;

use App\Models\Ban;
use Illuminate\Http\Request;

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
        return view('admin.ban.index',compact('data'));
        // return Ban::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ban.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $add = Ban::create($request->all());
        if($add){
            return redirect()->route('ban.index')->with('success','Thêm mới thành công');
        }
        return redirect()->back()->with('error','Thêm mới thất bại');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ban  $ban
     * @return \Illuminate\Http\Response
     */
    // public function show(Ban $ban)
    // {
    //     return view('admin.ban.show');
    // }

    public function show($ban)
    {
        // return view('admin.ban.show');
        // return Ban::find($ban);
        $data = Ban::find($ban);
        return view('admin.ban.show', compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ban  $ban
     * @return \Illuminate\Http\Response
     */
    public function edit(Ban $ban)
    {
        return view('admin.ban.edit');
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
        $data = Ban::find($ban);
        $data->ghe = $request->ghe;
        $data->tinhtrang = $request->tinhtrang;
        $data->save();
        return redirect()->route('ban.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ban  $ban
     * @return \Illuminate\Http\Response
     */
    public function destroy($ban)
    {
        $data = Ban::find($ban);
        $data->delete();
        return redirect()->back();
    }
}
