<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cbtt extends Model
{
    //
     protected $table='cbtt';
     protected $primaryKey = 'MaNV';
    public $incrementing    = false;
     protected $fillable = [
        'MaNV','HoTenNV', 'GioiTinhNV', 'NgaySinhNV','DiaChiNV','SDTNV','EmailNV'
    ];

    public $timestamps=false;

    public function taikhoan(){
    		return $this->belongsToMany('App\taikhoan', 'tkcbtt','MaNV','username');
    }
    public function thongbao(){
            return $this->hasMany('App\thongbao','MaNV','MaTB');
    }
    
  
     public function scopegetlastID($query)
    {
        return $this->orderBy('MaGV', 'DESC');
    }
}
