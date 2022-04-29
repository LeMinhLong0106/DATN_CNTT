<?php

namespace App\Http\Controllers;

use App\Models\Ban;
use App\Models\CTHDTaiQuay;
use App\Models\DanhMucMA;
use App\Models\HDTaiQuay;
use App\Models\MonAn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = HDTaiQuay::all();
        $bans = Ban::all();
        return view('admin.order.index', compact('data', 'bans'));
    }

    public function giaodienDB()
    {  
        $data = HDTaiQuay::all();
        // $cthd = CTHDTaiQuay::orderBy('monan_id', 'desc')->get();// sếp xếp theo id món ăn giảm dần
        $cthd = CTHDTaiQuay::orderBy('monan_id')->get();// sếp xếp theo id món ăn tăng dần
        return view('admin.order.giaodienDB', compact('data', 'cthd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = HDTaiQuay::all();
        $danhmucs = DanhMucMA::all();
        $monans = MonAn::all();
        $bans = Ban::get('id');
        // dd($bans);
        return view('admin.order.create', compact('data', 'danhmucs', 'monans', 'bans'));
    }

    public function table_status()
    {
        $data = HDTaiQuay::all();
        $danhmucs = DanhMucMA::all();
        $monans = MonAn::all();
        $bans = Ban::all();
        return view('admin.order.table_status', compact('data', 'bans', 'monans', 'danhmucs'));
    }

    public function order_status()
    {
        $data = HDTaiQuay::all();
        $bans = Ban::all();
        $saleDetails =  CTHDTaiQuay::all();
        return view('admin.order.order_status', compact('data', 'bans', 'saleDetails'));
    }

    public function getSaleDetails($table_id) //nhấn vào bàn thì hiển thị danh sách món ăn
    {
        $sale =  HDTaiQuay::where('ban_id', $table_id)->where('tinhtrang', 0)->first();//lấy hóa đơn có trạng thái 0
        $html = " ";
        if ($sale) {
            $sale_id = $sale->id;
            $html =  $this->xyz($sale_id);
        } else {
            $html = "Mời bạn chọn món ăn";
        }
        return $html;
    }

    public function orderFood(Request $request)
    {
        $id_mon = $request->product_name;
        $table_id = $request->table_id;

        $monans = MonAn::find($id_mon);

        $sale = HDTaiQuay::where('ban_id', $table_id)->where('tinhtrang', 0)->first();
        if (!$sale) {
            $user = Auth::user();
            $sale = new HDTaiQuay;
            $sale->ban_id = $table_id;
            $sale->nhanvien_id = $user->id;
            $sale->save();

            // lưu bàn
            $table = Ban::find($table_id);
            $table->tinhtrang = 1; //đã đặt
            $table->save();
        } else {
            $sale_id =  $sale->id;
        }
        // lưu chi tiết hóa đơn
        $saleDetail = new CTHDTaiQuay;
        $saleDetail->hdtaiquay_id = $sale_id;
        $saleDetail->monan_id = $monans->id;
        $saleDetail->giaban = $monans->gia;
        $saleDetail->soluong = $request->product_quantity;
        $saleDetail->ghichu = $request->product_note;

        $saleDetail->save();

        $sale->tongtien = $sale->tongtien + ($monans->gia * $request->product_quantity);
        $sale->save();
        $html =  $this->xyz($sale_id);
        return $html;
    }

    // public function confirmOrder(Request $request)
    // {
    //     $sale_id = $request->sale_id;
    //     $sale = HDTaiQuay::find($sale_id);
    //     $sale->tinhtrang = 1;
    //     $sale->save();
    //     $html =  $this->xyz($sale_id);
    //     return $html;
    // }



    private function xyz($sale_id)
    {
        // hiển thị bên chi tiết
        $saleDetails =  CTHDTaiQuay::where('hdtaiquay_id', $sale_id)->get();
        $html = " ";

        $html .= "<table class='table table-responsive'>
        <thead>
            <tr> 
                <th>#</th>
                <th>Tên món ăn</th>
                <th>Số lượng</th>
                <th>Ghi chú</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>";

        foreach ($saleDetails as $sd) {
            $html .= "<tr>
            <td>" . $sd->id . "</td>
            <td>" . $sd->monanss->tenmonan . "</td>
            <td>" . $sd->soluong . "</td>
            <td>" . $sd->ghichu  . "</td>
            <td>" . $sd->soluong * $sd->giaban  . "</td>";
            if ($sd->tinhtrang == 0) {
                $html .= "<td>Đang nấu</td>";
            } else {
                $html .= "<td>Đã nấu xong</td>";
            }

            if ($sd->tinhtrang == 0) {
                $html .=  "<td>
                <button data-id='" . $sd->id . "' class='btn btn-danger btnDeleteOrder'><i class='fa fa-trash' aria-hidden='true'></i></button>
                <button data-id='" . $sd->id . "' class='btn btn-primary btnConfirmOrder'>Xac nhan</button>
                
                </td>";
            } else {
                $html .=  "<td><i class='fa fa-check' aria-hidden='true'></i></td>";
            }

            $html .= "
            </tr>";
        }
        $html .= "</tbody>
            </table>";

        $sale_tp = HDTaiQuay::find($sale_id);
        $html .= "<h3>Tong tien: " . $sale_tp->tongtien . "</h3>";

        return  $html;
    }

    public function confirmOrder(Request $request)
    {
        $sale_id = $request->sale_id;
        $sale = CTHDTaiQuay::find($sale_id);
        $sale->tinhtrang = 1;
        $sale->save();
        // $html =  $this->xyz($sale_id);
        // return $html;
    }

    public function deleteOrder(Request $request)
    {
        // $sale_id = $request->sale_id;
        // $saleDetail = CTHDTaiQuay::find($sale_id);
        // $saleDetail->delete();
        // $sale_id = $saleDetail->hdtaiquay_id;

        // $html =  $this->xyz($sale_id);
        // return $html;

        $id_cthd = $request->sale_id;
        $cthd = CTHDTaiQuay::find($id_cthd);

        $id_hd = $cthd->hdtaiquay_id;
        $cthd->delete(); //xoa cthd

        $hd = HDTaiQuay::find($id_hd);
        $hd->tongtien = $hd->tongtien - ($cthd->giaban * $cthd->soluong); //tong tien
        $hd->save(); //luu hd
        $html =  $this->xyz($id_hd);
        return  $html;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = new HDTaiQuay();
        // $data->monan = $request->monan;
        // $data->soluong = $request->soluong;
        // $data->ghichu = $request->ghichu;
        // $data->save();
        // return redirect()->route('admin.order.index');
        $add = HDTaiQuay::create($request->all());
        // $add = CTHDTaiQuay::create($request->all());

        if ($add) {
            return redirect()->route('order.index')->with('success', 'Thêm mới thành công');
        }
        return redirect()->back()->with('error', 'Thêm mới thất bại');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HDTaiQuay  $hDTaiQuay
     * @return \Illuminate\Http\Response
     */
    public function show(HDTaiQuay $hDTaiQuay)
    {
        return view('admin.order.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HDTaiQuay  $hDTaiQuay
     * @return \Illuminate\Http\Response
     */
    public function edit(HDTaiQuay $hDTaiQuay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HDTaiQuay  $hDTaiQuay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HDTaiQuay $hDTaiQuay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HDTaiQuay  $hDTaiQuay
     * @return \Illuminate\Http\Response
     */
    public function destroy(HDTaiQuay $hDTaiQuay)
    {
        //
    }
}
