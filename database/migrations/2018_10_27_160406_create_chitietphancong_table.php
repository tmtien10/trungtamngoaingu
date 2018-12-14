<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietphancongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietphancong', function (Blueprint $table) {
            $table->increments('id');
            $table->string('MaGV',10);
             $table->integer('MaMonHoc')->unsigned();
            $table->string('MaNhom',10);
             $table->integer('id_ThoiGian')->unsigned();
             $table->integer('id_TKB')->unsigned();
              $table->integer('id_TietHoc');
            
           

            $table->timestamps();
             $table->foreign('MaGV')->references('MaGV')->on('giangvien');
              $table->foreign('MaMonHoc')->references('MaMonHoc')->on('monhoc');
               $table->foreign('MaNhom')->references('MaNhom')->on('nhom');
            $table->foreign('id_ThoiGian')->references('id_ThoiGian')->on('thoigian');
              $table->foreign('id_TKB')->references('id_TKB')->on('tkb');
            
               
              
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietphancong');
    }
}
