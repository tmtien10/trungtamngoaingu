<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLopHocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lophoc', function (Blueprint $table) {
            $table->string('MaLop',10)->primary();
            $table->string('TenLop');
            $table->integer('id_TietHoc')->unsigned();
            $table->string('SoTuanHoc');
            $table->text('GioiThieu');
            $table->text('Hinh');
            $table->foreign('id_TietHoc')->references('id_TietHoc')->on('tiethoc')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('lophoc');
    }
}
