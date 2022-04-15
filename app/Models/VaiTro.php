<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VaiTro extends Model
{
    protected $table = 'vaitro';
    protected $fillable = [
        'tenvaitro', 'mota',
    ];

    public function quyens(){
        return $this->belongsToMany(Quyen::class, 'vaitro_quyen', 'vaitro_id', 'quyen_id');
    }
}
