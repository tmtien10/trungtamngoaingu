<?php

use Illuminate\Database\Seeder;

class khoa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::tabled('khoahoc')->insert([
        	'TenKhoaHoc'=>'K01','Nam'=>'2018'],
        	['TenKhoaHoc'=>'K02','Nam'=>'2019']);
    }
}
