<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class diemthichungchi extends Model
{
    //
     protected $table='diemthichungchis';
    protected $primaryKey = ['MaKiThi','MaHocVien'];
    public $incrementing    = false;

    protected $fillable = [
        'MaKiThi','MaHocVien','PhongThi','DiemThi'
    ];

    public $timestamps=true;
}
