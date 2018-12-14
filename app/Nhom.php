<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhom extends Model
{
    protected $table = "nhom";
    protected $primaryKey = 'MaNhom'; 
     public $incrementing = false;
     protected $fillable = ['MaNhom', 'id', 'MaPhongHoc', 'TenNhom', 'SLHocVien'];
     public function scopegetlastID($query){
		return $this->orderBy('MaNhom','DECS');
	}
     public function lopkhoa()
	{
		return $this->belongsTo('App\LopKhoa','id','id');

	}
	public function phonghoc()
	{
		return $this->belongsTo('App\PhongHoc','MaPhongHoc','MaPhongHoc');
	}

	
}
