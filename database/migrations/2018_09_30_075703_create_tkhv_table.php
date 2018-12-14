<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTkhvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tkhv', function (Blueprint $table) {
            $table->string('username',10);
            $table->string('MaHocVien',10);
             $table->primary(['username', 'MaHocVien']);

             $table->foreign('MaHocVien')->references('MaHocVien')->on('hocvien');;
             $table->foreign('username')->references('username')->on('taikhoan');;
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
        Schema::dropIfExists('tkhv');
    }
}
