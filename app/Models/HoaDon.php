<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $table = 'hoadon';
    protected $fillable = ['tinhtrang', 'tongtien', 'hoten', 'diachi', 'sdt', 'ghichu', 'nhanvien_id', 'nhanvien_tn', 'khachhang_id', 'ban_id', 'loaihd_id'];

    public function ban()
    {
        return $this->belongsTo(Ban::class, 'ban_id', 'id');
    }

    public function nhanvien()
    {
        return $this->belongsTo(NhanVien::class, 'nhanvien_id', 'id');
    }

    public function khachhang()
    {
        return $this->belongsTo(KhachHang::class, 'khachhang_id', 'id');
    }

    public function cthd()
    {
        return $this->hasMany(CTHD::class, 'hoadon_id', 'id');
    }

    public function loaihd()
    {
        return $this->belongsTo(LoaiHD::class, 'loaihd_id', 'id');
    }

    
}
