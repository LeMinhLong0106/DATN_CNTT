<?php

namespace App\Http\Controllers;

use App\Models\DanhMucMA;
use App\Models\DonViTinh;
use App\Models\MonAn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        $danhmuc = DanhMucMA::get();
        $donvitinh = DonViTinh::get();
        return view('admin.monan.index', compact('data', 'danhmuc', 'donvitinh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // lấy danh mục món ăn
        $danhmuc = DanhMucMA::all();
        // $donvitinh = DonViTinh::get();
        // return view('admin.monan.create', compact('danhmuc', 'donvitinh'));
        $data = MonAn::all();
        return response()->json([
            'data' => $data,
            'danhmuc' => $danhmuc,
        ]);
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
            'tenmonan' => 'required|unique:mon_ans,tenmonan',
            'gia' => 'required|numeric',
            'donvitinh' => 'required',
            'danhmuc' => 'required',
            'hinhanh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'tenmonan.required' => 'Bạn chưa nhập tên món ăn',
            'tenmonan.unique' => 'Tên món ăn đã tồn tại',
            'gia.required' => 'Bạn chưa nhập giá',
            'gia.numeric' => 'Giá phải là số',
            'donvitinh.required' => 'Bạn chưa chọn đơn vị tính',
            'danhmuc.required' => 'Bạn chưa chọn danh mục',
            'hinhanh.required' => 'Bạn chưa chọn ảnh',
            // 'anh.image' => 'Ảnh phải là hình ảnh',
            // 'anh.mimes' => 'Ảnh phải có đuôi jpeg,png,jpg,gif,svg',
            // 'anh.max' => 'Ảnh phải có dung lượng nhỏ hơn 2MB',
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validate->errors()->toArray(),
            ]);
        } else {
            $data = new MonAn;
            $data->tenmonan = $request->tenmonan;
            $data->gia = $request->gia;
            $data->mota = $request->mota;
            $data->thoigian = $request->thoigian;
            $data->donvitinh = $request->donvitinh;
            $data->tinhtrang = $request->tinhtrang;
            $data->danhmuc = $request->danhmuc;
            
            if ($request->hasFile('hinhanh')) {
                $file = $request->file('hinhanh');
                $name = $file->getClientOriginalName();
                $image = $name;
                $file->move('images', $image);
                $data->hinhanh = $image;
            }
            $data->save();

            return response()->json([
                'status' => 200,
                'message' => 'Thêm món ăn thành công',
            ]);
            // $list_danhmuc = DanhMucMA::all();
            // $data = MonAn::updateOrCreate(
            //     ['id' => $request->id],
            //     [
            //         'tenmonan' => $request->tenmonan,
            //         'gia' => $request->gia,
            //         'mota' => $request->mota,
            //         'tinhtrang' => $request->tinhtrang,
            //         'donvitinh' => $request->donvitinh,
            //         'danhmuc' => $request->danhmuc,
            //         'hinhanh' => $request->hinhanh,
            //     ]
            // );
            // return response()->json([
            //     'list_danhmuc' => $list_danhmuc,
            //     'data' => $data,
            // ]);
        }

        // $add = new MonAn();
        // // $add->tenmonan = $request->user()->id;//lấy đc id của người dùng
        // $add->tenmonan = $request->tenmonan;
        // $add->gia = $request->gia;
        // $add->mota = $request->mota;
        // $add->tinhtrang = $request->tinhtrang;
        // $add->danhmuc = $request->danhmuc;
        // $add->donvitinh = $request->donvitinh;

        // if ($request['hinhanh']) {
        //     $hinhanh = $request['hinhanh'];
        //     $name = $hinhanh->getClientOriginalName();
        //     Storage::disk('public')->put($name, File::get($hinhanh));
        //     $add->hinhanh =  $name;
        // } else {
        //     $add->hinhanh = 'default.jpg';
        // }
        // $add->save();
        // return redirect()->route('monan.index')->with('success', 'Thêm thành công');

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
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MonAn  $monAn
     * @return \Illuminate\Http\Response
     */
    public function edit($monAn)
    {
        $data = MonAn::find($monAn);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MonAn  $monAn
     * @return \Illuminate\Http\Response
     */

    public function updateMonAn(Request $request, $monAn)
    {
        $validate = Validator::make($request->all(), [
            'gia' => 'numeric',
        ], [
            'gia.numeric' => 'Giá phải là số',
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validate->errors()->toArray(),
            ]);
        } else {
            $data = MonAn::find($monAn);
            $data->tenmonan = $request->tenmonan;
            $data->gia = $request->gia;
            $data->mota = $request->mota;
            $data->thoigian = $request->thoigian;
            $data->donvitinh = $request->donvitinh;
            $data->tinhtrang = $request->tinhtrang;
            $data->danhmuc = $request->danhmuc;
            if ($request->hasFile('hinhanh')) {
                $path = 'images/' . $data->hinhanh;
                if (File::exists($path)) {
                    File::delete($path);
                }
                $file = $request->file('hinhanh');
                $name = $file->getClientOriginalName();
                $image = $name;
                $file->move('images', $image);
                $data->hinhanh = $image;
            }
            $data->save();

            return response()->json([
                'status' => 200,
                'message' => 'Caapj nhaatj ăn thành công',
            ]);
        }
    }

    public function update(Request $request, $monAn)
    {
        $validate = Validator::make($request->all(), [
            'gia' => 'numeric',
        ], [
            'gia.numeric' => 'Giá phải là số',
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validate->errors()->toArray(),
            ]);
        } else {
            $data = MonAn::find($monAn);
            $data->tenmonan = $request->tenmonan;
            $data->gia = $request->gia;
            $data->mota = $request->mota;
            $data->thoigian = $request->thoigian;
            $data->donvitinh = $request->donvitinh;
            $data->tinhtrang = $request->tinhtrang;
            $data->danhmuc = $request->danhmuc;
            if ($request->hasFile('hinhanh')) {
                $path = 'images/' . $data->hinhanh;
                if (File::exists($path)) {
                    File::delete($path);
                }
                $file = $request->file('hinhanh');
                $name = $file->getClientOriginalName();
                $image = $name;
                $file->move('images', $image);
                $data->hinhanh = $image;
            }
            $data->save();

            return response()->json([
                'status' => 200,
                'message' => 'Thêm món ăn thành công',
            ]);
        }
        // $data = MonAn::find($monAn);
        // $data->tenmonan = $request->tenmonan;
        // $data->tinhtrang = $request->tinhtrang;
        // $data->mota = $request->mota;
        // // nếu thêm ảnh mới thì xóa ảnh cũ
        // if ($request['hinhanh']) {
        //     unlink('images/' . $data->hinhanh);
        //     $hinhanh = $request['hinhanh'];
        //     $name = $hinhanh->getClientOriginalName();
        //     Storage::disk('public')->put($name, File::get($hinhanh));
        //     $data->hinhanh = $name;
        // } else {
        //     $data->hinhanh = $data->hinhanh;
        // }

        // $data->gia = $request->gia;
        // $data->donvitinh = $request->donvitinh;
        // $data->danhmuc = $request->danhmuc;
        // $data->save();
        // return redirect()->route('monan.index');
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
        // $path = 'images/' . $data->hinhanh;
        // if (File::exists($path)) {
        //     File::delete($path);
        // }
        $data->delete();
        return response()->json('Xóa thành công');
    }
}
