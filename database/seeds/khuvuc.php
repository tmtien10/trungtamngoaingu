<?php

use Illuminate\Database\Seeder;

class khuvuc extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('khuvuc')->insert(['TenKhuVuc'=>'A0']);
        DB::table('khuvuc')->insert(['TenKhuVuc'=>'A1']);
        DB::table('khuvuc')->insert(['TenKhuVuc'=>'A7']);
    }
}
