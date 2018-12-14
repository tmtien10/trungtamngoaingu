<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LopHoc extends Model
{
    protected $table = "lophoc";
    protected $primaryKey = 'MaLop'; 
    public $incrementing = false;
   
  public function tiethoc()
	{
		return $this->belongsTo('App\TietHoc','id_TietHoc','MaLop');

	}
}
