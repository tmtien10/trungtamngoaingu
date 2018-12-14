<?php

namespace App\Http\Controllers;
use App\MonHoc;
use Illuminate\Http\Request;
use App\DayMonhoc;
use App\GiangVien;
use App\ThuocMonHoc;
use App\ThoiGian;
use App\TietHoc;
use DB;
class MonHocController extends Controller
{
    public function getDanhSach()
    {
      $monhoc = MonHoc::all();
      return view('admin.monhoc.danhsach',['monhoc'=>$monhoc]);
    }

    public function getThem()
    {
      $giangvien = GiangVien::all();
      return view('admin.monhoc.them',['giangvien'=>$giangvien]);
    }
   

    //truyen requet de nhan du lieu
    public function postThem(Request $request)
    {
      //truyen vao 2 mang
      //mang 1 yeu cau dau vao du lieu
      //mang 2 hien thi thong bao loi
      $this->validate($request,
        [
        'TenMonHoc'=>'required|min:3|unique:KhoaHoc,TenKhoaHoc',
		'GioiThieu'=>'required',
   
        ],
        [
          'TenMonHoc.required'=>'Bạn chưa nhập tên môn hoc',
				'TenMonHoc.min'=>'Tên môn học phải có it nhất 3 kí tự',
				'TenMonHoc.unique'=>'Tên môn học đã tồn tại',
				'GioiThieu.required'=>'Bạn chưa nhập giới thiệu về môn học',
        
				
        ]);
      //sau khi bat loi, ta tao doi tuong 
      $monhoc = new MonHoc;
      $monhoc->TenMonHoc = $request->TenMonHoc;
      $monhoc->GioiThieu = $request->GioiThieu;
      $monhoc->save();

      

    

      return redirect('ad/monhoc/danhsach')->with('thongbao','Thêm thành công');
    }

  public function getSua($MaMonHoc)
    {
   
     $giangvien = GiangVien::all();
   $monhoc = MonHoc::find($MaMonHoc);
      return view('admin.monhoc.sua',['monhoc'=>$monhoc,'giangvien'=>$giangvien]);
}

    public function postSua(Request $request, $MaMonHoc)
    {
      $monhoc = MonHoc::find($MaMonHoc);
      $this->validate($request,
        [
        
    'GioiThieu'=>'required'
        ],
        [
         
        'GioiThieu.required'=>'Bạn chưa nhập giới thiệu về môn học'
        
        ]);
      //sau khi bat loi, ta tao doi tuong 
    
      $monhoc->TenMonHoc=$request->TenMonHoc;
      $monhoc->GioiThieu = $request->GioiThieu;
       $monhoc->save();
      

      return redirect('ad/monhoc/danhsach')->with('thongbao','Sửa thành công');
    }

    public function getXoa($MaMonHoc)
    {
      $monhoc = MonHoc::find($MaMonHoc);
      $monhoc->delete();
      return redirect('ad/monhoc/danhsach')->with('thongbao','Đã xóa thành công');
    }

     public function ds()
    {
      $monhoc = MonHoc::all();
      $thoigian = ThoiGian::all();
      $tiethoc = TietHoc::all();
      return view('admin.test',['monhoc'=>$monhoc,'thoigian'=>$thoigian,'tiethoc'=>$tiethoc]);
    }
    public function  getGV(Request $request){
    $monhoc=$request->mon;
   $data = DB::table('day_mon_hocs')->join('giangvien','giangvien.MaGV','=','day_mon_hocs.MaGV')->where('day_mon_hocs.MaMonHoc',$monhoc)->get();
 
    return response()->json($data);
      }
}
