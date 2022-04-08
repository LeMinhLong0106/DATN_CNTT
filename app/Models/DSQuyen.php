<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DSQuyen extends Model
{
    protected $table = 'dsquyen';
    protected $fillable = [
        'MaQuyen', 'TenQuyen',
    ];
}
