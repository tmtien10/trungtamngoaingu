<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class tkcbtt extends Model
{
    //
    protected $table='tkcbtt';
    protected $fillable = [
        'username', 'MaNV'
    ];
	protected $primaryKey = ['username','MaNV'];
	    public $incrementing    = false;
}
