<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerLop extends Migration
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
        CREATE TRIGGER lop_table_insert
        BEFORE INSERT ON lophoc
        FOR EACH ROW
        BEGIN
         INSERT INTO lop_sq1 VALUES (NULL);
         SET NEW.MaLop = CONCAT("L", LPAD(LAST_INSERT_ID(), 3, "00"));
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
