<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhomNV extends Model
{
    protected $table = 'nhomnv';
    protected $fillable = [
        'MaNhom', 'TenNhom',
    ];
}
