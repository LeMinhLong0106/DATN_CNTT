<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHDOnlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hdonline', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hoten');
            $table->string('diachi');
            $table->string('sdt');
            $table->string('ghichu');
            $table->integer('tongtien');
            $table->tinyInteger('tinhtrang');
            $table->string('nhanvien_id')->default(0);
            $table->string('khachhang_id');
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
        Schema::dropIfExists('hdonline');
    }
}
