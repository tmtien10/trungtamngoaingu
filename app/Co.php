<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Co extends Model
{
    protected $table = "co";
    protected $primaryKey = ['MaLop','MaKM']; 
    protected $fillable = ['MaKM','MaLop'];
   public $incrementing = false;
     public function lophoc()
	{
		return $this->hasMany('App\LopHoc','MaLop','MaLop');

	}
	 public function khuyenmai()
	{
		return $this->hasMany('App\khuyenmai','MaKM','MaKM');

	}
}
