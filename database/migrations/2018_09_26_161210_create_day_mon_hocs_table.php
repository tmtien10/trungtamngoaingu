<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDayMonHocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_mon_hocs', function (Blueprint $table) {
              $table->integer('MaMonHoc')->unsigned();
             $table->string('MaGV',10);
                $table->primary(['MaMonHoc','MaGV']);
                  $table->foreign('MaGV')->references('MaGV')->on('giangvien')->onUpdate('cascade')->onDelete('cascade');
             $table->foreign('MaMonHoc')->references('MaMonHoc')->on('monhoc')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('day_mon_hocs');
    }
}
