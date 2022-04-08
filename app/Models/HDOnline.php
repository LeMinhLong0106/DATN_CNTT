<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HDOnline extends Model
{
    protected $table = 'hdonline';
    protected $fillable = [
        'MaHD', 'HoTen', 'SDT', 'DiaChi', 'GhiChu', 'TongTien', 'NgayLap', 'TinhTrang', 'MaKH', 'MaNV'
    ];
}
