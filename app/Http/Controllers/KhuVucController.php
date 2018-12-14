<?php

namespace App\Http\Controllers;
use App\KhuVuc;
use Illuminate\Http\Request;

class KhuVucController extends Controller
{
    public function getDanhSach()
    {
       $khuvuc = KhuVuc::all();
      return view('admin.khuvuc.danhsach',['khuvuc'=>$khuvuc]);
    }

    public function getThem()
    {
      return view('admin.khuvuc.them');
    }
   

    //truyen requet de nhan du lieu
    public function postThem(Request $request)
    {
      //truyen vao 2 mang
      //mang 1 yeu cau dau vao du lieu
      //mang 2 hien thi thong bao loi
      $this->validate($request,
        [
        'TenKhuVuc'=>'required|min:2|unique:KhuVuc,TenKhuVuc',
		
        ],
        [
          'TenKhuVuc.required'=>'Bạn chưa nhập tên khu vực',
				'TenKhuVuc.min'=>'Tên khu vực phải có it nhất 2 kí tự',
				'TenKhuVuc.unique'=>'Tên khu vực đã tồn tại',
				
        ]);
      
      $khuvuc = new KhuVuc;
      $khuvuc->TenKhuVuc = $request->TenKhuVuc;
      $khuvuc->save();

      return redirect('ad/khuvuc/danhsach')->with('thongbao','Thêm khu vực thành công');
    }

  public function getSua($MaKhuVuc)
    {
      $khuvuc = KhuVuc::find($MaKhuVuc);
      return view('admin.khuvuc.sua',['khuvuc'=>$khuvuc]);
}

    public function postSua(Request $request, $MaKhuVuc)
    {

     $this->validate($request,
        [
        'TenKhuVuc'=>'required|min:1',
    
        ],
        [
          'TenKhuVuc.required'=>'Bạn chưa nhập tên khu vực',
        'TenKhuVuc.min'=>'Tên khu vực phải có it nhất 1 kí tự',
       
        
        ]);
      
      $khuvuc = KhuVuc::find($MaKhuVuc);
      $khuvuc->TenKhuVuc = $request->TenKhuVuc;
      $khuvuc->save();

      return redirect('ad/khuvuc/danhsach')->with('thongbao','Sửa khu vực thành công');
  
    }

    public function getXoa($MaKhuVuc)
    {
      $khuvuc = KhuVuc::find($MaKhuVuc);
      $khuvuc->delete();
      return redirect('ad/khuvuc/danhsach')->with('thongbao','Đã xóa thành công');

    }
   
}
