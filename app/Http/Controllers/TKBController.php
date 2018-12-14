<?php

namespace App\Http\Controllers;
use App\TKB;
use App\Nhom;
use App\GiangVien;
use App\MonHoc;
use Illuminate\Http\Request;
use App\ThoiGian;
use App\TuanHoc;
use App\CoTuanHoc;
use App\TietHoc;
use App\TKGiangvien;
use DB;
use App\LopHoc;
use App\PhongHoc;
use App\tkHocVien;
use App\ChiTietPhanCong;
use Calendar;
use Session;
use Auth;

class TKBController extends Controller
{
    public function getDanhSach()
    {
      $tkb = TKB::orderBy('id_TKB','DESC')->get();
      return view('admin.tkb.danhsach',['tkb'=>$tkb]);
    }

    public function getThem()

    {
      $tuanhoc=TuanHoc::all();
      $tiethoc=TietHoc::all();
      $lophoc = LopHoc::all();
      $thoigian=ThoiGian::all();
      $phonghoc=PhongHoc::all();
      $nhom = DB::table('nhom')->join('lopkhoa','lopkhoa.id','=','nhom.id')->get();
      $giangvien = GiangVien::all();
      $gv=GiangVien::all();
      $monhoc = MonHoc::all();
      return view('admin.tkb.them',['nhom'=>$nhom,'tuanhoc'=>$tuanhoc,'thoigian'=>$thoigian,'giangvien'=>$giangvien,'monhoc'=>$monhoc,'tiethoc'=>$tiethoc,'phonghoc'=>$phonghoc,'lophoc'=>$lophoc,'gv'=>$gv]);
    }
   
    public function getTao(Request $request){
            $lophoc=LopHoc::all();
            $nhomhoc=$request->Nhom;
            $thoigian=ThoiGian::all()->toArray();
            $nhom = DB::table('nhom')->join('lopkhoa','lopkhoa.id','=','nhom.id')->get();
            $giangvien = GiangVien::all();
            $gv=GiangVien::all();
            $thu=DB::table('nhom')->join('lopkhoa','lopkhoa.id','=','nhom.id')->where('MaNhom',$nhomhoc)->first();
            $tkb=json_decode($thu->NgayChan);
            return view('admin.tkb.them',['nhom'=>$nhom,'thoigian'=>$thoigian,'giangvien'=>$giangvien,'lophoc'=>$lophoc,'gv'=>$gv,'tkb'=>$tkb,'nhom1'=>$nhomhoc]);
    }
   

    //truyen requet de nhan du lieu
    public function postThem(Request $request)
    {
      //sau khi bat loi, ta tao doi tuong 
      $nhom=$request->nhom;
      $ThoiGian=$request->ThoiGian;
      $MonHoc=$request->MonHoc;
      $gv=$request->MaGV;

      //thời gian
      $tiethoc=DB::table('nhom')->join('lopkhoa','lopkhoa.id','=','nhom.id')->join('lophoc','lophoc.MaLop','=','lopkhoa.MaLop')->where('MaNhom',$nhom)->first();

      //them tkb
      $tkb = new TKB;
      $tkb->MaNhom= $request->nhom;
    
      $tkb->save();

      //phân công
      $n=sizeof($ThoiGian);

      for($i=0;$i<$n;$i++){
        $chitietphancong = new ChiTietPhanCong;
        $chitietphancong->MaNhom = $nhom;
        $chitietphancong->MaGV = $gv[$i];
        $chitietphancong->MaMonHoc = $MonHoc[$i];
        $chitietphancong->id_TKB=$tkb->id_TKB;
        $chitietphancong->id_ThoiGian=$ThoiGian[$i];
        $chitietphancong->id_TietHoc=$tiethoc->id_TietHoc;
        $chitietphancong->save();

      }
    

      return redirect('ad/tkb/danhsach')->with('thongbao','Thêm thời khóa biểu thành công');
    }

  public function getSua($id_TKB)
    { 
      $phancong=DB::table('chitietphancong')->where('id',$id_TKB)->first();
      $nhom=DB::table('chitietphancong')->where('id',$id_TKB)->first();;
      $monhoc=MonHoc::all();
      $gv=GiangVien::all();
      $data1=DB::table('chitietphancong')->join('tiethoc','tiethoc.id_TietHoc','=','chitietphancong.id_TietHoc')->join('monhoc','monhoc.MaMonHoc','=','chitietphancong.MaMonHoc')->join('giangvien','giangvien.MaGV','=','chitietphancong.MaGV')->where('id_TKB',$phancong->id_TKB)->get();
      $events = [];
        if($data1->count()) {
            foreach ($data1 as $key => $value) {
             $start=date('H:i:s', strtotime("$value->ThoiGianBD"));
             $end=date('H:i:s', strtotime("$value->ThoiGianKT"));

                $events[] = Calendar::event(
                   $value->TenMonHoc.'By '.$value->HoTenGV,
                    false,
                    $start,
                    $end,
                    null,
                    // Add color and link on event
                  [   
                      'color' => '#0099FF',
                      'url' => 'ad/tkb/sua/chitiet/'.$value->id,
                      'dow'=>[$value->id_ThoiGian],



                  ]
                );
            }

        
        $calendar = Calendar::addEvents($events)->setOptions([ //set fullcalendar options
            'header' => array('left' => '', 'center' => '', 'right' => 'agendaWeek'),
            'locale' => 'vi',
            'selectable'  => true,
            'defaultView' => 'agendaWeek',
            'views' =>['week'=>['columnFormat'=>'ddd']],

    ]);
        return view('admin.tkb.sua',compact('calendar','phancong','monhoc','gv','nhom'));
}
}

    public function postSua(Request $request)
    {
      DB::table('chitietphancong')->where('id',$request->id)->update([

            'MaMonHoc'=>$request->mon,
            'MaGV'=>$request->gv
      ]);
      return redirect('ad/tkb/danhsach')->with('thongbao','Sửa thời khóa biểu thành công');
    }

    public function getXoa($id_TKB)
    {
      $tkb = TKB::find($id_TKB);
      $tkb->delete();
      return redirect('ad/tkb/danhsach')->with('thongbao','Đã xóa thành công');
    }
    public function show_tkb($id){
      $nhom=DB::table('tkb')->join('chitietphancong','chitietphancong.id_TKB','=','tkb.id_TKB')->where('tkb.id_TKB',$id)->first();
      $phancong=DB::table('chitietphancong')->where('id',$id)->first();
      $monhoc=MonHoc::all();
      $gv=GiangVien::all();
      $data1=DB::table('chitietphancong')->join('tiethoc','tiethoc.id_TietHoc','=','chitietphancong.id_TietHoc')->join('monhoc','monhoc.MaMonHoc','=','chitietphancong.MaMonHoc')->join('giangvien','giangvien.MaGV','=','chitietphancong.MaGV')->where('id_TKB',$id)->get();
      $events = [];
        if($data1->count()) {
            foreach ($data1 as $key => $value) {
             $start=date('H:i:s', strtotime("$value->ThoiGianBD"));
             $end=date('H:i:s', strtotime("$value->ThoiGianKT"));
                $recourse[]=["id"=>$value->MaNhom,"title"=>$value->TenMonHoc];
                $events[] = Calendar::event(
                   $value->TenMonHoc.' By '.$value->HoTenGV,
                    false,
                    $start,
                    $end,
                    null,
                    // Add color and link on event
                  [   
                      'color' => '#0099FF',
                      'url' => 'ad/tkb/sua/chitiet/'.$value->id,
                      'dow'=>[$value->id_ThoiGian],



                  ]
                );
            }

        
        $calendar = Calendar::addEvents($events)->setOptions([ //set fullcalendar options
            'header' => array('left' => '', 'center' => '', 'right' => 'agendaWeek'),
            'locale' => 'vi',
            'selectable'  => true,
            'defaultView' => 'agendaWeek',
            'views' =>['week'=>['columnFormat'=>'ddd']],


    ]);
       return view('admin.tkb.sua',compact('calendar','monhoc','gv','nhom'));
    }
   


}
  public function del($id){

    ChiTietPhanCong::destroy($id);
    return redirect('ad/tkb/danhsach')->with('thongbao','Xóa thành công');

  }
  public function postSua_Them(Request $request){
    $tkb=$request->tkb;
    $nhom=DB::table('tkb')->where('id_TKB',$tkb)->first();
    $tiethoc=DB::table('nhom')->join('lopkhoa','lopkhoa.id','=','nhom.id')->join('lophoc','lophoc.MaLop','=','lopkhoa.MaLop')->where('MaNhom',$nhom->MaNhom)->first();
    $nhom=DB::table('tkb')->where('id_TKB',$tkb)->first();
        ChiTietPhanCong::create([
            'id_TietHoc'=>$tiethoc->id_TietHoc,
            'MaMonHoc'=>$request->mon,
            'MaGV'=>$request->gv,
            'id_TKB'=>$tkb,
            'id_ThoiGian'=>$request->thu,
            'MaNhom'=>$nhom->MaNhom

      ]);
        Session::flash('thongbao','Thêm thành công');
      return redirect('ad/tkb/danhsach');
  }
  public function hocvien_tkb(){
    $user=Auth::user()->username;
    $hovien=tkHocVien::where('username',$user)->first();


    //Lịch học

    $nhom=DB::table('thuoc_lop_hocs')->where('MaHocvien',$hovien->MaHocVien)->get();
    $events = [];
    foreach ($nhom as $nhom) {
      # code...
        $data1=DB::table('chitietphancong')->join('tiethoc','tiethoc.id_TietHoc','=','chitietphancong.id_TietHoc')->join('monhoc','monhoc.MaMonHoc','=','chitietphancong.MaMonHoc')->join('giangvien','giangvien.MaGV','=','chitietphancong.MaGV')->where('MaNhom',$nhom->MaNhom)->get();
        if($data1->count()) {
            foreach ($data1 as $key => $value) {
             $start=date(' H:i:s', strtotime(" $value->ThoiGianBD"));
             $end=date('H:i:s', strtotime("$value->ThoiGianKT"));
             $ngay=DB::table('nhom')->join('lopkhoa','lopkhoa.id','=','nhom.id')->where('MaNhom',$value->MaNhom)->first();
                $events[] = Calendar::event(
                  $value->MaNhom.' ---- '.$value->HoTenGV.' --- '. $value->TenMonHo.'-----'.$value->MaPhongHoc,
                    false,
                    $start,
                    $end,
                    null,
                    // Add color and link on event
                  [   
                      'color' => '#0099FF',
                      'dow'=>[$value->id_ThoiGian],
                      'ranges'=>[array('start'=>date('Y-m-d',strtotime($ngay->NgayKhaiGiang."+1 day")), 'end'=>date('Y-m-d',strtotime($ngay->NgayKetThuc)))],
                  ]
                );

          }
          
        }
      }
    //Lịch  thi
      $data2=DB::table('diemthichungchis')->join('kythis','kythis.MaKiThi','=','diemthichungchis.MaKiThi')->where('MaHocvien',$hovien->MaHocVien)->get();
      if($data2->count()) {
            foreach ($data2 as $key => $value) {
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
                      'color' => 'red',
                      'url' => 'tochucthi',
                       'ranges'=>[array('start'=>date('Y-m-d',strtotime($value->NgayThi)), 'end'=>date('Y-m-d',strtotime($value->NgayThi."+1 day")))],

                      
                  ]
                );
            }
        }
      $calendar = Calendar::addEvents($events)->setOptions([ //set fullcalendar options
            'header' => array('left' => 'today prev,next', 'center' => 'title', 'right' => 'listWeek,agendaWeek,month'),
            'locale' => 'vi',
            'selectable'  => true,
            'defaultView' => 'listWeek',


    ])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
        'eventRender' => 'function(event){
              return (event.ranges.filter(function(range){ // test event against all the ranges

        return (event.start.isBefore(range.end) &&
                event.end.isAfter(range.start));

    }).length)>0;
  }'
    ]);

    return view('page.lichhoc')->with('calendar',$calendar);
  }
      public function giangvien_tkb(){

        $user=Auth::user()->username;
        $giangvien=TKGiangvien::where('username',$user)->first();


        $events = [];
      # code...
        $data=DB::table('chitietphancong')->join('tiethoc','tiethoc.id_TietHoc','=','chitietphancong.id_TietHoc')->join('monhoc','monhoc.MaMonHoc','=','chitietphancong.MaMonHoc')->join('giangvien','giangvien.MaGV','=','chitietphancong.MaGV')->where('chitietphancong.MaGV',$giangvien->MaGV)->get();
        if($data->count()) {
            foreach ($data as $key => $value) {
             $start=date(' H:i:s', strtotime("$value->ThoiGianBD"));
             $end=date('H:i:s', strtotime("$value->ThoiGianKT"));
             $ngay=DB::table('nhom')->join('lopkhoa','lopkhoa.id','=','nhom.id')->where('MaNhom',$value->MaNhom)->first();
                $events[] = Calendar::event(
                  $value->MaNhom.' ---- '.$value->HoTenGV.' --- '. $value->TenMonHoc,
                    false,
                    $start,
                    $end,
                    null,
                    // Add color and link on event
                  [   
                      'color' => '#0099FF',
                      'dow'=>[$value->id_ThoiGian],
                      'ranges'=>[array('start'=>date('Y-m-d',strtotime($ngay->NgayKhaiGiang."+1 day")), 'end'=>date('Y-m-d',strtotime($ngay->NgayKetThuc)))],
                  ]
                );

          }

           $calendar = Calendar::addEvents($events)->setOptions([ //set fullcalendar options
            'header' => array('left' => 'today prev,next', 'center' => 'title', 'right' => 'listWeek,agendaWeek,month'),
            'locale' => 'vi',
            'selectable'  => true,
            'defaultView' => 'listWeek',


               ])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
        'eventRender' => 'function(event){
              return (event.ranges.filter(function(range){ // test event against all the ranges

        return (event.start.isBefore(range.end) &&
                event.end.isAfter(range.start));

             }).length)>0;
             }'
                   ]);

    return view('page.lichday')->with('calendar',$calendar);
          
        }



      }

}