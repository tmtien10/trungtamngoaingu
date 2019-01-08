<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('co', function (Blueprint $table) {
            $table->integer('MaKM')->unsigned();
           $table->integer('MaLop')->unsigned();
               $table->primary(['MaKM','MaLop']);
                $table->foreign('MaKM')->references('MaKM')->on('khuyenmai')->onUpdate('cascade')->onDelete('cascade');
             $table->foreign('MaLop')->references('MaLop')->on('lophoc')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('co');
    }
}
