<?php

use Faker\Generator as Faker;
use App\hocvien;
use App\GiangVien;
use App\DayMonHoc;
use App\kythi'

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\hocvien::class, function (Faker $faker) {
    return [
        'HoTenHocVien' => $faker->name,
        'GioiTinh'=>$faker->randomElement($array = array('Nam','Nữ')),
        'Email' => $faker->unique()->safeEmail,
        'NgaySinh'=>$faker->dateTimeBetween('1975-01-01', '2000-12-31')
    ->format('Y/m/d'),
        'SDT'=>$faker->unique()->phoneNumber,
        'DiaChi'=>$faker->address,
    ];
});
$factory->define(App\giangvien::class, function (Faker $faker) {
    return [
        'HoTenGV' => $faker->name,
        'GioiTinhGV'=>$faker->randomElement($array = array('Nam','Nữ')),
        'TrinhDoGV'=>'Đại học',
        'EmailGV' => $faker->unique()->safeEmail,
        'NgaySinhGV'=>$faker->dateTimeBetween('1975-01-01', '2000-12-31')
    ->format('Y/m/d'),
        'SDTGV'=>$faker->unique()->phoneNumber,
        'DiaChiGV'=>$faker->address,
        'TinhTrang'=>1
    ];
});
$factory->define(App\cbtt::class, function (Faker $faker) {
    return [
        'HoTenNV' => $faker->name,
        'GioiTinhNV'=>$faker->randomElement($array = array('Nam','Nữ')),
        'TinhTrang'=>'1',
        'EmailNV' => $faker->unique()->safeEmail,
        'NgaySinhNV'=>$faker->dateTimeBetween('1975-01-01', '2000-12-31')
    ->format('Y/m/d'),
        'SDTNV'=>$faker->unique()->phoneNumber,
        'DiaChiNV'=>$faker->address,
        'TinhTrang'=>1,
    ];
});

$factory->define(App\PhieuDKHoc::class, function (Faker $faker) {
    return [
      'MaHocVien' =>hocvien::all()->unique()->random()->MaHocVien,
      'id' =>  7,
      'TinhTrang' => 1,
      
    ];
});
$factory->define(App\phieudkthi::class, function (Faker $faker) {
    return [
      'MaHocVien' =>hocvien::all()->unique()->random()->MaHocVien,
      'MaKiThi' =>  kythi::all()->unique()->random()->MaKiThi,
      'TinhTrang' => 1,
      
    ];
});
$factory->define(App\DayMonHoc::class, function (Faker $faker) {
    return [
      'MaMonHoc' =>MonHoc::all()->random()->MaMonHoc,
      'MaGV' =>  GiangVien::all()->random()->MaGV,
      
    ];
});
