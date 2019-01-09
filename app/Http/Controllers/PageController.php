<?php

namespace App\Http\Controllers;


use App\Slide;
use App\KhoaHoc;
use App\LopKhoa;
use App\Nhom;
use Session;
use App\User;
use Hash;
use DB;
use Auth;
use App\HocVien;
use App\KhuyenMai;
use App\GiangVien;
use App\HoaDon;
use App\Co;
use App\TKB;
use App\LopHoc;
use App\PhongHoc;
use App\KhuVuc;
use App\PhieuDKHoc;
use App\HoaDonDKHoc;
use App\TietHoc;
use App\ChiTietPhanCong;
use Illuminate\Http\Request;
use App\ThoiGian;
use App\MonHoc;
use App\TKHocVien;
use App\ThuocLopHoc;
use App\DayMonHoc;
use App\TKGiangVien;
use App\kythi;
use Calendar;
use App\ThongBao;

class PageController extends Controller
{

  function __construct(){
    if(Auth::check()){
      view()->share('nguoidung',Auth::user());
    }
  }
     public function getIndex(){
      $slide = Slide::all();
      $thongbao = DB::table('thongbao')->orderBy('MaTB','DESC')->paginate(9,['*'],'pag');
      $khuyenmai = KhuyenMai::all();
      $lophoc = DB::table('lophoc')->orderBy('MaLop','DESC')->paginate(8,['*'],'pag');
       $nhom = Nhom::all();
       $khuyenmai = KhuyenMai::all();
       $co = Co::all();
      $lopkhoa = DB::table('lopkhoa')->join('lophoc','lophoc.MaLop','=','lopkhoa.MaLop')->orderBy('id','DESC')->paginate(6,['*'],'pag');
        return view('page.trangchu',compact('slide','lophoc','lopkhoa','nhom','khuyenmai','co','khuyenmai','thongbao'));
         
  }
    public function getgioithieu(){
        return view('page.gioithieu');
        
  }
     public function getkhoahoc(){
        return view('page.khoahoc');
        
  }

    public function getlophoc(){
        $co = Co::all();
   
        $lophoc = DB::table('lophoc')->orderBy('MaLop','DESC')->paginate(12,['*'],'pag');
       $lopkhoa = lopkhoa::all();
        return view('page.lophoc',compact('lophoc','lopkhoa','co'));
        
  }
     public function getlichkhaigiang(){
      $co = Co::all();
      $lopkhoa = DB::table('lopkhoa')->join('lophoc','lophoc.MaLop','=','lopkhoa.MaLop')->orderBy('id','DESC')->paginate(12,['*'],'pag');

        return view('page.lichkhaigiang',compact('lopkhoa','co'));
        
  }
 
 
   public function gettkb(){
    $lopkhoa = lopkhoa::all();
    $nhom = Nhom::all();
    $phonghoc = PhongHoc::all();
    $lophoc = LopHoc::all();
        return view('page.tkb',compact('lopkhoa','nhom','lophoc','phonghoc'));
        
  }
     public function gettkb1(Request $request){
      $khoa=$request->KhoaHoc;
      $lop1=$request->LopHoc;
      $ngay=$request->ngkhaigiang;
    $lopkhoa = lopkhoa::where('lopkhoa.MaKhoa','=',$khoa)->where('lopkhoa.MaLop','=',$lop1)->where('lopkhoa.NgayKhaiGiang','=',$ngay)->get();
    $nhom = Nhom::all();
    $khoahoc = KhoaHoc::all();
    $phonghoc = PhongHoc::all();
    $lophoc = LopHoc::all();
        return view('page.tkb1',compact('nhom','lophoc','phonghoc','khoahoc'));
        
  }
  public function gettkb2(Request $request){
      $khoa=$request->KhoaHoc;
      $lop1=$request->LopHoc;
      $ngay=$request->ngkhaigiang;
    $lopkhoa = lopkhoa::where('lopkhoa.MaKhoa','=',$khoa)->join('nhom','lopkhoa.id','=','nhom.id')->join('phonghoc','nhom.MaPhongHoc','=','phonghoc.MaPhongHoc')->where('lopkhoa.MaLop','=',$lop1)->where('lopkhoa.NgayKhaiGiang','=',$ngay)->get();
    $nhom = Nhom::all();
    $khoahoc = KhoaHoc::all();
    $phonghoc = PhongHoc::all();
    $lophoc = LopHoc::all();
        return view('page.tkb1',compact('lopkhoa','nhom','lophoc','phonghoc','khoahoc','lop1','khoa','ngay'));
        
  }
  public function  getNgay(Request $request){
    $lop=$request->lop;
   $data = DB::table('lopkhoa')->where('MaLop',$lop)->get();
 
    return response()->json($data);
      }
       public function getlienhe(){
        return view('page.lienhe');
        
  }
        public function getdangkyhoc( Request $request)
    {
      

      $hocvien = HocVien::all();
       $lopkhoa = LopKhoa::all();
       $lophoc = LopHoc::all();
     $nhom = Nhom::all();
     $phieudkhoc = DB::table('phieudkhoc')->join('lopkhoa','lopkhoa.id','=','phieudkhoc.id')->get();
$taikhoan= DB::table('taikhoan')->join('tkhv','tkhv.username','=','taikhoan.username')->get();

      return view('page.dangkyhoc',['hocvien'=>$hocvien,'lopkhoa'=>$lopkhoa,'nhom'=>$nhom,'phieudkhoc'=>$phieudkhoc,'taikhoan'=>$taikhoan,'lophoc'=>$lophoc]);
    }
   

    //truyen requet de nhan du lieu
   public function postDangKyHoc(Request $request)
    {

 $user = Auth::user();
 $tkhocvien = TKHocVien::all();


   
      
      //truyen vao 2 mang
      //mang 1 yeu cau dau vao du lieu
      //mang 2 hien thi thong bao loi
      $this->validate($request,
        [
       
       
     
        'LopKhoa'=>'required',
        'BuoiHoc'=>'required',
       'Thu'=>'required',

        ],
        [
          
      
        'LopKhoa.required'=>'Bạn chưa chọn lớp học',
        'BuoiHoc.required'=>'Bạn chưa chọn buổi học',
        'Thu.required'=>'Bạn chưa chọn thứ muốn học',
        


        
        ]);
      //sau khi bat loi, ta tao doi tuong 
      $phieudkhoc = new PhieuDKHoc;

       foreach ($tkhocvien as $tk) {
  if(Auth::user()->username == $tk->username)
     $phieudkhoc->MaHocVien = $tk->MaHocVien;
 }
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

      return redirect('page/hoadon')->with('thongbao','Đăng ký học thành công');
    }

    

      public function gethoadon(){
        return view('page/hoadon');
        
  }
         public function getdangky(){
        return view('page.dangky');
        
  }
         public function getdangnhap(){
        return view('page.dangnhap');
        
  }
           public function getdangkythi(){
        return view('page.dangkythi');
        
  }
       public function getChitietlophoc($req){
           $co = Co::all();
           $lop = LopHoc::where('MaLop',$req)->get();
           $khuyenmai = KhuyenMai::all();
           $lopkhoa = LopKhoa::all();
        return view('page.chitietlophoc',compact('lop','co','khuyenmai','lopkhoa'));
        
  }
    public function getChitietlichkhaigiang(Request $req){
         $co = Co::all();
          $khuyenmai = KhuyenMai::all();
           $lopkhoa = lopkhoa::where('id',$req->id)->first();
           $lophoc = LopHoc::all();
        return view('page.chitietlichkhaigiang',compact('lopkhoa','lophoc','co','khuyenmai'));
        
  }
  public function getChitietthongbao(Request $req){
        
           $thongbao = thongbao::where('MaTB',$req->MaTB)->first();
          
        return view('page.chitietthongbao',compact('thongbao'));
        
  }
     public function getIntkb(Request $req){
      
         $lopkhoa = lopkhoa::all();
         $phonghoc = PhongHoc::all();
         $lophoc = DB::table('lophoc')->join('lopkhoa','lopkhoa.MaLop','=','lophoc.MaLop')->get();
         $tkb = TKB::all();
         $thoigian = ThoiGian::all();
         $tiethoc = TietHoc::all();
         $monhoc = MonHoc::all();
          $chitietphancong = DB::table('chitietphancong')->join('giangvien','giangvien.MaGV','=','chitietphancong.MaGV')->orderBy('id','ASC')->get();
         $nhom  = Nhom::where('MaNhom',$req->MaNhom)->first();

        return view('page.intkb',compact('nhom','lopkhoa','lophoc','chitietphancong','phonghoc','tkb','thoigian','tiethoc','monhoc'));
        
  }
   public function getSearch(Request $req){
        $lophoc = DB::table('lophoc')->where('TenLop','like','%'.$req->key.'%')->get(); 
                           
                          
            return view('page.search',compact('lophoc'));
    }
    

    public function getChitietsearch(Request $req){
         $co = DB::table('co')->join('khuyenmai','khuyenmai.MaKM','=','co.MaKM')->get();
          $khuyenmai = KhuyenMai::all();
         $lophoc = DB::table('lophoc')->join('lopkhoa','lopkhoa.MaLop','=','lophoc.MaLop')->where('id',$req->id)->first();
           $lopkhoa= LopKhoa::all();
        return view('page.chitietsearch',compact('lopkhoa','lophoc','co','khuyenmai'));
    
  }
    function getNguoidung(){
      $user = Auth::user();
     
      return view('page.nguoidung',['nguoidung'=>$user]);

    }
     function postNguoidung(){

    }
     function getLopDK(){
      $taikhoan = User::all();
      $tkhocvien = DB::table('tkhv')->join('phieudkhoc','phieudkhoc.MaHocVien','=','tkhv.MaHocVien')->get();
      $phieudkhoc = PhieuDKHoc::all();
      $lopkhoa = LopKhoa::all();
     
     
      return view('page.hocvien.lopdk',compact('taikhoan','tkhocvien','phieudkhoc','lopkhoa'));

    }
    function del($id){
      phieudkhoc::destroy($id);
                      return redirect('hocvien/lopdk');
    }
   
   
     function gethoadonhocvien(){
     
     
      return view('page.hocvien.hoadonhocvien');

    }

     function getLopDay(){

      $taikhoan = User::all();
      $khoahoc= KhoaHoc::all();
      $thoigian= ThoiGian::all();
      $tiethoc = TietHoc::all();
      $lophoc = LopHoc::all();
      $tkgiangvien =TKGiangVien::all();
      $nhom = DB::table('nhom')->join('lopkhoa','lopkhoa.id','=','nhom.id')->get();
      $lopkhoa = LopKhoa::all();
      $monhoc = MonHoc::all();
     $daymonhoc = DayMonHoc::all();
     $phonghoc = PhongHoc::all();
     $khuvuc = KhuVuc::all();
     $thuoclophoc = ThuocLopHoc::all();
     $chitietphancong = DB::table('chitietphancong')->join('tkhocgiangvien','tkhocgiangvien.MaGV','=','chitietphancong.MaGV')->get();
      return view('page.giangvien.lopday',compact('taikhoan','tkgiangvien','nhom','chitietphancong','daymonhoc','monhoc','lopkhoa','lophoc','khoahoc','thoigian','tiethoc','phonghoc','KhuVuc','thuoclophoc'));

    }
     public function getdanhsachhocvien($id){
      
        $chitietphancong = ChiTietPhanCong::where('MaNhom',$id)->first();
        $thuoclophoc = DB::table('thuoc_lop_hocs')->join('hocvien','hocvien.MaHocVien','=','thuoc_lop_hocs.MaHocVien')->get();

       $nhom = DB::table('nhom')->join('lopkhoa','lopkhoa.id','=','nhom.id')->get();
         $lopkhoa = LopKhoa::all();
          $tiethoc = TietHoc::all();
          $phonghoc = PhongHoc::all();
     $khuvuc = KhuVuc::all();
      $thoigian= ThoiGian::all();
        return view('page.giangvien.danhsachhocvien',compact('thuoclophoc','chitietphancong','nhom','lopkhoa','tiethoc','phonghoc','khuvuc','thoigian'));
        
  }
  public function index_admin(){
        $tong_lop=lophoc::count('MaLop');
        $tong_dang_ki=PhieuDKHoc::count('id_PhieuDKHoc');
        $tong_hoc_vien=hocvien::count('MaHocVien');
        $tong_ki_thi=kythi::count('MaKiThi');
        /*$lop=DB::table('lopkhoa')->join('lophoc','lopkhoa.MaLop','=','lophoc.MaLop')->join('phieudkhoc','phieudkhoc.id','lopkhoa.id')->groupBy('lophoc.TenLop')->orderBy()
        $lop=DB::select(DB::raw('select "TenLop" ,count(*) as Tong
           FROM "lophoc","lopkhoa", "phieudkhoc" where "lophoc.MaLop"="lopkhoa.MaLop" and "phieudkhoc.id"="lopkhoa.id"
          GROUP BY "TenLop"
          ORDER BY count(*) DESC
           LIMIT 3'));
        $lop1=DB::select(DB::raw('select "TenLop" ,count(*) as Tong
           FROM "lophoc","lopkhoa", "phieudkhoc" where "lophoc.MaLop"="lopkhoa.MaLop" and "phieudkhoc.id"="lopkhoa.id"
          GROUP BY "TenLop"
          ORDER BY count(*) DESC'));
        $pie[]=['Tên lớp','Tổng'];
        foreach ($lop1 as $lop1) {
          # code...
          $pie[]=[$lop1->TenLop,$lop1->Tong];
        }*/

        $events = [];
        $data1 = kythi::all();
        if($data1->count()) {
            foreach ($data1 as $key => $value) {
             $start=date('Y-m-d H:i:s', strtotime("$value->NgayThi $value->GioBatDau"));
             $end=date('Y-m-d H:i:s', strtotime("$value->NgayThi $value->GioKetThuc"));

                $events[] = Calendar::event(
                    $value->TenKiThi,
                    false,
                    $start,
                    $end,
                    null,
                    // Add color and link on event
                  [
                      'color' => '#f05050',
                      'url' => 'ad/kithi/',
                      
                  ]
                );
            }
        }
      $data2=DB::table('lopkhoa')->join('lophoc','lophoc.MaLop','=','lopkhoa.MaLop')->get();
      if($data2->count()) {
            foreach ($data2 as $key => $value) {
             $start=date('Y-m-d ', strtotime("$value->NgayKhaiGiang"));
             $end=date('Y-m-d', strtotime("$value->NgayKetThuc"));

                $events[] = Calendar::event(
                    $value->TenLop,
                    false,
                    $start,
                    $end,
                    null,
                    // Add color and link on event
                  [
                      'color' => '#0066CC',
                      'url' => 'ad/lophoc/danhsach',
                      
                  ]
                );
            }
        }
        
        $calendar = Calendar::addEvents($events);
       // $a1=json_encode($pie);
        return view('admin.index',(compact('calendar','tong_lop','tong_dang_ki','tong_ki_thi','tong_hoc_vien')));
  }
   
}
