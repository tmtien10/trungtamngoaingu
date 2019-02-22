<?php

namespace App\Http\Controllers;
use App\PhieuDKHoc;
use App\HocVien;
use App\LopHoc;
use App\LopKhoa;
use App\Nhom;
use App\HoaDonDKHoc;
use DB;
use Auth;
use App\tkHocVien;
use Session;
use Illuminate\Http\Request;

class PhieuDangKiController extends Controller
{
    public function getDanhSach()
    {
      $phieudkhoc = PhieuDKHoc::all();
      return view('admin.phieudangki.danhsach',['phieudkhoc'=>$phieudkhoc]);
    }
  

    public function getThem()
    {
      $hocvien = HocVien::all();
      $lophoc = LopHoc::all();
      $lopkhoa = lopkhoa::all();
     $phieudkhoc = DB::table('phieudkhoc')->join('lopkhoa','lopkhoa.id','=','phieudkhoc.id')->get();
     $nhom = Nhom::all();

      return view('admin.phieudangki.them',['hocvien'=>$hocvien,'lophoc'=>$lophoc,'phieudkhoc'=>$phieudkhoc,'lopkhoa'=>$lopkhoa,'nhom'=>$nhom]);
    }
   

    //truyen requet de nhan du lieu
   public function postThem(Request $request)
    {
      //truyen vao 2 mang
      //mang 1 yeu cau dau vao du lieu
      //mang 2 hien thi thong bao loi
      $this->validate($request,
        [
       
       
        'HocVien'=>'required',
        'LopKhoa'=>'required',
        'BuoiHoc'=>'required',
       'Thu'=>'required',


        ],
        [
          
        'HocVien.required'=>'Bạn chưa nhập họ tên học viên',
        'LopKhoa.required'=>'Bạn chưa chọn lớp học',
        'BuoiHoc.required'=>'Bạn chưa chọn buổi học',
        'Thu.required'=>'Bạn chưa chọn thứ muốn học',

        
        ]);
      //sau khi bat loi, ta tao doi tuong 
      $phieudkhoc = new PhieuDKHoc;
      
     $phieudkhoc->MaHocVien = $request->HocVien;
     $phieudkhoc->id = $request->LopKhoa;
      $phieudkhoc->BuoiHoc = $request->BuoiHoc;
       $phieudkhoc->Thu= $request->Thu;
      $phieudkhoc->TinhTrang = 0;
      $phieudkhoc->save();

       $hoadondkhoc = new HoaDonDKHoc;
      
       
        $hoadondkhoc->id_PhieuDKHoc = $phieudkhoc->id_PhieuDKHoc;
        $hoadondkhoc->MaNhom = Null;
       
        $hoadondkhoc->NguoiLap = Null;
         
      
        
       $hoadondkhoc->save();

      return redirect('ad/phieudangki/danhsach')->with('thongbao','Thêm phiếu đăng kí học thành công');
    }
  public function getSua($id_PhieuDKHoc)
    {  
   $phieudkhoc = PhieuDKHoc::where('id_PhieuDKHoc',$id_PhieuDKHoc)->get();
      return view('admin.phieudangki.sua')->with('phieu',$phieudkhoc);
}

    public function postSua( Request $request)
    {
       DB::table('phieudkhoc')->where('id_PhieuDKHoc',$request->duyet)->update(['TinhTrang'=>$request->tinhtrang]); 

      $phieu=PhieuDKHoc::where('id_PhieuDKHoc',$request->duyet)->get();
      return view('admin.hoadon.them')->with('phieu',$phieu);
    
    }

    public function getXoa($id_PhieuDKHoc)
    {
      $phieudkhoc = PhieuDKHoc::find($id_PhieuDKHoc);
      $phieudkhoc->delete();
      return redirect('ad/phieudangki/danhsach')->with('thongbao','Đã xóa thành công');
    }
       public function Create($id){
       $user=Auth::user()->username;
       $hovien=tkHocVien::where('username',$user)->first();
       $da_tk=DB::table('phieudkhoc')->where('MaHocVien','=',$hovien->MaHocVien)->where('id',$id)->count();
       if($da_tk==0){
      
      $phieudkhoc = new PhieuDKHoc;
      
     $phieudkhoc->MaHocVien = $hovien->MaHocVien;
     $phieudkhoc->id = $id;
      $phieudkhoc->TinhTrang = 0;

      $phieudkhoc->save();


        Session::flash('success', 'Đăng kí thành công.Mã số phiếu là #'.$phieudkhoc->id_PhieuDKHoc);
                      return redirect('hocvien/lopdk');
      
      }
      else {
         Session::flash('error', 'Bạn đã đăng kí trước đó');
                      return redirect('hocvien/lopdk');
      }

    }
    public function view_phieudk($id){

       $user=Auth::user()->username;
       $hovien=tkHocVien::where('username',$user)->first();

      $phieu=DB::table('phieudkhoc')->where('id_PhieuDKHoc',$id)->where('MaHocVien',$hovien->MaHocVien)->first();

      return view('page.chitietdkhoc')->with('phieu',$phieu);
    }
    
}
