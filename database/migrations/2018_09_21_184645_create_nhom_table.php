<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhom', function (Blueprint $table) {
             $table->string('MaNhom',10)->primary();
           $table->integer('id')->unsigned();
             $table->integer('MaPhongHoc')->unsigned();
              $table->string('TenNhom',100);
                $table->integer('SLHocVien');
            $table->timestamps();
            $table->foreign('MaPhongHoc')->references('MaPhongHoc')->on('phonghoc')->onUpdate('cascade')->onDelete('cascade');
             $table->foreign('id')->references('id')->on('lopkhoa')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhom');
    }
}
