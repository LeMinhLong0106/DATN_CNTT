<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CTHD extends Model
{
    protected $table = 'cthd';
    protected $fillable = [
        'hoadon_id', 'monan_id', 'soluong', 'giaban', 'ghichu', 'tinhtrang'
    ];

    public function monanss()
    {
        return $this->belongsTo(MonAn::class, 'monan_id');
    }

    public function hoadonss()
    {
        return $this->belongsTo(HoaDon::class, 'hoadon_id');
    }

}
