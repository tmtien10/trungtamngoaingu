<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiangvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giangvien', function (Blueprint $table) {
            $table->string('MaGV',10)->primary();
             $table->string('HoTenGV');
              $table->string('GioiTinhGV');
               $table->date('NgaySinhGV');
                $table->string('TrinhDoGV');
                 $table->string('ChuyenMonGV')->nullable();
                  $table->string('EmailGV');
                   $table->string('SDTGV');
                    $table->string('DiaChiGV');
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
        Schema::dropIfExists('giangvien');
    }
}
