<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonViTinh extends Model
{
    public $timestamps = false;
    protected $table = 'don_vi_tinhs';
    protected $fillable = [
         'tendvt'
    ];
}
