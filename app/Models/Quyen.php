<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quyen extends Model
{
    protected $table = 'quyen';
    protected $fillable = [
        'MaQuyen', 'TenQuyen',
    ];
}
