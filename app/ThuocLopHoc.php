<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThuocLopHoc extends Model
{
    protected $table = "thuoc_lop_hocs";
     protected $primaryKey = ['MaNhom','MaHocVien']; 
    protected $fillable = ['MaNhom','MaHocVien'];
    public $incrementing=false;
     public function hocvien()
	{
		return $this->hasMany('App\HocVien','MaHocVien','NaNhom');

	}
	 public function nhom()
	{
		return $this->hasMany('App\Nhom','MaNhom','MaNhom');

	}
}
