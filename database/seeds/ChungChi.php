<?php

use Illuminate\Database\Seeder;

class ChungChi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('chungchis')->insert(['tenCC'=>'TOEIC']);
        DB::table('chungchis')->insert(['tenCC'=>'A,B,C quốc gia']);
        DB::table('chungchis')->insert(['tenCC'=>'IELTS']);,
    }
}
