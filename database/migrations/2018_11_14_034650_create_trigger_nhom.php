<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerNhom extends Migration
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
        CREATE TRIGGER nhom_table_insert
        BEFORE INSERT ON nhom
        FOR EACH ROW
        BEGIN
         INSERT INTO nhom_sq1 VALUES (NULL);
         SET NEW.MaNhom = CONCAT("N", LPAD(LAST_INSERT_ID(), 3, "00"));
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
