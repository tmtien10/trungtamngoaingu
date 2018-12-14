<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCbttTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cbtt', function (Blueprint $table) {
            $table->string('MaNV',10)->primary();
            $table->string('HoTenNV');
            $table->string('GioiTinhNV');
            $table->date('NgaySinhNV');
            $table->string('SDTNV');
            $table->string('DiaChiNV');
            $table->string('EmailNV');
            $table->string('TinhTrang');

          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cbtt');
    }
}
