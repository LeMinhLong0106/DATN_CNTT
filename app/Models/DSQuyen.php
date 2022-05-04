<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DSQuyen extends Model
{
    protected $table = 'vaitro_quyen';
    protected $fillable = [
        'vaitro_id', 'quyen_id',
    ];

    public function dsvaitro()
    {
        return $this->belongsTo(VaiTro::class, 'vaitro_id', 'id');
    }

    public function dsquyen()
    {
        return $this->belongsTo(Quyen::class, 'quyen_id', 'id');
    }
}
