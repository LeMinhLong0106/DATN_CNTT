<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CTHDOnline extends Model
{
    protected $table = 'cthdonline';
    protected $fillable = [
        'hdonline_id', 'monan_id', 'soluong', 'thanhtien'
    ];

    public function hdonline()
    {
        return $this->belongsTo(HDOnline::class, 'hdonline_id');
    }

    public function monan()
    {
        return $this->belongsTo(MonAn::class, 'monan_id');
    }
}
