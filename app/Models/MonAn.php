<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonAn extends Model
{
    protected $table = 'mon_ans';
    protected $fillable = [
        'tenmonan', 'tinhtrang', 'mota', 'hinhanh', 'gia', 'donvitinh', 'danhmuc', 'created_at'
    ];

    public function danhmucss()
    {
        return $this->belongsTo(DanhMucMA::class, 'danhmuc');// tham số 1 là class, tham số 2 là khóa ngoại của bảng món ăn
    }

    public function donvitinhs()
    {
        return $this->belongsTo(DonViTinh::class, 'donvitinh');
    }

    public function hdtaiquays()
    {
        return $this->belongsToMany(HDTaiQuay::class, 'cthdtaiquay', 'monan_id', 'hdtaiquay_id');
    }

    public function hdonlines()
    {
        return $this->belongsToMany(HDOnline::class, 'cthdonline', 'monan_id', 'hdonline_id');
    }
}
