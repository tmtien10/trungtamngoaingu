<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phieudkthi extends Model
{
    //
    protected $table='phieudkthis';
    protected $primaryKey='idphieudk';
    public $incrementing    = false;
     protected $fillable = [
        'idphieudk','MaHocVien','TinhTrang','MaKiThi'
    ];
    public function scopegetlastID($query){
        return $this->orderBy('idphieudk','DESC');
    }
    public function hocvien($query){
    	return $this->belongsTo("App/hocvien","MaHocVien","idphieudk");
    }
    public function chungchi($query){
    	return $this->belongsTo("App/chungchi","MaCC","idphieudk");
    }
    public function kithi($query){
    	return $this->belongsTo("App/phieudkthi","MaKiThi","idphieudk");
    }
}