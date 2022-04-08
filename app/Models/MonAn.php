<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonAn extends Model
{
    protected $table = 'monan';
    protected $fillable = [
        'MaMonAn', 'TenMonAn', 'NgayThem', 'TinhTrang', 'MoTa', 'HinhAnh', 'Gia', 'MaDVT', 'MaDanhMuc'
    ];
}
