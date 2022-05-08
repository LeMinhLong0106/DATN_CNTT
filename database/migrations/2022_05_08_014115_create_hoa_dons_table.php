<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoaDonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadon', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('tinhtrang')->default(0);
            $table->integer('tongtien')->default(0);
            $table->string('hoten')->nullable();
            $table->string('diachi')->nullable();
            $table->string('sdt')->nullable();
            $table->string('ghichu')->nullable();
            $table->string('nhanvien_id')->default(0)->nullable();
            $table->string('nhanvien_tn')->default(0)->nullable();
            $table->string('khachhang_id')->nullable();
            $table->string('ban_id')->nullable();
            $table->string('loaihd_id')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoadon');
    }
}
