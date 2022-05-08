<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('users', function (Blueprint $table) {
        //     $table->bigIncrements('id_user');
        //     $table->string('name');
        //     $table->tinyInteger('sex')->nullable();
        //     $table->date('dob')->nullable();
        //     $table->string('address')->nullable();
        //     $table->string('phone')->nullable();
        //     $table->string('avata')->nullable();
        //     $table->string('email')->unique();
        //     $table->string('password');
        //     $table->string('manhom')->nullable();
        //     $table->foreign('manhom')->references('MaNhom')->on('NhomNhanVien');
        //     $table->rememberToken();
        //     $table->timestamps();
        // });
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('vaitro_id');
            $table->string('google_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
