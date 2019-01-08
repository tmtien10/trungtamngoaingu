<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLopKhoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lopkhoa', function (Blueprint $table) {
           $table->increments('id');
            $table->integer('MaLop')->unsigned();
            $table->integer('MaKhoa')->unsigned();
            $table->date('NgayKhaiGiang');
            $table->date('NgayKetThuc');
             $table->string('TieuDe');
            $table->string('BuoiHoc');
            $table->text('NgayChan');
            $table->float('HocPhi');
            $table->timestamps();
              $table->foreign('MaLop')->references('MaLop')->on('lophoc')->onUpdate('cascade')->onDelete('cascade');
              $table->foreign('MaKhoa')->references('MaKhoa')->on('khoahoc')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lopkhoa');
    }
}
