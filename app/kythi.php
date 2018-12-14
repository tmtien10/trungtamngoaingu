<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kythi extends Model
{
    //
     protected $table='kythis';
    protected $primaryKey = 'MaKiThi';
    public $incrementing    = false;

    protected $fillable = [
        'MaKiThi','TenKiThi', 'NgayThi', 'GioBatDau','GioKetThuc','MaCC','LePhi'
    ];

    public $timestamps=true;

    public function chungchi(){
    		return $this->belongsTo('App\chungchi', 'MaCC','MaKiThi');
    }
    public function phieudkthi(){
            return $this->hasMany('App\phieudkthi', 'MaKiThi','MaKiThi');
    }
}
