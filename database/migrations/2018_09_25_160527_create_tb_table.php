<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thongbao', function (Blueprint $table) {
            $table->increments('MaTB');
            $table->string('MaNV',10);
            $table->string('TenTB',100);
            $table->text('NoiDungTB');
            $table->integer('LoaiTB');
            $table->text('file')->nullable();


            $table->timestamps();

            $table->foreign('MaNV')->references('MaNV')->on('cbtt')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thongbao');
    }
}
