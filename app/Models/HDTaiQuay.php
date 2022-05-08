<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HDTaiQuay extends Model
{
    // protected $table = 'hdtaiquay';
    // protected $fillable = [
    //     'tinhtrang', 'tongtien', 'nhanvien_id','nhanvien_tn', 'ban_id', 'created_at'
        
    // ];

    // public function nhanviens()
    // {
    //     return $this->belongsTo(NhanVien::class, 'nhanvien_id');
    // }

    // public function ban()
    // {
    //     return $this->belongsTo(Ban::class, 'ban_id');
    // }

    // public function cthdtaiquays()
    // {
    //     return $this->hasMany(CTHDTaiQuay::class, 'hdtaiquay_id');
    // }

    // public function tongtien()
    // {
    //     $tongtien = 0;
    //     foreach ($this->cthdtaiquays as $cthdtaiquay) {
    //         $tongtien += $cthdtaiquay->thanhtien;
    //     }
    //     return $tongtien;
    // }   

    
}
