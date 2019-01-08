<?php

use Illuminate\Database\Seeder;

class taikhoan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('taikhoan')->insert(
        	['username'=>'Admin','password'=>bcrypt('123456789'),'quyen'=>'1','confirmed'=>'1']

        );
    }
}
