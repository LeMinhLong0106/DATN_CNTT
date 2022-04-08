<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonViTinh extends Model
{
    protected $table = 'donvitinh';
    protected $fillable = [
        'MaDonViTinh', 'TenDonViTinh',
    ];
}
