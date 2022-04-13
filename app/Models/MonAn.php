<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonAn extends Model
{
    protected $table = 'mon_ans';
    protected $fillable = [
        'tenmonan', 'tinhtrang', 'mota', 'hinhanh', 'gia', 'donvitinh', 'danhmuc', 'created_at'
    ];

    // relatisonship
    // public function category()
    // {
    //     return $this->hasMany('thamso1', 'thamso2');
    //     // thamso 1 là class, tham số 2 là khóa ngoại
    // }

    // 1 danh mục có nhìu món ăn ,1 món nằm trong 1 danh mục
    public function danhmucss()
    {
        return $this->belongsTo(DanhMucMA::class, 'danhmuc');// tham số 1 là class, tham số 2 là khóa ngoại của bảng món ăn
    }

    public function donvitinhs()
    {
        return $this->belongsTo(DonViTinh::class, 'donvitinh');
    }
}
