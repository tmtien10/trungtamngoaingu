<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerKhoa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         DB::getPdo()->exec('
        CREATE TRIGGER khoahoc_table_insert
        BEFORE INSERT ON khoahoc
        FOR EACH ROW
        BEGIN
         INSERT INTO khoahoc_sq1 VALUES (NULL);
         SET NEW.MaKhoa = CONCAT("K", LPAD(LAST_INSERT_ID(), 3, "00"));
        END;
    ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
