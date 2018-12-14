<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTiet_TietHoc extends Model
{
	 protected $table = "Chitiet_tiethoc";
     public function tiethoc()
	{
		return $this->hasMany('App\TietHoc','id_Tiet','id_chitiet');

	}
	 public function monhoc()
	{
		return $this->hasMany('App\MonHoc','MaMonHoc','id_chitiet');

	}
	 public function tkb()
	{
		return $this->hasMany('App\TKB','id_TKB','id_chitiet');

	}
	 public function giangvien()
	{
		return $this->hasMany('App\GiangVien','MaGV','id_chitiet');

	}
}
