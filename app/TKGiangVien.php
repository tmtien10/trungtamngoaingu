<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TKGiangVien extends Model
{
     protected $table = "tkhocgiangvien";
     protected $fillable = ['MaGV','username'];
     public function giangvien()
     {
     return $this->hasMany('App\giangvien','MaGV','UserName');
     }
}
