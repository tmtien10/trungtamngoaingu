<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTkcbttTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tkcbtt', function (Blueprint $table) {
            $table->string('username',10);
             $table->integer('MaNV')->unsigned();
             $table->primary(['username', 'MaNV']);

             $table->foreign('MaNV')->references('MaNV')->on('cbtt')->onDelete('cascade')
              ->onUpdate('cascade');;
             $table->foreign('username')->references('username')->on('taikhoan')->onDelete('cascade')
              ->onUpdate('cascade');;
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
        Schema::dropIfExists('tkcbtt');
    }
}
