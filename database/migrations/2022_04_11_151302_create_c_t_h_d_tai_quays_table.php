<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCTHDTaiQuaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cthdtaiquay', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('hdtaiquay_id');
            $table->integer('monan_id');
            $table->string('soluong');
            $table->string('ghichu');
            $table->string('tinhtrang')->default(0);
            $table->string('giaban');
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
        Schema::dropIfExists('cthdtaiquay');
    }
}
