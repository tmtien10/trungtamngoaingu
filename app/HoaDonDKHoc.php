<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDonDKHoc extends Model
{
    protected $table = "hoadondkhoc";
    protected $primaryKey = 'id_HoaDonDkHoc'; 
     public $incrementing = false;
     protected $fillable = ['id_HoaDonDkHoc','id_PhieuDKHoc', 'MaNhom', 'NguoiLap'];
     public function phieudkhoc()
	{
		return $this->belongsTo('App\PhieuDKHoc','id_PhieuDKHoc','id_HoaDonDkHoc');

	}
	 public function nhom()
	{
		return $this->belongsTo('App\Nhom','MaNhom','id_HoaDonDkHoc');

	}
	 public function nhanvien()
	{
		return $this->belongsTo('App\NhanVien','MaNhanVien','id_HoaDonDkHoc');

	}
	
}
