<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HDTaiQuay extends Model
{
    protected $table = 'hdtaiquay';
    protected $fillable = [
        'MaHD', 'TinhTrang', 'NgayLap', 'MaNV', 'MaBan'
    ];
}
