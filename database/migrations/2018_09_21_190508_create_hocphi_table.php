<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHocphiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hocphi', function (Blueprint $table) {
            $table->string('MaLop');
             $table->integer('id_KhoaHoc');
              $table->float('HocPhi');
            $table->date('NgayKhaiGiang');
            $table->date('NgayKetThuc');
            $table->string('BuoiHoc');
            $table->boolean('NgayChan');
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
        Schema::dropIfExists('hocphi');
    }
}
