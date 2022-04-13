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
Route::get('/about', 'GiaoDienController@about')->name('about');

// đăng nhập thì mới vào những trang này được
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('ban', 'BanController');
    Route::resource('danhmucmonan', 'DanhMucMAController');
    Route::resource('donvitinh', 'DonViTinhController');
    // Route::resource('dsquyen', 'DSQuyenController');
    // Route::resource('hdonline', 'HDOnlineController');
    Route::resource('hdtaiquay', 'HDTaiQuayController');
    // Route::resource('khachhang', 'KhachHangController');
    Route::resource('monan', 'MonAnController');
    Route::resource('order', 'OrderController');
    Route::resource('nhanvien', 'NhanVienController');
    // Route::resource('nhomnv', 'NhomNVController');
    // Route::resource('quyen', 'QuyenController');
});
