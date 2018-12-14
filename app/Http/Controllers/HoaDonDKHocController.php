<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhieuDKHoc;
use App\Nhom;
use App\HoaDonDKHoc;
use App\lopkhoa;
use App\KhuyenMai;
use App\Co;
use DB;
use App\HocVien;
use App\LopHoc;
use App\ThuocLopHoc;
use Auth;

class HoaDonDKHocController extends Controller
{
     public function getDanhSach()
    {
        $hoadonhoc = DB::table('phieudkhoc')->join('hoadondkhoc','hoadondkhoc.id_PhieuDKHoc','=','phieudkhoc.id_PhieuDKHoc')->join('cbtt','cbtt.MaNV','=','hoadondkhoc.MaNV')->orderBy('id_HoaDonDkHoc','DESC')->get();
      return view('admin.hoadon.danhsach',['hoadon'=>$hoadonhoc]);
    }

    public function getThem()

    {
        $phieudkhoc = PhieuDKHoc::all();
       $nhom = Nhom::all();

        return view('admin.hoadon.them',['phieudkhoc'=>$phieudkhoc,'nhom'=>$nhom]);
    }


    //truyen requet de nhan du lieu
    public function postThem(Request $request)
    {

       $user=Auth::user()->username;
       $nv=DB::table('tkcbtt')->where('username',$user)->first();

       //lấy nhóm học

       $phong=DB::table('thuoc_lop_hocs')->join('nhom','nhom.MaNhom','=','thuoc_lop_hocs.MaNhom')->join('lopkhoa','lopkhoa.id','=','nhom.id')->where('MaHocVien',$request->mahv)->where('lopkhoa.id',$request->malop)->first();
        $p=NULL;
        if(!empty($phong)){
            $p=$phong->MaNhom;
        }
        $hoadondkhoc = new HoaDonDKHoc;
       
        $hoadondkhoc->id_PhieuDKHoc = $request->duyet;       
        $hoadondkhoc->MaNV = $nv->MaNV; 
        $hoadondkhoc->MaNhom=$p;
         $hoadondkhoc->save();
       
        return redirect('ad/hoadonhoc/danhsach')->with('thongbao','Thêm hóa đơn thành công');

    	
    
    }
    public function getChiTiet($id_HoaDonDkHoc)

    {
        $phieu = DB::table('phieudkhoc')->join('hoadondkhoc','hoadondkhoc.id_PhieuDKHoc','=','phieudkhoc.id_PhieuDKHoc')->join('cbtt','cbtt.MaNV','=','hoadondkhoc.MaNV')->where('id_HoaDonDkHoc',$id_HoaDonDkHoc)->get();  
        return view('admin.hoadon.chitiethoadondkhoc')->with('phieu',$phieu);
    }


   

    public function getXoa($id_HoaDonDkHoc)
    {
          $hoadondkhoc = HoaDonDKHoc::find($id_HoaDonDkHoc);
         $hoadondkhoc->delete();
        return redirect('ad/hoadonhoc/danhsach')->with('thongbao','Xóa hóa đơn thành công');
        
    }
}
