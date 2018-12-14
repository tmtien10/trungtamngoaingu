<?php

namespace App\Http\Controllers;
use App\KhoaHoc;
use Illuminate\Http\Request;

class KhoaHocController extends Controller
{
    public function getDanhSach()
    {
      $khoahoc = KhoaHoc::orderBy('MaKhoa','DESC')->get();
      return view('admin.khoahoc.danhsach',['khoahoc'=>$khoahoc]);
    }

    public function getThem()
    {
      return view('admin.khoahoc.them');
    }
   

    //truyen requet de nhan du lieu
    public function postThem(Request $request)
    {
      //truyen vao 2 mang
      //mang 1 yeu cau dau vao du lieu
      //mang 2 hien thi thong bao loi
      $this->validate($request,
        [
        'TenKhoaHoc'=>'required|min:3|unique:KhoaHoc,TenKhoaHoc',
		'Nam'=>'required'
        ],
        [
          'TenKhoaHoc.required'=>'Bạn chưa nhập tên khóa hoc',
				'TenKhoaHoc.min'=>'Tên khóa học phải có it nhất 3 kí tự',
				'TenKhoaHoc.unique'=>'Tên khóa học đã tồn tại',
				'Nam.required'=>'Bạn chưa chọn năm cho khóa học'
				
        ]);
      //sau khi bat loi, ta tao doi tuong 
      $khoahoc = new KhoaHoc;
      $khoahoc->TenKhoaHoc = $request->TenKhoaHoc;
      $khoahoc->Nam = $request->Nam;
      $khoahoc->save();

      return redirect('ad/khoahoc/danhsach')->with('thongbao','Thêm thành công');
    }

  public function getSua($MaKhoa)
    {
     
   $khoahoc = KhoaHoc::find($MaKhoa);
      return view('admin.khoahoc.sua',['khoahoc'=>$khoahoc]);
}

    public function postSua(Request $request, $MaKhoa)
    {
      $khoahoc = KhoaHoc::find($MaKhoa);
      $this->validate($request,
       [
        'TenKhoaHoc'=>'required|min:3|',
    'Nam'=>'required'
        ],
        [
          'TenKhoaHoc.required'=>'Bạn chưa nhập tên khóa hoc',
        'TenKhoaHoc.min'=>'Tên khóa học phải có it nhất 3 kí tự',

        'Nam.required'=>'Bạn chưa chọn năm cho khóa học'
        
        ]);
      //sau khi bat loi, ta tao doi tuong 
    
    $khoahoc->TenKhoaHoc= $request->TenKhoaHoc;
      $khoahoc->Nam = $request->Nam;
      $khoahoc->save();

      return redirect('ad/khoahoc/danhsach')->with('thongbao','Sửa thành công');
    }

    public function getXoa($MaKhoa)
    {
      $khoahoc = KhoaHoc::find($MaKhoa);
      $khoahoc->delete();
      return redirect('ad/khoahoc/danhsach')->with('thongbao','Đã xóa thành công');
    }
}
