<?php

use Illuminate\Database\Seeder;

class TietHoc extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tiethoc')->insert(
        	['ThoiGianBD'=>'2018-12-01 07:00:00', 'ThoiGianKT'=>'2018-12-01 11:00:00'],
        	['ThoiGianBD'=>'2018-12-01 13:30:00', 'ThoiGianKT'=>'2018-12-01 17:00:00'],
        	['ThoiGianBD'=>'2018-12-01 18:00:00', 'ThoiGianKT'=>'2018-12-01 22:00:00'],


        );

    }
}
