<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonAnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tenmonan');
            $table->tinyInteger('tinhtrang')->default(0);
            $table->string('mota');
            $table->string('hinhanh');
            $table->integer('gia');
            $table->integer('thoigian');
            $table->string('donvitinh');
            $table->string('danhmuc');
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
        Schema::dropIfExists('monan');
    }
}
