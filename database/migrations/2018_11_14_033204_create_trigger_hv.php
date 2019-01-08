<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerHv extends Migration
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
        CREATE TRIGGER hocvien_table_insert
        BEFORE INSERT ON hocvien
        FOR EACH ROW
        RETURNS trigger AS
        $BODY$
        BEGIN
         INSERT INTO hocvien_sq1 VALUES (NULL);
         SET NEW.MaHocVien = CONCAT("HV", LPAD(LAST_INSERT_ID(), 3, "00"));
        END;
        $BODY$
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
