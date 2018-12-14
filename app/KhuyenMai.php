<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
   protected $table = "khuyenmai";
    protected $fillable = ['MaKM', 'TenKM', 'ThoiGianBD', 'ThoiGianKT', 'MucGiam'];
   protected $primaryKey = 'MaKM'; 
  
   
}
