<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThuocLopHocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thuoc_lop_hocs', function (Blueprint $table) {
             $table->string('MaNhom',10);
             $table->string('MaHocVien',10);
                $table->primary(['MaHocVien','MaNhom']);
                  $table->foreign('MaHocVien')->references('MaHocVien')->on('hocvien');
             $table->foreign('MaNhom')->references('MaNhom')->on('nhom');
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
        Schema::dropIfExists('thuoc_lop_hocs');
    }
}
