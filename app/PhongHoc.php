<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhongHoc extends Model
{
   protected $table = "phonghoc";
   protected $primaryKey = 'MaPhongHoc'; 
   protected $fillable = ['MaPhongHoc','MaKhuVuc'];

   public function khuvuc()
	{
		return $this->belongsTo('App\KhuVuc','MaKhuVuc','MaKhuVuc');
	}
   
}
