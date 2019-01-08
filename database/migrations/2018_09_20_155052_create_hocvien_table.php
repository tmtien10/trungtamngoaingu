<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHocvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hocvien', function (Blueprint $table) {
            $table->string('MaHocVien',10)->primary();
            $table->string('HoTenHocVien');
            $table->string('GioiTinh'); //da sua kieu dl thanh varchar
            $table->date('NgaySinh');
            $table->string('DiaChi');
            $table->string('Email');
            $table->string('SDT');
            $table->string('CMND');
            $table->date('NgayCap');
            $table->string('NgheNghiep');
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
        Schema::dropIfExists('hocvien');
    }
}
