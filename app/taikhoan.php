<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class taikhoan extends Model
{
    //
    protected $table='taikhoan';
    protected $primaryKey = 'username';
    public $incrementing    = false;
    protected $fillable = [
        'username', 'quyen', 'password','confirmation_code','avatar','confirmed'
    ];
    public $timestamps=true;

    public function cbtt(){
    		return $this->belongsToMany('App\cbtt', 'tkcbtt','username','MaNV');
    }
     public function hocvien(){
    		return $this->belongsToMany('App\hocvien', 'tkhv','username','MaHocVien');
    }
   
}
