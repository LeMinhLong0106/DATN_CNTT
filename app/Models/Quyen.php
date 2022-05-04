<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quyen extends Model
{
    protected $table = 'quyen';
    protected $fillable = [
        'tenquyen', 'mota'
    ];

    public function quyenCon(){
        return $this->hasMany(Quyen::class, 'parent_id');
    }
    
}
