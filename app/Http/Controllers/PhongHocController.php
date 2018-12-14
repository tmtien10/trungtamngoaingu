<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PhongHoc;
use App\KhuVuc;
use DB;


class PhongHocController extends Controller
{
     public function getDanhSach()
    {
    	
      $phonghoc = PhongHoc::all();
      return view('admin.phonghoc.danhsach',['phonghoc'=>$phonghoc]);
    }

    public function getThem()
    {
        $khuvuc = Khuvuc::all();
        return view('admin.phonghoc.them',['khuvuc'=>$khuvuc]);
    }


    //truyen requet de nhan du lieu
    public function postThem(Request $request)
    {

    	
        $this->validate($request,
            [   
               
                 'MaPhongHoc'=>'required|min:2:PhongHoc,MaPhongHoc',
                'KhuVuc'=>'required'
            ],
            [
               
                'KhuVuc.required'=>'Bạn chưa chọn khu vực',
                 'MaPhongHoc.required'=>'Bạn chưa mã phòng học',
                 'MaPhongHoc.min'=>'Mã phòng học có ít nhất 2 ký tự',
              
            ]);
        $phonghoc = new PhongHoc;
       
         $phonghoc->MaPhongHoc = $request->MaPhongHoc;
          $phonghoc->MaKhuVuc = $request->KhuVuc;
		
        
        $phonghoc->save();
       
        return redirect('ad/phonghoc/danhsach')->with('thongbao','Thêm phòng học thành công');
    }

    public function getSua($MaPhongHoc)
    {
       
        $phonghoc = PhongHoc::find($MaPhongHoc);
          $khuvuc = Khuvuc::all();
        return view('admin.phonghoc.sua',['phonghoc'=>$phonghoc,'khuvuc'=>$khuvuc]);
    }

    
    public function postSua(Request $request, $MaPhongHoc)
    {       
        
        $this->validate($request,
            [   
               
                 'MaPhongHoc'=>'required|min:2:PhongHoc,MaPhongHoc',
                'KhuVuc'=>'required'
            ],
            [
               
                'KhuVuc.required'=>'Bạn chưa chọn khu vực',
                 'MaPhongHoc.required'=>'Bạn chưa mã phòng học',
                 'MaPhongHoc.min'=>'Mã phòng học có ít nhất 2 ký tự',
              
            ]);
          $phonghoc = PhongHoc::find($MaPhongHoc);
       
         $phonghoc->MaPhongHoc = $request->MaPhongHoc;
          $phonghoc->MaKhuVuc = $request->KhuVuc;
    
        
        $phonghoc->save();
       
        return redirect('ad/phonghoc/danhsach')->with('thongbao','Sửa phòng học thành công');
    }

    public function getXoa($MaPhongHoc)
    {
        $phonghoc = PhongHoc::find($MaPhongHoc);
        $phonghoc->delete();
        return redirect('ad/phonghoc/danhsach')->with('thongbao','Xóa thành công'.  $phonghoc->MaPhongHoc);
    }
    
}
