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
        DB::table('chungchis')->insert(
        	['tenCC'=>'TOEIC'],
        	['tenCC'=>'A,B,C quốc gia'],
        	['tenCC'=>'IELTS'],
        	['tenCC'=>'TOEFL cBT'],
        );
    }
}
