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
        DB::table('khoahoc')->insert(['TenKhoaHoc'=>'K01','Nam'=>'2018']);
        DB::table('khoahoc')->insert(['TenKhoaHoc'=>'K02','Nam'=>'2019']);
    }
}
