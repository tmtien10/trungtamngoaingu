<?php

namespace App\Http\Controllers;
use App\LopHoc;
use App\Co;
use App\KhuyenMai;
use Illuminate\Http\Request;
use DB;
use App\lopkhoa;
use App\TietHoc;

class LopHocController extends Controller
{
    public function getDanhSach()
    {
      $lophoc = LopHoc::all();
      return view('admin.lophoc.danhsach',['lophoc'=>$lophoc]);
    }

    public function getThem()
    {
        
        $tiethoc = TietHoc::all();
        return view('admin.lophoc.them',['tiethoc'=>$tiethoc]);
    }


    //truyen requet de nhan du lieu
    public function postThem(Request $request)
    {
        $this->validate($request,
            [   
               
                'TenLop'=>'required|min:3',
                'SoTuanHoc'=>'required',
                'GioiThieu'=>'required'
            ],
            [
               
                 
                'TenLop.required'=>'Bạn chưa nhập tên lớp',
                'TenLop.min'=>'Tên lớp phải có it nhất 3 kí tự',
                'SoTuanHoc.required'=>'Bạn chưa nhập số tuần học',
                'GioiThieu.required'=>'Bạn chưa nhập giới thiệu'
            ]);
        $lophoc = new lopHoc;
       
        $lophoc->TenLop = $request->TenLop;
        $lophoc->SoTuanHoc = $request->SoTuanHoc;
        $lophoc->GioiThieu = $request->GioiThieu;
        $lophoc->id_TietHoc = $request->TietHoc;
        // kiem tra neu co anh thi luu con khong thi de rong
        if($request->hasFile('Hinh'))
        {
            //neu truyen hinhanh thi lay file do ra
            $file = $request->file('Hinh');
            //kiem tra dinh dang duoi hinh
            $duoi = $file->getClientOriginalExtension();
            if($duoi !=  'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('ad/lophoc/them')->with('thongbao','Bạn chỉ được chọn đuôi jpg, png, jpeg');
            }
            //lay ten hinh ra
            $name = $file->getClientOriginalName();
            //dat ten hinh random 4 ki tu
            $Hinh = str_random(4)."_".$name;
            //tranh random trung
            while(file_exists("upload/lophoc/".$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }
            //luu hinh
            $file->move("upload/lophoc",$Hinh);
            //sau khi luu xong them truong Hinh vao trong
            $lophoc->Hinh = $Hinh;
        }
        else
        {
            $lophoc->Hinh = "";
        }
        //luu lai
        $lophoc->save();
        //tra ve trang them va hien thi thong bao thanh cong
        return redirect('ad/lophoc/danhsach')->with('thongbao','Thêm lớp học thành công');
    }

    public function getSua($MaLop)
    {
        $lophoc = LopHoc::find($MaLop);
        $tiethoc = TietHoc::all();
        return view('admin.lophoc.sua',['lophoc'=>$lophoc,'tiethoc'=>$tiethoc]);
    }

    //truyen requet de nhan du lieu
    public function postSua(Request $request, $MaLop)
    {
        $lophoc = LopHoc::find($MaLop);
        $this->validate($request,
            [   
               
                'TenLop'=>'required|min:3',
                'SoTuanHoc'=>'required',
                'GioiThieu'=>'required'
            ],
            [
                
                 
                'TenLop.required'=>'Bạn chưa nhập tên lớp',
                'TenLop.min'=>'Tên lớp phải có it nhất 3 kí tự',
                'SoTuanHoc.required'=>'Bạn chưa nhập số tuần học',
                'GioiThieu.required'=>'Bạn chưa nhập giới thiệu'
            ]);
       
        $lophoc->TenLop = $request->TenLop;
        $lophoc->SoTuanHoc = $request->SoTuanHoc;
        $lophoc->GioiThieu = $request->GioiThieu;
        $lophoc->id_TietHoc = $request->TietHoc;
        // kiem tra neu co anh thi luu con khong thi de rong
        if($request->hasFile('Hinh'))
        {
            //neu truyen hinhanh thi lay file do ra
            $file = $request->file('Hinh');
            //kiem tra dinh dang duoi hinh
            $duoi = $file->getClientOriginalExtension();
            if($duoi !=  'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('ad/lophoc/danhsach')->with('thongbao','Bạn chỉ được chọn đuôi jpg, png, jpeg');
            }
            //lay ten hinh ra
            $name = $file->getClientOriginalName();
            //dat ten hinh random 4 ki tu
            $Hinh = str_random(4)."_".$name;
            //tranh random trung
            while(file_exists("upload/lophoc/".$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }
            //luu hinh
            $file->move("upload/lophoc",$Hinh);
            //sau khi luu xong them truong Hinh vao trong
            unlink("upload/lophoc/".$lophoc->Hinh);
            $lophoc->Hinh = $Hinh;
        }
       
        //luu lai
        $lophoc->save();
        //tra ve trang them va hien thi thong bao thanh cong
        return redirect('ad/lophoc/danhsach')->with('thongbao','Sửa lớp học thành công');
        
    }

    public function getXoa($MaLop)
    {
        $lophoc = LopHoc::find($MaLop);
        $lophoc->delete();
        return redirect('ad/lophoc/danhsach')->with('thongbao','Xóa thành công'.$lophoc->TenLop);
    }
     
}
