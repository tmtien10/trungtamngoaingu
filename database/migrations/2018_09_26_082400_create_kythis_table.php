<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKythisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kythis', function (Blueprint $table) {
            $table->increments('MaKiThi');
            $table->string('TenKiThi');
            $table->integer('MaCC')->unsigned();
            $table->date('NgayThi');
             $table->time('GioBatDau');
              $table->time('GioKetThuc');
              $table->float('LePhi', 255,2);
            $table->timestamps();

            $table->foreign('MaCC')->references('MaCC')->on('chungchis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kythis');
    }
}
