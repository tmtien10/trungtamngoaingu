<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LopKhoa extends Model
{
    protected $table = "lopkhoa";
    protected $primaryKey = 'id'; 
    protected $fillable = ['id', 'MaKhoa', 'MaLop', 'HocPhi', 'NgayKhaiGiang', 'NgayKetThuc','TieuDe','BuoiHoc','NgayChan','ThongTinLop'];
  
    public function lophoc()
	{
		return $this->belongsTo('App\LopHoc','MaLop','MaLop');
	}
	public function khoahoc()
	{
		return $this->belongsTo('App\KhoaHoc','MaKhoa','MaKhoa');
	}

}
