<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoaDonDKHocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadondkhoc', function (Blueprint $table) {
            $table->increments('id_HoaDonDkHoc');
             $table->integer('id_PhieuDKHoc')->unsigned();
              $table->integer('MaNV')->unsigned();
            $table->integer('MaNhom')->unsigned();
            $table->date('NgayLapHoc');
            $table->foreign('MaNV')->references('MaNV')->on('cbtt')->onUpdate('cascade')->onDelete('cascade');
              $table->foreign('MaNhom')->references('MaNhom')->on('nhom')->onUpdate('cascade')->onDelete('cascade');
               $table->foreign('id_PhieuDKHoc')->references('id_PhieuDKHoc')->on('phieudkhoc')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('hoadondkhoc');
    }
}
