<?php

namespace App\Http\Controllers;

use App\Models\DanhMucMA;
use App\Models\DonViTinh;
use App\Models\MonAn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MonAnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = MonAn::all();

        // $date = date('Y-m-d');
        return view('admin.monan.index', compact('data'));
        // dd($danhmuc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // lấy danh mục món ăn
        $danhmuc = DanhMucMA::get();
        $donvitinh = DonViTinh::get();
        return view('admin.monan.create', compact('danhmuc', 'donvitinh'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $add = new MonAn();
        // $add->tenmonan = $request->user()->id;//lấy đc id của người dùng
        $add->tenmonan = $request->tenmonan;
        $add->gia = $request->gia;
        $add->mota = $request->mota;
        $add->tinhtrang = $request->tinhtrang;
        $add->danhmuc = $request->danhmuc;
        $add->donvitinh = $request->donvitinh;

        if ($request['hinhanh']) {
            $hinhanh = $request['hinhanh'];
            $name = $hinhanh->getClientOriginalName();
            Storage::disk('public')->put($name, File::get($hinhanh));
            $add->hinhanh =  $name;
        } else {
            $add->hinhanh = 'default.jpg';
        }
        $add->save();
        return redirect()->route('monan.index')->with('success', 'Thêm thành công');

        // thêm data vào bảng product_image https://www.youtube.com/watch?v=3WX9glyvm1c&list=PL3V6a6RU5ogEAKIuGjfPEJ77FGmEAQXTT&index=32
        // if($request->has('hinhanh')){
        //     foreach($request->img_path as $imgp){
        //         $dataa = ...
        //         ProductImage::create([
        //             'product_id'=> $product->id,
        //         ])
        //     }
        // }

        // foreach($request->categorys as $category){
        //     //firstOrCreate là trả về 1 object hoặc tạo mới
        //     $data = MonAn::firstOrCreate(['tenmonan' => $request->tenmonan, 'danhmuc' => $category]);
        //     // tạo mới bảng ghi trong bảng MonAnTag
        //     MonAnTag::create([
        //         'monan_id' => $data->id,
        //         'danhmuc_id' => $category
        //     ]);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MonAn  $monAn
     * @return \Illuminate\Http\Response
     */
    public function show($monAn)
    {
        $data = MonAn::find($monAn);
        $danhmucs = DanhMucMA::all();
        $donvitinhs = DonViTinh::all();
        return view('admin.monan.show', compact('data', 'danhmucs', 'donvitinhs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MonAn  $monAn
     * @return \Illuminate\Http\Response
     */
    public function edit(MonAn $monAn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MonAn  $monAn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $monAn)
    {
        $data = MonAn::find($monAn);
        $data->tenmonan = $request->tenmonan;
        $data->tinhtrang = $request->tinhtrang;
        $data->mota = $request->mota;
        // nếu thêm ảnh mới thì xóa ảnh cũ
        if ($request['hinhanh']) {
            unlink('images/' . $data->hinhanh);
            $hinhanh = $request['hinhanh'];
            $name = $hinhanh->getClientOriginalName();
            Storage::disk('public')->put($name, File::get($hinhanh));
            $data->hinhanh = $name;
        } else {
            $data->hinhanh = $data->hinhanh;
        }

        $data->gia = $request->gia;
        $data->donvitinh = $request->donvitinh;
        $data->danhmuc = $request->danhmuc;
        $data->save();
        return redirect()->route('monan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MonAn  $monAn
     * @return \Illuminate\Http\Response
     */
    public function destroy($monAn)
    {
        $data = MonAn::find($monAn);
        $data->delete();
        return redirect()->route('monan.index');
    }
}
