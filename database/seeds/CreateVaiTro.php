<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CreateVaiTro extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vaitro')->insert([
            ['tenvaitro' => 'admin', 'mota' => 'Quản trị viên'],
            ['tenvaitro' => 'thungan', 'mota' => 'Nhân viên thu ngân'],
            ['tenvaitro' => 'phụcvu', 'mota' => 'Nhân viên phục vụ'],
            ['tenvaitro' => 'daubep', 'mota' => 'Đầu bếp'],
            ['tenvaitro' => 'tiepthuc', 'mota' => 'Nhân viên tiếp thực'],
        ]);
    }
}
