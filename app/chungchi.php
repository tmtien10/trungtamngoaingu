<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chungchi extends Model
{
    //
    protected $table='chungchis';
    protected $primaryKey = 'MaCC';
    public $incrementing    = false;
     protected $fillable = [
        'MaCC','TenCC','thangdiemXL'
    ];

    public $timestamps=true;

   // public function kithi(){
    		//return $this->hasMany('App\kythi', 'MaKiThi','MaCC');
  //  }
     
}
