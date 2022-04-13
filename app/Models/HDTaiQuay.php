<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HDTaiQuay extends Model
{
    protected $table = 'hdtaiquay';
    protected $fillable = [
        'tinhtrang', 'tongtien', 'nhanvien_id', 'ban_id', 'created_at'
    ];
}
