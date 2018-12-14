<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThoiGian extends Model
{
   protected $table = "thoigian";
   protected $primaryKey = 'id_ThoiGian';
   
  public function tkb(){
  	return $this->hasMany('App\ChiTietPhanCong','id_ThoiGian','id_ThoiGian');
  }
}
