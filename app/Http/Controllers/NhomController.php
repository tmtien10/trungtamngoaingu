<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhongHoc;
use App\Nhom;
use App\lopkhoa;
use App\KhuVuc;
use App\LopHoc;
use App\DayLopHoc;
use App\GiangVien;
use App\HocVien;
use App\MonHoc;
use App\ThuocLopHoc;
use App\ChiTietPhanCong;
use  Redirect;
use Session;
use DB;
use App\TKB;
use App\ThoiGian;
use App\TuanHoc;
use App\CoTuanHoc;
use App\PhieuDKHoc;

use App\TietHoc;

class NhomController extends Controller
{
     public function getDanhSach()
    {
    	
      $nhom = Nhom::all();
      $phonghoc = PhongHoc::all();
      $khuvuc = khuvuc::all();
      
      return view('admin.nhom.danhsach',['nhom'=>$nhom,'phonghoc'=>$phonghoc,'khuvuc'=>$khuvuc]);
    }
 public function getDanhSachHocVien(Request $req)
    {
     
     $nhom =Nhom::where('MaNhom',$req->MaNhom)->first();
     $phieudkhoc = PhieuDKHoc::all();
     $hocvien = HocVien::all();
     $thuoclophoc = DB::table('thuoc_lop_hocs')->join('hocvien','hocvien.MaHocVien','=','thuoc_lop_hocs.MaHocVien')->where('thuoc_lop_hocs.MaNhom','=',$req->MaNhom)->get();     

      return view('admin.nhom.danhsachhocvien',['nhom'=>$nhom,'phieudkhoc'=>$phieudkhoc,'hocvien'=>$hocvien,'thuoclophoc'=>$thuoclophoc,]);
    }
    public function getThem()
    {
       $phonghoc = PhongHoc::all();
       $lophoc = LopHoc::all();
        $khuvuc= KhuVuc::all();
        $giangvien = GiangVien::all();
        $hocvien = HocVien::all();
        $monhoc = MonHoc::all();
        $tuanhoc=TuanHoc::all();
      $tiethoc=TietHoc::all();
      $thoigian=ThoiGian::all();
      $nhom = Nhom::all();
    
        return view('admin.nhom.them',['lophoc'=>$lophoc,'phonghoc'=> $phonghoc,'khuvuc'=> $khuvuc,'giangvien'=>$giangvien,'hocvien'=>$hocvien,'monhoc'=>$monhoc,'tuanhoc'=>$tuanhoc,'tiethoc'=>$tiethoc,'thoigian'=>$thoigian,'nhom'=>$nhom]);
    }


    //truyen requet de nhan du lieu
    public function postThem(Request $request)
    {

    	$data = $request->all(); 
        $this->validate($request,
            [   
                
                'LopHoc'=>'required',
                'PhongHoc'=>'required',
                'TenNhom'=>'required',
                
                 'SLHocVien'=>'required',
                  'GiangVien'=>'required',
                 
            ],
            [
               
                'LopHoc.required'=>'Bạn chưa chọn mã lớp',
                'PhongHoc.required'=>'Bạn chưa chọn phòng học',
                'KhuVuc.required'=>'Bạn chưa nhập khu vực',
                'TenNhom.required'=>'Bạn chưa nhập tên nhóm',
                'SLHocVien.required'=>'Bạn chưa nhập số lượng học viên',
                'GiangVien.required'=>'Bạn chưa nhập chọn giảng viên dạy',
                
                
            ]);
        $nhom = new Nhom;
       
           
            $nhom->MaLop = $request->LopHoc;
            
  		     $nhom->MaPhongHoc = $request->PhongHoc;
           $nhom->TenNhom = $request->TenNhom;
            $nhom->SLHocVien = $request->SLHocVien;
        
        $nhom->save();

        

          $id=nhom::getlastID()->first();
     
       thuoclophoc::create([
            'MaNhom'=>$id->MaNhom,
            'MaHocVien'=>$data['HocVien'],        
      ]);
       $idgv=giangvien::getlastID()->first();
        $tkb = new TKB;
     $tkb->MaNhom=$id->MaNhom;
     $tkb->save();

       $cotuanhoc = new CoTuanHoc;
       $cotuanhoc->id_TKB=$tkb->id_TKB;
       $cotuanhoc->id_Tuan=$request->TuanHoc;
          $cotuanhoc->save();

  

        
$chitietphancong = new ChiTietPhanCong;
$chitietphancong->MaNhom = $id->MaNhom;
$chitietphancong->MaGV = $idgv->MaGV;
$chitietphancong->MaMonHoc = $request->MonHoc;
$chitietphancong->id_TKB=$tkb->id_TKB;
$chitietphancong->id_ThoiGian=$request->id_ThoiGian;
$chitietphancong->id_TietHoc=$request->TietHoc;
$chitietphancong->save();

        return redirect('ad/nhom/danhsach')->with('thongbao','Thêm nhóm và tkb thành công');
    }
 public function getThemNhom()
    {
       
       $lophoc = LopHoc::all();
       
        $hocvien = HocVien::all();
       
        return view('admin.nhom.themnhom',['lophoc'=>$lophoc,'hocvien'=>$hocvien]);
    }


    //truyen requet de nhan du lieu
    public function postThemNhom(Request $request)
    {

      $data = $request->all(); 
        $this->validate($request,
            [   
                
                'LopHoc'=>'required',
                'lopkhoa'=>'required',
                 'SLHocVien'=>'required',
             
                 
            ],
            [
               
                'LopHoc.required'=>'Bạn chưa chọn mã lớp', 
                'lopkhoa.required'=>'Bạn chưa chọn ngày khai giảng', 
                'SLHocVien.required'=>'Bạn chưa nhập số lượng học viên',
                
                
                
            ]);
        $nhom = new Nhom;
       
           
            $nhom->MaLop = $request->LopHoc;
            
          
           $nhom->NgayKhaiGiang = $request->lopkhoa;
            $nhom->SLHocVien = $request->SLHocVien;
        
        $nhom->save();



  



        return redirect('ad/nhom/danhsachhocvien')->with('thongbao','ds học viên');
    }

    public function getSua($MaNhom)
    {

        $lophoc= LopHoc::all();
       $phonghoc = PhongHoc::all();
      $giangvien = GiangVien::all();
     
      
      $nhom= DB::table('nhom')->join('chitietphancong','chitietphancong.MaNhom','=','nhom.MaNhom');
        $nhom =Nhom::find($MaNhom);
        return view('admin.nhom.sua',['lophoc'=>$lophoc,'phonghoc'=>$phonghoc,'nhom'=> $nhom,'giangvien'=>$giangvien]);
     
    }

    
    public function postSua(Request $request, $MaNhom)
    {       
         $this->validate($request,
            [   
                
                'PhongHoc'=>'required',
                'TenNhom'=>'required',
                
                 'SLHocVien'=>'required',
            ],
            [
                
                'PhongHoc.required'=>'Bạn chưa chọn phòng học',
                'KhuVuc.required'=>'Bạn chưa nhập khu vực',
                'TenNhom.required'=>'Bạn chưa nhập tên nhóm',
                'SLHocVien.required'=>'Bạn chưa nhập số lượng học viên',
                
            ]);
         $nhom = Nhom::find($MaNhom);
       
           
            
             $nhom->MaPhongHoc = $request->PhongHoc;
           $nhom->TenNhom = $request->TenNhom;
            $nhom->SLHocVien = $request->SLHocVien;
        
        $nhom->save();
       
        return redirect('ad/nhom/danhsach')->with('thongbao','Sửa nhóm thành công');
       
    }

    public function getXoa($MaNhom)
    {
        $nhom = Nhom::find($MaNhom);
        $nhom->delete();
        return redirect('ad/nhom/danhsach')->with('thongbao','Xóa thành công'.$nhom->MaNhom);
    }
    public function  getNgay(Request $request){
    $lop=$request->lop;
   $data = DB::table('lopkhoa')->where('MaLop',$lop)->get();
 
    return response()->json($data);
      }
      public function chia_nhom(Request $request){
        $lop=$request->LopHoc;
        $ngay=$request->ngkhaigiang;
        $sl=$request->SLHocVien;

        $lopkhoa=DB::table('lopkhoa')->where('lopkhoa.MaLop',$lop)->where('lopkhoa.NgayKhaiGiang','=',$ngay)->pluck('id')->first();
      $tong_so_dang_ki=DB::table('phieudkhoc')->join('lopkhoa','lopkhoa.id','=','phieudkhoc.id')->where('lopkhoa.MaLop',$lop)->where('lopkhoa.NgayKhaiGiang','=',$ngay)->count();

      $nhom=$tong_so_dang_ki%$sl;
        if(($nhom<5)&&($nhom!=0)){

          for($i=$sl;$i>0;$i--){ 
             
              $check=$tong_so_dang_ki%$i;
              if($check==5){
                $sl=$i;
                break;
              }
          }
        }
        $so_nhom=ceil($tong_so_dang_ki/$sl);
         $phong=PhongHoc::all();
          $phong_hoc_con_trong=""; $so_phong_trong=0; 

        foreach ($phong as $key => $p) {
          # code...
          $check=$this->kiem_tra($p->MaPhongHoc,$lopkhoa);
          if($check==0){
              
              $phong_hoc_con_trong=$p->MaPhongHoc;
              $so_phong_trong=$so_phong_trong+1;
          }
         
        }
        //kiểm tra xem con đủ phòng trống không
        if($so_phong_trong<$so_nhom){
          Session::flash('error','Số lượng phòng không đủ');
     $nhom = Nhom::all();
      return redirect('ad/nhom/danhsach');
        }

        for($j=1;$j<=$so_nhom;$j++){
          $s=($j-1)*$sl;
          $e=$sl;
          $danhsach=DB::table('phieudkhoc')->join('lopkhoa','lopkhoa.id','=','phieudkhoc.id')->where('lopkhoa.MaLop','=',$lop)->where('lopkhoa.NgayKhaiGiang','=',$ngay)->skip($s)->take($e)->get();
          //Chọn phòng gán vào từng nhóm
        foreach ($phong as $key => $p) {
          # code...
          $check=$this->kiem_tra($p->MaPhongHoc,$lopkhoa);
          if($check==0){
              
              $p_hoc1=$p->MaPhongHoc;
              $p_hoc2=$check;

             
              break;
          }
         
        }
           //Auto tạo nhóm
        DB::table('nhom')->insert([
          'id'=>$lopkhoa,
          'TenNhom'=>'Nhóm'. $j,
          'SLHocVien'=>$sl,
          'MaPhongHoc'=>$p_hoc1

        ]);

        //Auto thêm danh sách học viên
        $id =Nhom::getlastID()->first();
       foreach ($danhsach as $ds ) {
         # code...
        $kt=DB::table('thuoc_lop_hocs')->where('MaNhom',$id->MaNhom)->where('MaHocVien',$ds->MaHocVien)->get();
        if($kt->isEmpty()){
       ThuocLopHoc::create([
          "MaNhom"=>$id->MaNhom,
          "MaHocVien"=>$ds->MaHocVien,

       ]);
              }
       }
        $p_hoc1=0;
     }

     Session::flash('thongbao','Tạo nhóm thành công');
     $nhom = Nhom::all();
      return redirect('ad/nhom/danhsach');
      
    }
      public function kiem_tra($maphong,$lophoc1){
        //Dùng để kiểm tra xem một phòng có trống vào thời điểm nhất định hay không
         $malop=DB::table('nhom')->where('MaPhongHoc',$maphong)->select('id')->get();
         if(!empty($malop)){
              $lophoc=DB::table('lopkhoa')->join('lophoc','lopkhoa.MaLop','=','lophoc.MaLop')->where('id',$lophoc1)->select('NgayKhaiGiang','NgayKetThuc','id_Tiethoc','NgayChan')->first();
              foreach ($malop as $key => $malop) {
                # code...
              
              $timkiem_lop=DB::table('lopkhoa')->join('lophoc','lopkhoa.MaLop','=','lophoc.MaLop')->where('id','=',$malop->id)->select('NgayKhaiGiang','NgayKetThuc','id_Tiethoc','NgayChan')->first();
              $i=json_decode($lophoc->NgayChan,true);
              $j=json_decode($timkiem_lop->NgayChan,true);    
              $result=array_diff_assoc($i,$j);
              //
              if($malop->id==$lophoc1){
                return 1;
              }
              if(($lophoc->NgayKhaiGiang>=$timkiem_lop->NgayKhaiGiang)&&($lophoc->NgayKetThuc<=$timkiem_lop->NgayKetThuc)&&($lophoc->id_Tiethoc=$timkiem_lop->id_Tiethoc)&&(!empty($result))){
                  return 1;
              }
              else if(($lophoc->NgayKhaiGiang<$timkiem_lop->NgayKhaiGiang)&&($lophoc->NgayKetThuc<$timkiem_lop->NgayKetThuc)&&($lophoc->id_Tiethoc=$timkiem_lop->id_Tiethoc)&&(!empty($result))){
                return 1;
                }
              else if(($lophoc->NgayKhaiGiang>$timkiem_lop->NgayKhaiGiang)&&($lophoc->NgayKetThuc>$timkiem_lop->NgayKetThuc)&&($lophoc->id_Tiethoc=$timkiem_lop->id_Tiethoc)&&(!empty($result))){
                return 1;
                }
             
              
              else return 0;
                  
         }
         

             }
             else return 0;
           }
           public function xoa_hoc_vien($id,$nhom){
            DB::table('thuoc_lop_hocs')->where('MaHocVien',$id)->where('MaNhom',$nhom)->delete();
            Session::flash('thongbao','Xóa học viên thành công');
            return redirect('ad/nhom/danhsachhocvien/'.$nhom);
           }
}