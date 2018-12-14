<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTkbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tkb', function (Blueprint $table) {
            $table->increments('id_TKB');
            $table->string('MaNhom',10);
            $table->timestamps();
             $table->foreign('MaNhom')->references('MaNhom')->on('nhom');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tkb');
    }
}
