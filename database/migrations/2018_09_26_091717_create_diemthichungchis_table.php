<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiemthichungchisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diemthichungchis', function (Blueprint $table) {
             $table->string('MaHocVien',10);
             $table->integer('MaKiThi')->unsigned();
             $table->primary(['MaHocVien','MaKiThi']);
             $table->integer('PhongThi');
             $table->text('DiemThi')->nullable();


             $table->foreign('MaHocVien')->references('MaHocVien')->on('hocvien');
             $table->foreign('MaKiThi')->references('MaKiThi')->on('kythis');
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
        Schema::dropIfExists('diemthichungchis');
    }
}
