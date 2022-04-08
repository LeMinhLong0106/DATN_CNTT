<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    protected $table = 'nhanvien';
    protected $fillable = [
        'MaNV','HoNV', 'TenNV', 'GioiTinh', 'NgaySinh', 'DiaChi', 'SoDT', 'AnhNV', 'Email', 'MatKhau','MaNhom'
    ];
}
