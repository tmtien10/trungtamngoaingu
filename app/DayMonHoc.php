<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DayMonHoc extends Model
{
    protected $table = "day_mon_hocs";
     protected $primaryKey = ['MaMonHoc','MaGV']; 
    protected $fillable = ['MaMonHoc','MaGV'];
    public $incrementing=false;
     public function giangvien()
	{
		return $this->hasMany('App\GiangVien','MaGV','MaMonHoc');

	}
	 public function monhoc()
	{
		return $this->hasMany('App\MonHoc','MaMonHoc','MaGV');

	}
}
