<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietPhanCong extends Model

{
     protected $table = "chitietphancong";
	 protected $primaryKey = 'id';
	  protected $fillable = ['id', 'MaGV', 'MaMonHoc', 'MaNhom','id_TKB','id_TietHoc','id_ThoiGian']; 

   
	 public function monhoc()
	{
		return $this->hasMany('App\MonHoc','MaMonHoc','id');

	}
	 public function nhom()
	{
		return $this->hasMany('App\Nhom','MaNhom','id');

	}
	 public function giangvien()
	{
		return $this->hasMany('App\GiangVien','MaGV','id');

	}
	 public function tkb1(){
  	return $this->belongsTo('App\ThoiGian','id_ThoiGian','id_ThoiGian');
  }
	
	
	
	 public function tkb()
	{
		return $this->hasMany('App\TKB','id_TKB','id');

	}
	 public function tiethoc()
	{
		return $this->hasMany('App\tiethoc','id_TietHoc','id');

	}
}
