<?php

use Illuminate\Database\Seeder;

class banner extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('slide')->insert([
        	['image'=>'banner1.jpg'],
        	['image'=>'banner2.jpg'],
        ]);
    }
}
