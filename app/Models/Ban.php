<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    public $timestamps = false;
    protected $table = 'bans';
    protected $fillable = [
        'Ghe', 'TinhTrang',
    ];
}
