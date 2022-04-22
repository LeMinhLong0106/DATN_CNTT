<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HDOnline extends Model
{
    protected $table = 'hdonline';
    protected $fillable = [
        'hoten',    'diachi',    'sdt',    'ghichu',    'tongtien',    'tinhtrang', 'khachhang_id', 'nhanvien_id'
    ];

    public function nhanvien()
    {
        return $this->belongsTo(NhanVien::class, 'nhanvien_id');
    }

    public function khachhang()
    {
        return $this->belongsTo(KhachHang::class, 'khachhang_id');
    }

    // public function cthdonline()
    // {
    //     return $this->hasMany(CTHDOnline::class, 'hdonline_id');
    // }

    public function cthdonline()
    {
        return $this->belongsToMany(MonAn::class, 'cthdonline', 'hdonline_id', 'monan_id');
    }

    public function tongtien()
    {
        $tongtien = 0;
        foreach ($this->cthdonline as $cthdonline) {
            $tongtien += $cthdonline->thanhtien;
        }
        return $tongtien;
    }

    public function tinhtrang()
    {
        if ($this->tinhtrang == 0) {
            return 'Chưa thanh toán';
        } else {
            return 'Đã thanh toán';
        }
    }
}
