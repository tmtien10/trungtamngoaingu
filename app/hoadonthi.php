<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 
use App\cbtt;
use App\kithi;

class hoadonthi extends Model
{
    //
    protected $table='hoadonthis';
    protected $primaryKey = 'id_hoadon';
    public $incrementing    = false;
    protected $fillable = [
        'id_hoadon', 'idphieudk', 'MaNV','phongthi'
    ];
    public $timestamps=true;
	public function cbtt(){
    		return $this->belongsto('App\cbtt', 'MaNV','id_hoadon');
    }
     public function kithi(){
    		return $this->belongsto('App\kithi','idphieudk','id_hoadon');
    }
    
}
