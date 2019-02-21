<?php

use Illuminate\Database\Seeder;

class monhoc extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
    	DB::table('monhoc')->insert('TenMonHoc'=>'Speaking','GioiThieu'=>'Speaking');
        DB::table('monhoc')->insert('TenMonHoc'=>'Listening','GioiThieu'=>'Speaking');
        DB::table('monhoc')->insert('TenMonHoc'=>'Writting','GioiThieu'=>'Speaking');
        DB::table('monhoc')->insert('TenMonHoc'=>'Gramma','GioiThieu'=>'Speaking');
        
    }
}
