<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhMucMA extends Model
{
    public $timestamps = false;
    protected $table = 'danh_muc_m_a_s';
    protected $fillable = [
        'tendm',
    ];

    public function monans()
    {
        return $this->hasMany(MonAn::class, 'danhmuc');
    }
}
