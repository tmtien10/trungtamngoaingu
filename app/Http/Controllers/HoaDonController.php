<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\phieudkthi;
use DB;
use Auth;
use App\hocvien;
use App\hoadonthi;
use App\kythi;
use chungchi;
use Session;
use App\tkcbtt; 
use App\diemthichungchi;


class HoaDonController extends Controller
{
    //
    public function viewList(){
    	$hoadon=DB::table('hoadonthis')->join('cbtt','cbtt.MaNV','=','hoadonthis.MaNV')->get();
    	return view('admin.hoadon.hoadonthi')->with('hoadon',$hoadon);


    }
    public function viewCreate(Request $request){
    	$phieu=phieudkthi::where('idphieudk',$request->hoadon)->get();
    	return view('admin.hoadon.themhoadonthi')->with('phieu',$phieu);
    }
    public function postCreate(Request $request){
    	$user=Auth::user()->username;
       $nv=DB::table('tkcbtt')->where('username',$user)->first();
        $phongthi=diemthichungchi::where('MaKiThi',$request->makt)->where('MaHocVien',$request->mahv)->select('PhongThi')->get();
      if(!$phongthi->isEmpty()){
        $phong=$phongthi[0]->PhongThi;

      }
      else $phong=0;

        hoadonthi::create([

    		'idphieudk'=>$request->hoadon,
    		'MaNV'=>$nv->MaNV,
            'phongthi'=>$phong
    	]);
        Session::flash('success', 'Thêm hóa đơn thành công');
    	return redirect('/ad/hoadon');
    
}
    public function viewChitiet($id){
    	$hoadon=hoadonthi::where('id_hoadon',$id)->get();
    	return view('admin.hoadon.chitiethoadondkthi')->with('hoadon',$hoadon);
    }
    public function delete($id){
    	hoadonthi::destroy($id);
    	Session::flash('success', 'Xóa thành công');
    	return redirect('/ad/hoadon');
    }
}
