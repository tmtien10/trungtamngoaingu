<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LopKhoa;
use App\KhoaHoc;
use App\LopHoc;
use Carbon\Carbon;

class LopKhoaController extends Controller
{
     public function getDanhSach()
    {
    	
      $lopkhoa = LopKhoa::all();
      return view('admin.lopkhoa.danhsach',['lopkhoa'=>$lopkhoa]);
    }

    public function getThem()
    {
       $khoahoc = KhoaHoc::all();
       $lophoc = LopHoc::all();
        return view('admin.lopkhoa.them',['khoahoc'=>$khoahoc,'lophoc'=> $lophoc]);
    }


    //truyen requet de nhan du lieu
    public function postThem(Request $request)
    {

    	
        $this->validate($request,
            [   
                'KhoaHoc'=>'required',
                'LopHoc'=>'required',
                'NgayKhaiGiang'=>'required',
                'NgayKetThuc'=>'required',
                 'HocPhi'=>'required',
                  'TieuDe'=>'required',
                 
                'NgayChan'=>'required',
                
            ],
            [
                'MaKhoa.required'=>'Bạn chưa chọn mã khóa',
                 'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
                'MaLop.required'=>'Bạn chưa chọn mã lớp',
                'NgayKhaiGiang.required'=>'Bạn chưa nhập ngày khai giảng',
                'NgayKetThuc.required'=>'Bạn chưa nhập ngày kết thúc',
                'HocPhi.required'=>'Bạn chưa nhập học phí',
               
                 'NgayChan.required'=>'Bạn chưa nhập thứ ngày học',
                 
            ]);
        $lopkhoa = new lopkhoa;
       
         $lopkhoa->MaKhoa = $request->KhoaHoc;
          $lopkhoa->MaLop = $request->LopHoc;
		$lopkhoa->HocPhi = $request->HocPhi;
          $lopkhoa->NgayKhaiGiang = $request->NgayKhaiGiang;
        $lopkhoa->NgayKetThuc = $request->NgayKetThuc;
          $lopkhoa->TieuDe= $request->TieuDe;

        
       $lopkhoa->NgayChan = json_encode($request->NgayChan);
        
        
        $lopkhoa->save();
       
        return redirect('ad/lopkhoa/danhsach')->with('thongbao','Thêm lớp khóa thành công');
    }

    public function getSua($id)
    {
        $khoahoc = KhoaHoc::all();
       $lophoc = LopHoc::all();
      
        $lopkhoa = LopKhoa::find($id);
        return view('admin.lopkhoa.sua',['khoahoc'=>$khoahoc,'lopkhoa'=>$lopkhoa,'lophoc'=> $lophoc]);
    }

    
    public function postSua(Request $request, $id)
    {       
        
        $this->validate($request,
            [   
               
                'TieuDe'=>'required',
                'NgayKhaiGiang'=>'required',
                'NgayKetThuc'=>'required',
                 'HocPhi'=>'required',
            
                'NgayChan'=>'required',
               
            ],
            [
                
                'NgayKhaiGiang.required'=>'Bạn chưa nhập ngày khai giảng',
                'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
                'NgayKetThuc.required'=>'Bạn chưa nhập ngày kết thúc',
                'HocPhi.required'=>'Bạn chưa nhập học phí',
               
                 'NgayChan.required'=>'Bạn chưa nhập thứ ngày học',
              
            ]);
       
        $lopkhoa = lopkhoa::find($id);
         
		$lopkhoa->HocPhi = $request->HocPhi;
          $lopkhoa->NgayKhaiGiang = $request->NgayKhaiGiang;
        $lopkhoa->NgayKetThuc = $request->NgayKetThuc;
         $lopkhoa->TieuDe= $request->TieuDe;
        
        
       $lopkhoa->NgayChan = json_encode($request->NgayChan);
     
        
        $lopkhoa->save();
       
        return redirect('ad/lopkhoa/danhsach')->with('thongbao','Sửa lớp khóa thành công');
    }

    public function getXoa($id)
    {
        $lopkhoa = LopKhoa::find($id);
        $lopkhoa->delete();
        return redirect('ad/lopkhoa/danhsach')->with('thongbao','Xóa thành công'.$lopkhoa->MaLop);
    }
}
