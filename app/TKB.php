<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TKB extends Model
{
    protected $table = "tkb";
    protected $primaryKey = 'id_TKB'; 
     protected $fillable = ['id_TKB', 'MaNhom'];
     
      public function nhom()
	{
		return $this->hasMany('App\Nhom','MaNhom','id_TKB');

	}

}
