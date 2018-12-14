<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoTuanHoc extends Model
{
     protected $table = "cotuanhoc";
      protected $primaryKey = ['id_Tuan','id_TKB']; 
    protected $fillable = ['id_Tuan','id_TKB'];
    public $incrementing=false;
     public function tkb()
	{
		return $this->hasMany('App\TKB','id_TKB','id_Tuan','id_TKB');

	}
	 public function tuanhoc()
	{
		return $this->hasMany('App\TuanHoc','id_Tuan','id_Tuan','id_TKB');

	}
}
