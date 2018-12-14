<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietTiethocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiet_tiethoc', function (Blueprint $table) {
            $table->increments('id_chitiet');
            $table->string('MaMonHoc');
            $table->integer('id_TKB');
            $table->integer('id_Tiet');
            $table->string('MaGV');
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
        Schema::dropIfExists('chitiet_tiethoc');
    }
}
