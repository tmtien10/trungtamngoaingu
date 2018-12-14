<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoadonthisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadonthis', function (Blueprint $table) {
            $table->increments('id_hoadon');
            $table->integer('idphieudk')->unsigned();
            $table->string('MaNV',10);
            $table->integer('phongthi');
            

             $table->foreign('idphieudk')->references('idphieudk')->on('phieudkthis');;
             $table->foreign('MaNV')->references('MaNV')->on('cbtt');;
            
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
        Schema::dropIfExists('hoadonthis');
    }
}
