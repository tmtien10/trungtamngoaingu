<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhoaHoc extends Model
{
     protected $table = "khoahoc";
      protected $primaryKey = 'MaKhoa'; 
       public $incrementing = false;
       
      public function lophoc()
	{
		return $this->hasMany('App\LopHoc','MaLop','MaLop');
	}
   
}
