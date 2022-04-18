<?php

namespace App\Http\Controllers;

use App\Models\MonAn;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;


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
}
