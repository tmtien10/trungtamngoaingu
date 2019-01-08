<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonghocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phonghoc', function (Blueprint $table) {
            $table->increments('MaPhongHoc');
            $table->integer('MaKhuVuc')->unsigned();
           $table->foreign('MaKhuVuc')->references('MaKhuVuc')->on('khuvuc')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phonghoc');
    }
}
