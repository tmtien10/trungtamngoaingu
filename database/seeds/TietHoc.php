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
        	['ThoiGianBD'=>'07:00:00', 'ThoiGianKT'=>'11:00:00'],
        	['ThoiGianBD'=>'13:30:00', 'ThoiGianKT'=>'17:00:00'],
        	['ThoiGianBD'=>'18:00:00', 'ThoiGianKT'=>'22:00:00'],


        );

    }
}
