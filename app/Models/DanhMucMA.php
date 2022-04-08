<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhMucMA extends Model
{
    protected $table = 'danhmucmonan';
    protected $fillable = [
        'MaMDMA', 'TenDMMA',
    ];
}
