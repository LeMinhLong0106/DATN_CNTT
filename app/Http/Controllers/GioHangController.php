<?php

namespace App\Http\Controllers;

use App\Models\CTHD;
use App\Models\CTHDOnline;
use App\Models\HDOnline;
use App\Models\HoaDon;
use App\Models\KhachHang;
use App\Models\MonAn;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GioHangController extends Controller
{
    public function getAddCart($id)
    {
        $data = MonAn::find($id);

        CartFacade::add([
            'id' => $data->id,
            'name' => $data->tenmonan,
            'price' => $data->gia,
            'quantity' => 1,
            'attributes' => [
                'hinhanh' => $data->hinhanh,
                'note' => 'Ghi chú',
            ],
        ]);
        // dd(CartFacade::getContent());
        return redirect()->back();
    }

    public function getAddInDetail(Request $request){
        // CartFacade::clear();

        CartFacade::add([
            'id' => $request->monanID,
            'name' => $request->tenmonan,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => [
                'hinhanh' => $request->hinhanh,
                'note' => $request->ghichu,
            ],
        ]);
        return redirect()->back();
        // dd(CartFacade::getContent());
        // dd($request->all());
    }

    public function showCart()
    {
        $count = CartFacade::getTotalQuantity();
        $total = CartFacade::getTotal();
        $data = CartFacade::getContent();
        // dd($data);
        return view('cart.show', compact('data', 'total', 'count'));
    }

    public function getDeleteCart($id)
    {
        if ($id == 'all') {
            CartFacade::clear();
        } else {
            CartFacade::remove($id);
        }
        return redirect()->route('cart.show');
    }

    public function getUpdateCart(Request $request)
    {
        CartFacade::update(
            $request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
                // 'attributes' => array(
                //     'note' => $request->note,
                // )
            ),
        );
    }


    public function loginCheck()
    {
        // if (Session::has('khachhang')) {
        //     return redirect()->route('cart.show');
        // } else {
        //     return view('cart.login_checkout');
        // }
        return view('cart.login_checkout');
    }

    public function registerCheck()
    {
        return view('cart.register_checkout');
    }

    public function addKH(Request $request)
    {
        $khachhang = new KhachHang;
        $khachhang->tenkh = $request->tenkh;
        $khachhang->email = $request->email;
        $khachhang->diachi = $request->diachi;
        $khachhang->sdt = $request->sdt;
        $khachhang->matkhau = $request->matkhau;
        // $khachhang->matkhau = bcrypt($request->matkhau);
        $khachhang->save();

        Session::put('id', $khachhang);
        Session::put('tenkh', $khachhang->tenkh);
        return redirect()->route('cart.show');
    }

    public function loginKhach(Request $request)
    {
        $email = $request->email_account;
        // $matkhau = bcrypt($request->password_account);
        $matkhau = $request->password_account;

        $khachhang = KhachHang::where('email', $email)->where('matkhau', $matkhau)->first();
        if ($khachhang) {
            Session::put('id', $khachhang->id);
            Session::put('tenkh', $khachhang->tenkh);
            return redirect()->route('cart.show');
        } else {
            return redirect()->back();
        }

        // $khachhang = KhachHang::where('email', $request->email_account)->first();
        // if ($khachhang) {
        //     if (password_verify($request->password_account, $khachhang->matkhau)) {
        //         Session::put('id', $khachhang->id);
        //         Session::put('tenkh', $khachhang->tenkh);
        //         return redirect()->route('cart.show');
        //     } else {
        //         return redirect()->back()->with('thongbao', 'Mật khẩu không đúng');
        //     }
        // } else {
        //     return redirect()->back()->with('thongbao', 'Email không tồn tại');
        // }

    }

    public function logOut()
    {
        Session::forget('id');
        Session::forget('tenkh');
        CartFacade::clear();//xóa giỏ hàng
        return redirect()->route('cart.show');
    }

    public function addOrder(Request $request)
    {
        $khachhang = KhachHang::find(Session::get('id'));//lấy id khách hàng đã đăng nhập
        // $kh = $khachhang[0]->id;
        // dd($khachhang->id);
        //tạo mới đơn hàng
        $order = new HoaDon;
        $order->khachhang_id = $khachhang->id;
        $order->tongtien = CartFacade::getTotal();
        $order->tinhtrang = 0;
        $order->ghichu = $request->ghichu;
        $order->hoten = $request->hoten;
        $order->diachi = $request->diachi;
        $order->sdt = $request->sdt;
        $order->loaihd_id = 1;
        $order->save();
        
        //tạo mới đơn hàng chi tiết
        $order_id = $order->id;
        $content = CartFacade::getContent();
        foreach ($content as $value) {
            $order_detail = new CTHD;
            $order_detail->hoadon_id = $order_id;
            $order_detail->monan_id = $value->id;
            $order_detail->soluong = $value->quantity;
            $order_detail->giaban = $value->price;
            $order_detail->save();
        }
        CartFacade::clear();//xóa giỏ hàng

        return redirect()->route('cart.show');
    }

    // public function getCheckout()
    // {
    //     $count = CartFacade::getTotalQuantity();
    //     $total = CartFacade::getTotal();
    //     $data = CartFacade::getContent();
    //     // dd($data);
    //     return view('cart.checkout', compact('data', 'total', 'count'));
    // }

    // public function getOrder()
    // {
    //     $count = CartFacade::getTotalQuantity();
    //     $total = CartFacade::getTotal();
    //     $data = CartFacade::getContent();
    //     // dd($data);
    //     return view('cart.order', compact('data', 'total', 'count'));
    // }

    // public function getOrderSuccess()
    // {
    //     $count = CartFacade::getTotalQuantity();
    //     $total = CartFacade::getTotal();
    //     $data = CartFacade::getContent();
    //     // dd($data);
    //     return view('cart.order_success', compact('data', 'total', 'count'));
    // }

    // public function getOrderDetail()
    // {
    //     $count = CartFacade::getTotalQuantity();
    //     $total = CartFacade::getTotal();
    //     $data = CartFacade::getContent();
    //     // dd($data);
    //     return view('cart.order_detail', compact('data', 'total', 'count'));
    // }

    // public function getOrderDetailSuccess()
    // {
    //     $count = CartFacade::getTotalQuantity();
    //     $total = CartFacade::getTotal();
    //     $data = CartFacade::getContent();
    //     // dd($data);
    //     return view('cart.order_detail_success', compact('data', 'total', 'count'));
    // }

    // public function getOrderDetailFail()
    // {
    //     $count = CartFacade::getTotalQuantity();
    //     $total = CartFacade::getTotal();
    //     $data = CartFacade::getContent();
    //     // dd($data);
    //     return view('cart.order_detail_fail', compact('data', 'total', 'count'));
    // }

    // public function getOrderDetailCancel()
    // {
    //     $count = CartFacade::getTotalQuantity();
    //     $total = CartFacade::getTotal();
    //     $data = CartFacade::getContent();
    //     // dd($data);
    //     return view('cart.order_detail_cancel', compact('data', 'total', 'count'));
    // }
}
