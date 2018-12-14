<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaikhoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taikhoan', function (Blueprint $table) {
            $table->string('username',10)->primary();
            $table->string('password');
            $table->integer('quyen');
            $table->boolean('confirmed')->default(0);//update at 28/09
            $table->string('confirmation_code')->nullable();//update at 28/09
            $table->rememberToken();//update at 28/09
            $table->string('avatar')->nullable();//update at 30/09-ảnh đại diện tài khoản
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
        Schema::dropIfExists('taikhoan');
    }
}
