<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieudkthisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieudkthis', function (Blueprint $table) {
            $table->increments('idphieudk');
            $table->integer('MaKiThi')->unsigned();
            $table->string('MaHocVien');
            $table->string('TinhTrang');
            $table->timestamps();

             $table->foreign('MaHocVien')->references('MaHocVien')->on('hocvien')->onUpdate('cascade')->onDelete('cascade');
             $table->foreign('MaKiThi')->references('MaKiThi')->on('kythis')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phieudkthis');
    }
}
