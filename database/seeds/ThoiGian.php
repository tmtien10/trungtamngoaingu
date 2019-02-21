<?php

use Illuminate\Database\Seeder;

class ThoiGian extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('thoigian')->insert(['id_ThoiGian'=>'0','Thu'=>'CN']);
         DB::table('thoigian')->insert(    ['id_ThoiGian'=>'1','Thu'=>'2']);
          DB::table('thoigian')->insert(   ['id_ThoiGian'=>'2','Thu'=>'3']);
           DB::table('thoigian')->insert(  ['id_ThoiGian'=>'3','Thu'=>'4']);
            DB::table('thoigian')->insert( ['id_ThoiGian'=>'4','Thu'=>'5']);
            DB::table('thoigian')->insert( ['id_ThoiGian'=>'5','Thu'=>'6']);

    }
}
