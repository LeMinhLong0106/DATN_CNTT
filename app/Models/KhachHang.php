<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table = 'khachhang';
    protected $fillable = [
        'tenkh',	'email',	'sdt',	'diachi',	'matkhau',
    ];
}
