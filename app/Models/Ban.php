<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    protected $table = 'ban';
    protected $fillable = [
        'MaBan', 'Ghe', 'TinhTrang',
    ];
}
