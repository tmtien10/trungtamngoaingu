<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocVien extends Model
{
     protected $table = "hocvien";
     protected $fillable = ['MaHocVien', 'HoTenHocVien', 'GioiTinh', 'NgaySinh', 'DiaChi', 'Email','SDT','CMND','NgheNghiep','NgayCap'];
     protected $primaryKey = 'MaHocVien'; 
      public $incrementing = false;
	public function scopegetlastID($query){
		return $this->orderBy('MaHocVien','DECS');
	}
}
