<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/home', function () {
//     return view('welcome');
// });

Auth::routes();
// trang chủ admin
Route::get('/', 'HomeController@index');

Route::get('/majestic', 'GiaoDienController@majestic')->name('majestic');
Route::get('/menuu', 'GiaoDienController@menu')->name('menu');
Route::get('/detail/{id}', 'GiaoDienController@detail')->name('detail');
// Route::get('/about', 'GiaoDienController@about')->name('about');
Route::get('/search', 'GiaoDienController@search')->name('search');
Route::get('/addToCart/{id}', 'GiaoDienController@addToCart')->name('addToCart');
Route::get('/showCart', 'GiaoDienController@showCart')->name('showCart');

// đăng nhập thì mới vào những trang này được
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::resource('ban', 'BanController');
    Route::resource('danhmuc', 'DanhMucMAController');
    // Route::resource('donvitinh', 'DonViTinhController');
    Route::resource('dsquyen', 'DSQuyenController');
    // Route::resource('hdonline', 'HDOnlineController');
    // Route::resource('hdtaiquay', 'HDTaiQuayController');
    Route::resource('khachhang', 'KhachHangController');
    Route::resource('monan', 'MonAnController');
    // Route::resource('order', 'OrderController');
    Route::resource('nhanvien', 'NhanVienController');
    Route::resource('vaitro', 'VaiTroController');
    // Route::resource('nhomnv', 'NhomNVController');
    Route::resource('quyen', 'QuyenController');
    Route::post('updateMonAn/{id}', 'MonAnController@updateMonAn')->name('monan.updateMonAn');

    // Route::resource('hdonline', 'HDOnlineController');
    // Route::resource('hdtaiquay', 'HDTaiQuayController');
    // Route::delete('hdtaiquay/deleteHD/{id}', 'HDTaiQuayController@deleteHD')->name('hdtaiquay.deleteHD');
    // Route::delete('hdtaiquay/deleteCTHD/{id}', 'HDTaiQuayController@deleteCTHD')->name('hdtaiquay.deleteCTHD');
    // Route::post('hdtaiquay/thanhtoan/{id}', 'HDTaiQuayController@thanhtoan')->name('hdtaiquay.thanhtoan');
    // Route::get('hdtaiquay/showReceipt/{id}', 'HDTaiQuayController@showReceipt')->name('hdtaiquay.showReceipt');

    Route::get('hdtaiquay', 'HoaDonController@indexHDTQ')->name('hdtaiquay.indexHDTQ');
    Route::get('hdonline', 'HoaDonController@indexHDO')->name('hdonline.indexHDO');
    Route::get('hdtaiquay/{id}', 'HoaDonController@showHDTQ')->name('hdtaiquay.showHDTQ');
    Route::get('hdonline/{id}', 'HoaDonController@showHDO')->name('hdonline.showHDO');
    Route::delete('hdtaiquay/deleteHD/{id}', 'HoaDonController@deleteHD')->name('hdtaiquay.deleteHD');
    Route::delete('hdonline/deleteHDO/{id}', 'HoaDonController@deleteHDO')->name('hdonline.deleteHDO');
    Route::delete('hdtaiquay/deleteCTHD/{id}', 'HoaDonController@deleteCTHD')->name('hdtaiquay.deleteCTHD');
    Route::post('hdtaiquay/thanhtoan/{id}', 'HoaDonController@thanhtoan')->name('hdtaiquay.thanhtoan');
    Route::post('hdonline/thanhtoanon/{id}', 'HoaDonController@thanhtoanon')->name('hdonline.thanhtoanon');
    Route::get('hdtaiquay/showReceipt/{id}', 'HoaDonController@showReceipt')->name('hdtaiquay.showReceipt');

    Route::resource('order', 'OrderController');
    Route::post('order/orderFood', 'OrderController@orderFood')->name('order.orderFood');
    Route::post('order/deleteOrder', 'OrderController@deleteOrder')->name('order.deleteOrder');
    Route::post('order/changeQuantityIn', 'OrderController@changeQuantityIn')->name('order.changeQuantityIn');
    Route::post('order/confirmOrder', 'OrderController@confirmOrder')->name('order.confirmOrder');
    Route::post('order/changeQuantityDe', 'OrderController@changeQuantityDe')->name('order.changeQuantityDe');

    Route::get('baocao', 'BaoCaoController@index')->name('baocao.index');
});

Route::group(['prefix' => 'cart'], function () {
    Route::post('add_in_detail', 'GioHangController@getAddInDetail')->name('add_in_detail');

    Route::get('add/{id}', 'GioHangController@getAddCart');
    Route::get('show', 'GioHangController@showCart')->name('cart.show');
    Route::get('delete/{id}', 'GioHangController@getDeleteCart');
    Route::get('update', 'GioHangController@getUpdateCart');

    Route::get('login_checkout', 'GioHangController@loginCheck')->name('login_checkout');
    Route::get('register_checkout', 'GioHangController@registerCheck')->name('register_checkout');
    Route::post('add_khachhang', 'GioHangController@addKH')->name('add_khachhang');
    Route::post('login_khachhang', 'GioHangController@loginKhach')->name('login_khachhang');
    Route::get('logout_kh', 'GioHangController@logOut')->name('logout_kh');

    Route::post('checkout', 'GioHangController@addOrder')->name('checkout');
});

// Route::group(['prefix' => 'phucvu', 'middleware' => ['auth', 'isPV']], function () {
//     Route::resource('order', 'OrderController');
//     Route::post('order/orderFood', 'OrderController@orderFood')->name('order.orderFood');
//     Route::post('order/deleteOrder', 'OrderController@deleteOrder')->name('order.deleteOrder');
//     Route::post('order/confirmOrder', 'OrderController@confirmOrder')->name('order.confirmOrder');
//     Route::get('order/giaodienDB', 'OrderController@giaodienDB')->name('order.giaodienDB');
//     Route::post('order/changeQuantityIn', 'OrderController@changeQuantityIn')->name('order.changeQuantityIn');
//     Route::post('order/changeQuantityDe', 'OrderController@changeQuantityDe')->name('order.changeQuantityDe');
// });

Route::get('order/getSaleDetails/{id}', 'OrderController@getSaleDetails')->name('order.getSaleDetails');
Route::get('order/table_status', 'OrderController@table_status')->name('order.table_status');
Route::get('order/order_status', 'OrderController@order_status')->name('order.order_status');
Route::get('order/giaodienDB', 'OrderController@giaodienDB')->name('order.giaodienDB');

// Route::group(['prefix' => 'thungan', 'middleware' => ['auth', 'isTN']], function () {
//     Route::resource('hdonline', 'HDOnlineController');
//     Route::resource('hdtaiquay', 'HDTaiQuayController');
//     Route::delete('hdtaiquay/deleteHD/{id}', 'HDTaiQuayController@deleteHD')->name('hdtaiquay.deleteHD');
//     Route::delete('hdtaiquay/deleteCTHD/{id}', 'HDTaiQuayController@deleteCTHD')->name('hdtaiquay.deleteCTHD');
//     Route::post('hdtaiquay/thanhtoan/{id}', 'HDTaiQuayController@thanhtoan')->name('hdtaiquay.thanhtoan');
//     Route::get('hdtaiquay/showReceipt/{id}', 'HDTaiQuayController@showReceipt')->name('hdtaiquay.showReceipt');
// });


// đăng nhập với gg
Route::get('redirectToGoogle', 'SocialController@redirectToGoogle')->name('redirectToGoogle');
Route::get('callbackGoogle', 'SocialController@callbackGoogle')->name('callbackGoogle');