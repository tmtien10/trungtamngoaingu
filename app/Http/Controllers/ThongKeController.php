<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\taikhoan;
use App\hocvien;
use App\giangvien;
use App\cbtt;
use App\tkgv;
use App\tkhv;
use App\tkcbtt;
use App\kythi;
use App\phieudkthi;
use App\chungchi;
use App\LopHoc;
use Session;
use Validator;
use Hash;
use DB;
use Auth;
use Excel;
class ThongKeController extends Controller
{
    //
    public function so_luong_dang_ki_thi($makithi){
    	# code...

        $so_luong_dk=DB::table('phieudkthis')->join('kythis','phieudkthis.MaKiThi','=','kythis.MaKiThi')->where('kythis.MaKiThi',$makithi)->get();

        $dangkiao=0;
        $dangkithuc=0;
        $tong=0;
        if (!$so_luong_dk->isEmpty()) {
            # code...
        
        foreach ($so_luong_dk as $sl) {

        	# code...

        	
        	if($sl->TinhTrang==0){
        		$dangkiao++;
        	}
        	if($sl->TinhTrang==1){
        		$dangkithuc++;
        	}
        	$tong++;
        	      
        }
    }
        $so_luong=json_encode(array('dangkithuc' =>$dangkithuc ,'dangkiao' => $dangkiao ));
    

        	return $so_luong;
    }
    public function diem_thi($makithi){
        # code...


        $diem_thi=DB::table('diemthichungchis')->where('MaKiThi','=',$makithi)->get();
       
        $trentb=0; $TongDiem=0;
        $duoitb=0;
        $tb=0;
        if(!$diem_thi->isEmpty()){
        $tb=(float)$this->DiemTB($makithi);
       
            # code...
        
        foreach ($diem_thi as $dt) {

            # code...
            $diem=json_decode($dt->DiemThi,true);
            $TongDiem=(float)$diem['nghe']+(float)$diem['noi']+(float)$diem['doc']+(float)$diem['viet'];
            if($TongDiem>=$tb){
                $trentb++;
            }
            if($TongDiem<$tb) {
    
                $duoitb++;
             }
        }
    }
        $diem_thi_thi_sinh=json_encode(array('trentb' =>$trentb ,'duoitb' => $duoitb ));
    


            return $diem_thi_thi_sinh;
    }
   
    public function thong_ke_ki_thi(Request $request){

        $macc=$request->macc;
        $ngay1=$request->nam1;
        $ngay2=$request->nam2;
        $result[] = ['Tên kì thi','Tổng số thí sinh dự thi','Tổng số thí sinh bỏ thi','Thí sinh đạt điểm trên trung bình','Thí sinh đạt điểm dưới trung bình'];
        if((!isset($ngay1))&&(!isset($ngay2))){

        $kithi=DB::table('kythis')->where('MaCC',$macc)->orderBy('MaKiThi','DESC')->get();
                }
        if((isset($ngay1))&&(!isset($ngay2))){

        $kithi=DB::table('kythis')->where('MaCC',$macc)->where('NgayThi',">",$ngay1)->orderBy('MaKiThi','DESC')->get();
                }
        if((!isset($ngay1))&&(isset($ngay2))){

        $kithi=DB::table('kythis')->where('MaCC',$macc)->where('NgayThi',"<=",$ngay2)->orderBy('MaKiThi','DESC')->get();
                }
        if((isset($ngay1))&&(isset($ngay2))){

        $kithi=DB::table('kythis')->where('MaCC',$macc)->where('NgayThi',[$ngay1,$ngay2])->orderBy('MaKiThi','DESC')->get();
                }
        if(!$kithi->isEmpty()){
        foreach($kithi as $kt){
        $dangki=$this->so_luong_dang_ki_thi($kt->MaKiThi);
        $diem=$this->diem_thi($kt->MaKiThi);

            $a=json_decode($dangki,true);
            $b=json_decode($diem,true);

        $result[]=[$kt->TenKiThi,$a['dangkithuc'],$a['dangkiao'],$b['trentb'],$b['duoitb']];

    }
                }
        else $result[]=['Không có kì thi',0,0,0,0];



            return view('admin.thongke.thongkekithi')

                ->with(['visitor'=>json_encode($result),'chc'=>$macc,'ngay1'=>$ngay1,'ngay2'=>$ngay2]);
    }
   
    public function getDieuKien(Request $request){

    	$id=$request->id;

    	switch ($id) {
    		case '1':
    			# code...
    		$result=chungchi::all();
    		foreach ($result as  $result) {
    		# code...
    			$data[]=[
    				'ma'=>$result->MaCC,
    				'ten'=>$result->tenCC
    			];
    			}
    			break;
    		case '2':
    			#code...
    		$result=chungchi::all();
    		foreach ($result as  $result) {
    		# code...
    			$data[]=[
    				'ma'=>$result->MaCC,
    				'ten'=>$result->tenCC
    			];
    			}
                break;
            case '3':
                # code...
            $result=LopHoc::all();
            foreach ($result as  $result) {
            # code...
                $data[]=[
                    'ma'=>$result->MaLop,
                    'ten'=>$result->TenLop,
                ];
                }
                break;
    		default:
    			# code...
    			break;
    	}
    	return response()->json($data); 
    }
    public function DiemTB($makithi){
    	   $TongDiem=0;
            $thisinh=DB::table('diemthichungchis')->where('MaKiThi','=',$makithi)->get();
            if(!empty($thisinh)){
                $tong_thi_sinh=0;
            foreach ($thisinh as $thisinh) {
                # code...
                $diem=json_decode($thisinh->DiemThi,true);
                $TongDiem=$TongDiem+$diem['nghe']+$diem['noi']+$diem['doc']+$diem['viet'];
                $tong_thi_sinh=$tong_thi_sinh+1;


            }
            $tb=$TongDiem/$tong_thi_sinh;
        }
            return $tb;


    }
    public function thong_ke_khoa_hoc(Request $request){
        $ngay1=$request->nam1;
        $ngay2=$request->nam2;
        
        $result[] = ['Tên lớp học','Tổng số học viên đăng kí học','Tổng số học viên bỏ học'];
        $lopkhoa=DB::table('lophoc')->get();

        foreach ($lopkhoa as $lk) {
            $c=0; $d=0;
            # code...
        
        if((!isset($ngay1))&&(!isset($ngay2))){

        $lop=DB::table('lopkhoa')->join('lophoc','lophoc.MaLop','=','lopkhoa.MaLop')->where('lopkhoa.MaLop',$lk->MaLop)->get();
                }
        if((isset($ngay1))&&(!isset($ngay2))){

         $lop=DB::table('lopkhoa')->join('lophoc','lophoc.MaLop','=','lopkhoa.MaLop')->where('lopkhoa.MaLop',$lk->MaLop)->where('NgayKhaiGiang','>',$ngay1)->get();
                }
        if((!isset($ngay1))&&(isset($ngay2))){

       $lop=DB::table('lopkhoa')->join('lophoc','lophoc.MaLop','=','lopkhoa.MaLop')->where('lopkhoa.MaLop',$lk->MaLop)->where('NgayKhaiGiang','<=',$ngay2)->get();
                }
        if((isset($ngay1))&&(isset($ngay2))){

        $lop=DB::table('lopkhoa')->join('lophoc','lophoc.MaLop','=','lopkhoa.MaLop')->where('lopkhoa.MaLop',$lk->MaLop)->where('NgayKhaiGiang',[$ngay1,$ngay2])->get();
                }
        if(!$lop->isEmpty()){
        foreach($lop as $lp){
        $dangki=$this->so_luong_dang_ki_hoc($lp->id);
        

            $a=json_decode($dangki,true);
        $c=$c+$a['dangkithuc']; $d=$d+$a['dangkiao'];

                    }
                        }
        $result[]=[$lk->TenLop,$c,$d];

                }


            return view('admin.thongke.thongkekhoahoc')->with(['visitor'=>json_encode($result),'ngay1'=>$ngay1,'ngay2'=>$ngay2]);
            }
    public function so_luong_dang_ki_hoc($id){
        # code...
   
       

        $so_luong_dk=DB::table('phieudkhoc')->join('lopkhoa','phieudkhoc.id','=','lopkhoa.id')->where('lopkhoa.id',$id)->get();

        $dangkiao=0;
        $dangkithuc=0;
        $tong=0;
        if (!empty($so_luong_dk)) {
            # code...
        
        foreach ($so_luong_dk as $sl) {

            # code...

            
            if($sl->TinhTrang==0){
                $dangkiao++;
            }
            if($sl->TinhTrang==1){
                $dangkithuc++;
            }
            $tong++;
                  
        }
    }
        $so_luong=json_encode(array('dangkithuc' =>$dangkithuc ,'dangkiao' => $dangkiao ));
    

            return $so_luong;
    }
   
    public function In_thong_ke_ki_thi(Request $request){
        $data=json_decode($request->data);

        $fileName = 'thongke'.time();
                return Excel::create($fileName, function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)

            {   $sheet->mergeCells('A1:I1');
                $sheet->setFontFamily('Times New Roman');
                $sheet->cell('C1', function ($cell) {
                $cell->setValue('THỐNG KÊ KÌ THI');
 
                $cell->setFontWeight('bold');
            });

                $sheet->fromArray($data, null, 'A3', false, true);

            });

        })->download('csv');
                    return 0;
    }

}
