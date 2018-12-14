<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TKHocVien extends Model
{
     protected $table = "tkhv";
protected $fillable = ['MaHocVien','username'];

     public function hocvien()
     {
     return $this->hasMany('App\hocvien','MaHocVien','UserName');
     }
}
