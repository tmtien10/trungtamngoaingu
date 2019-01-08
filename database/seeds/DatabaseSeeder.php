<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ThoiGianSeeder::class);
        $this->call(ChungChiSeeder::class);
        $this->call(khuvucSeeder::class);
        $this->call(TietHocSeeder::class);


    }
}
