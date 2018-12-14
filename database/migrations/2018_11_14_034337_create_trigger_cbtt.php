<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerCbtt extends Migration
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
        CREATE TRIGGER cbtt_table_insert
        BEFORE INSERT ON cbtt
        FOR EACH ROW
        BEGIN
         INSERT INTO cbtt_sq1 VALUES (NULL);
         SET NEW.MaNV = CONCAT("NV", LPAD(LAST_INSERT_ID(), 3, "00"));
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
