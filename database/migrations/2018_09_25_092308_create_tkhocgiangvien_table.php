<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTkhocgiangvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tkhocgiangvien', function (Blueprint $table) {
            $table->string('username');
              $table->integer('MaGV')->unsigned();
             $table->primary(['MaGV','username']);
            $table->foreign('MaGV')->references('MaGV')->on('giangvien')->onUpdate('cascade')->onDelete('cascade');
             $table->foreign('username')->references('username')->on('taikhoan')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('tkhocgiangvien');
    }
}
