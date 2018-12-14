<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocPhi extends Model
{
    protected $table = "HocPhi";
    public function lop()
	{
		return $this->hasManyThrough('App\Lop','App\Khoa','MaLop','id_Khoa','HocPhi');
	}
}
