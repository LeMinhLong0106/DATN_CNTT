<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    protected $table = 'users';
    protected $fillable = [
        // 'MaNV','HoNV', 'TenNV', 'GioiTinh', 'NgaySinh', 'DiaChi', 'SoDT', 'AnhNV', 'Email', 'MatKhau','MaNhom'
        'name', 'email', 'password', 'vaitro_id' 
    ];

    public function vaitross()
    {
        return $this->belongsTo(VaiTro::class, 'vaitro_id');
    }
}
