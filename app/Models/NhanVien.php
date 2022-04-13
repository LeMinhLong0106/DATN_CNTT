<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    protected $table = 'users';
    protected $fillable = [
        // 'MaNV','HoNV', 'TenNV', 'GioiTinh', 'NgaySinh', 'DiaChi', 'SoDT', 'AnhNV', 'Email', 'MatKhau','MaNhom'
        'name', 'email', 'password' 
    ];

    public function vaitros()
    {
        return $this->belongsToMany(VaiTro::class, 'nhanvien_vaitro', 'nhanvien_id', 'vaitro_id');
    }
}
