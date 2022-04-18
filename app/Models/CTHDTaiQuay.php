<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CTHDTaiQuay extends Model
{
    protected $table = 'cthdtaiquay';
    protected $fillable = [
        'hdtaiquay_id', 'monan_id', 'soluong', 'thanhtien'
    ];

    public function hdtaiquay()
    {
        return $this->belongsTo(HDTaiQuay::class, 'hdtaiquay_id');
    }

    public function monan()
    {
        return $this->belongsTo(MonAn::class, 'monan_id');
    }
}
