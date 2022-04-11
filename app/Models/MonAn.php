<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonAn extends Model
{
    protected $table = 'mon_ans';
    protected $fillable = [
        'tenmonan', 'tinhtrang', 'mota', 'hinhanh', 'gia', 'donvitinh', 'danhmuc', 'created_at'
    ];
}
