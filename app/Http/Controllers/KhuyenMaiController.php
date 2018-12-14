<?php

namespace App\Http\Controllers;
use App\KhuyenMai;
use App\Co;
use App\LopHoc;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use  Redirect;
use Session;
use DB;


class KhuyenMaiController extends Controller
{
    public function getDanhSach()
    {
          $khuyenmai = KhuyenMai::orderBy('MaKM','DESC')->get();
          $lophoc = LopHoc::all();
     
      return view('admin.khuyenmai.danhsach',['khuyenmai'=>$khuyenmai,'lophoc'=>$lophoc]);
    }
    public function getDanhsachlopkm(Request $req)
    {
          $khuyenmai = KhuyenMai::where('MaKM',$req->MaKM)->first();
          $co= DB::table('co')->join('lophoc','lophoc.MaLop','=','co.MaLop')->where('co.MaKM','=',$req->MaKM)->get(); 
          $lophoc = LopHoc::all();
     
      return view('admin.khuyenmai.danhsachlopkm',['khuyenmai'=>$khuyenmai,'lophoc'=>$lophoc,'co'=>$co]);
    }

    public function getThem()
    {
      $lophoc = LopHoc::all();
        return view('admin.khuyenmai.them',['lophoc'=>$lophoc]);
    }


    //truyen requet de nhan du lieu
    public function postThem(Request $request)
    {
         $data = $request->all(); 
        $this->validate($request,
            [   
               
                'TenKM'=>'required|min:3',
                'ThoiGianBD'=>'required',
                'ThoiGianKT'=>'required',
                'MucGiam'=>'required',
                 'LopHoc'=>'required',
            ],
            [
               
                
                'TenKM.required'=>'Bạn chưa nhập tên khuyến mãi',
           
                'ThoiGianBD.required'=>'Bạn chưa nhập thời gian bắt đầu',
                'ThoiGianKT.required'=>'Bạn chưa nhập thời gian kết thúc',
                'MucGiam.required'=>'Bạn chưa nhập mức giảm',
                'LopHoc.required'=>'Bạn chưa chọn lớp học',
               
            ]);
         $khuyenmai = new KhuyenMai;
       
         $khuyenmai->TenKM = $request->TenKM;
        $khuyenmai->ThoiGianBD = $request->ThoiGianBD;
          $khuyenmai->ThoiGianKT = $request->ThoiGianKT;
        $khuyenmai->MucGiam = $request->MucGiam;
       $khuyenmai->save();
      
 

       $tags = $request->input('LopHoc');

        foreach($tags as $tag){
          $co = new Co ();
          $co->MaKM = $khuyenmai->MaKM;

          $co->MaLop= $tag;
          $co->save();
       }
         
        return redirect('ad/khuyenmai/danhsach')->with('thongbao','Thêm khuyến mãi thành công');
    }

    public function getSua($MaKM)
    {
        $lophoc = LopHoc::all();
        $co = DB::table('co')->where('MaKM',$MaKM)->get()->pluck('MaLop')->toArray();
        $khuyenmai = KhuyenMai::find($MaKM);
        return view('admin.khuyenmai.sua',['khuyenmai'=>$khuyenmai,'lophoc'=>$lophoc,'co'=>$co]);
    }

    public function postSua(Request $request, $MaKM)
    {
           $this->validate($request,
            [   
               
                'TenKM'=>'required|min:3',
                'ThoiGianBD'=>'required',
                'ThoiGianKT'=>'required',
                'MucGiam'=>'required',
                
            ],
            [
               
                 
                'TenKM.required'=>'Bạn chưa nhập tên khuyến mãi',
           
                'ThoiGianBD.required'=>'Bạn chưa nhập thời gian bắt đầu',
                'ThoiGianKT.required'=>'Bạn chưa thời gian kết thúc',
                'MucGiam.required'=>'Bạn chưa nhập mức giảm',
                
            ]);
        $khuyenmai = KhuyenMai::find($MaKM);
       
          $khuyenmai->TenKM = $request->TenKM;
        $khuyenmai->ThoiGianBD = $request->ThoiGianBD;
          $khuyenmai->ThoiGianKT = $request->ThoiGianKT;
        $khuyenmai->MucGiam = $request->MucGiam;
       $khuyenmai->save();

      //gán lớp vào khuyến mãi 

       Co::where('MaKM',$khuyenmai->MaKM)->delete();
      $tags = $request->input('LopHoc');

        foreach($tags as $tag){
          $co = new Co ();
          $co->MaKM = $khuyenmai->MaKM;

          $co->MaLop= $tag;
          $co->save();
       }
      
 
       
        return redirect('ad/khuyenmai/danhsach')->with('thongbao','Sửa khuyến mãi thành công');


        
        
    }
   

    public function getXoa($MaKM)
    {
        $khuyenmai = KhuyenMai::find($MaKM);
        $khuyenmai->delete();
        return redirect('ad/khuyenmai/danhsach')->with('thongbao','Xóa thành công'.$khuyenmai->khuyenmai);
    }
      public function getXoaLop($MaLop,$MaKM)
    { 
        DB:: table('co')->where('MaLop','=',$MaLop)->where('MaKM','=',$MaKM)->delete();
        return redirect('ad/khuyenmai/danhsachlopkm/'.$MaKM)->with('thongbao','Xóa lớp khuyến mãi thành công');
    }
}
