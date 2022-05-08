<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCTHDOnlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cthdonline', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('hdonline_id');
            $table->integer('monan_id');
            $table->string('soluong');
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
        Schema::dropIfExists('cthdonline');
    }
}
