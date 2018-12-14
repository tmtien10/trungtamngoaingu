<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuDKHoc extends Model
{
   protected $table = "phieudkhoc";
   protected $primaryKey = 'id_PhieuDKHoc'; 
  
      protected $fillable = ['id_PhieuDKHoc', 'MaHocVien', 'id', 'TinhTrang','created_at'];
	 public function hocvien()
	{
		return $this->hasMany('App\HocVien','MaHocVien','id_PhieuDKHoc');

	}
	 public function lopkhoa()
	{
		return $this->belongsTo('App\LopKhoa','id','id_PhieuDKHoc');

	}

}
