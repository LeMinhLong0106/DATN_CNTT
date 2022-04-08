<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table = 'khachhang';
    protected $fillable = [
        'MaKhachHang','HoKH', 'TenKH','GioiTinh', 'DiaChi', 'SoDT', 'AnhKH', 'Email', 'MatKhau'
    ];
}
