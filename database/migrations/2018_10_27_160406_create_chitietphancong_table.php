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
            $table->integer('MaGV')->unsigned();
             $table->integer('MaMonHoc')->unsigned();
            $table->integer('MaNhom')->unsigned();
             $table->integer('id_ThoiGian')->unsigned();
             $table->integer('id_TKB')->unsigned();
              $table->integer('id_TietHoc')->unsigned();
            
           

            $table->timestamps();
             $table->foreign('MaGV')->references('MaGV')->on('giangvien')->onUpdate('cascade')->onDelete('cascade');;
              $table->foreign('MaMonHoc')->references('MaMonHoc')->on('monhoc')->onUpdate('cascade')->onDelete('cascade');;
               $table->foreign('MaNhom')->references('MaNhom')->on('nhom')->onUpdate('cascade')->onDelete('cascade');;
            $table->foreign('id_ThoiGian')->references('id_ThoiGian')->on('thoigian')->onUpdate('cascade')->onDelete('cascade');;
              $table->foreign('id_TKB')->references('id_TKB')->on('tkb')->onUpdate('cascade')->onDelete('cascade');;
            
               
              
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
