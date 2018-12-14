<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thongbao extends Model
{
    //
    protected $table='thongbao';
    protected $primaryKey = 'MaTB';
    public $incrementing    = false;
    protected $fillable = [
        'MaTB', 'TenTB', 'MaNV','NoiDungTB','file','LoaiTB'
    ];
    public $timestamps=true;

    public function cbtt(){
    		return $this->belongsTo('App\cbtt','MaNV','MaNV');
    }
}
