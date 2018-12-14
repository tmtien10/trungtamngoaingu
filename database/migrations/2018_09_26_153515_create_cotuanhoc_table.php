<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotuanhocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotuanhoc', function (Blueprint $table) {
            $table->integer('id_Tuan')->unsigned();
             $table->integer('id_TKB')->unsigned();
                $table->primary(['id_Tuan','id_TKB']);
                  $table->foreign('id_Tuan')->references('id_Tuan')->on('tuan_hocs');
             $table->foreign('id_TKB')->references('id_TKB')->on('tkb');
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
        Schema::dropIfExists('cotuanhoc');
    }
}
