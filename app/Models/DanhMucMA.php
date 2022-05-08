<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhMucMA extends Model
{
    public $timestamps = false;
    protected $table = 'danhmucmon';
    protected $fillable = [
        'tendm','uutien','created_at', 'updated_at'
    ];

    public function monan()
    {
        return $this->hasMany(MonAn::class, 'danhmuc', 'id');
    }
    
}
