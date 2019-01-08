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
        $this->call(ThoiGian::class);
        $this->call(ChungChi::class);
        $this->call(khuvuc::class);
        $this->call(khoa::class);
        $this->call(banner::class);
        $this->call(taikhoan::class);
        $this->call(TietHoc::class);


    }
}
