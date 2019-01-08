<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieuDKHocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieudkhoc', function (Blueprint $table) {
            $table->increments('id_PhieuDKHoc');
              $table->string('MaHocVien',10);
             
               $table->integer('id')->unsigned();
                $table->date('ThoiGianDKHoc');
              $table->integer('TinhTrang');

              $table->foreign('MaHocVien')->references('MaHocVien')->on('hocvien')->onUpdate('cascade')->onDelete('cascade');
              
              $table->foreign('id')->references('id')->on('lopkhoa')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('phieudkhoc');
    }
}

