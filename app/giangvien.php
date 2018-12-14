<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiangVien extends Model
{
   protected $table = "giangvien";
   protected $fillable = ['MaGV', 'HoTenGV', 'GioiTinhGV', 'NgaySinhGV', 'DiaChiGV', 'EmailGV','SDTGV','TrinhDoGV'];
   protected $primaryKey = 'MaGV'; 
    public $incrementing = false;
    public function scopegetlastID($query){
		return $this->orderBy('MaGV','DECS');
	}
}
