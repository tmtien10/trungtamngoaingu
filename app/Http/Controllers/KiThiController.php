<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\chungchi;
use App\kythi;
use App\phieudkthi;
use App\diemthichungchi;
use Session;
use Validator;
use Hash;
use DB;
class KiThiController extends Controller
{
    //
     protected function validator(array $data)
    {
        return Validator::make($data, [
            
            'ten'=>'required|regex:/(^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]+$)+/',
            'giobatdau'=>'required',
            'gioketthuc'=>'required',
            'ngaythi'=>'required',
            'lephi'=>'required'
               ]);
    }
    public function viewlist(){
    	$kithi=DB::table('kythis')->join('chungchis','kythis.MaCC','=','chungchis.MaCC')->get();

    	return view('admin.kithi.kithi')->with('kithi',$kithi);
    }
    public function view(){
    	$kithi=DB::table('kythis')->join('chungchis','kythis.MaCC','=','chungchis.MaCC')->orderBy('TenKiThi')->get();
    	$chungchi=chungchi::all();

    	return view('page.tochuckithi')->with(['kithi'=>$kithi,'chungchi'=>$chungchi]);
    }
    public function viewChiTiet($id){
            $kithi=DB::table('kythis')->join('chungchis','kythis.MaCC','=','chungchis.MaCC')->where('MaKiThi',$id)->get();
            $chungchi=chungchi::all();
      return view('admin.kithi.chitietkithi')->with(['kithi'=>$kithi,'chungchi'=>$chungchi]);

    }
    public function viewCreate(){
    	$chungchi=chungchi::all();
    	return view('admin.kithi.themkithi')->with(['chungchi'=>$chungchi]);
    }
    public function viewUpdate($id){
    	    	$kithi=DB::table('kythis')->join('chungchis','kythis.MaCC','=','chungchis.MaCC')->where('MaKiThi',$id)->get();
    	    	$chungchi=chungchi::all();
    	return view('admin.kithi.suakithi')->with(['kithi'=>$kithi,'chungchi'=>$chungchi]);

    }
    public function create($data){
    	return kythi::create([
    		'TenKiThi'=>$data['ten'],
    		'MaCC'=>$data['chungchi'],
    		'NgayThi'=>$data['ngaythi'],
    		'GioBatDau'=>$data['giobatdau'],
    		'GioKetThuc'=>$data['gioketthuc'],
    		'LePhi'=>$data['lephi']
    	]);
    }
    protected function update($data){
      return DB::table('kythis')->where('MaKiThi',$data['id'])->update([
      			'TenKiThi'=>$data['ten'],
    		'MaCC'=>$data['chungchi'],
    		'NgayThi'=>$data['ngaythi'],
    		'GioBatDau'=>$data['giobatdau'],
    		'GioKetThuc'=>$data['gioketthuc'],
    		'LePhi'=>$data['lephi']


    			  ]);
	  }
    public function postCreate(Request $request){
    		 $data = $request->all();

            $validator = $this->validator($data);
             if ($validator->fails()) {
                         // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
                     return redirect('ad/kithi/them')->withErrors($validator)->withInput();
                         }
                  else { 
                  	if($this->create($data)){
                      
                      Session::flash('success', 'Thêm mới thành công');
                      return redirect('ad/kithi');
                    }
                  }
    }
    public function postUpdate(Request $request){
    		$data = $request->all();

            $validator = $this->validator($data);
             if ($validator->fails()) {
                         // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
                     return redirect('ad/kithi/'.$request->id)->withErrors($validator)->withInput();
                         }
              else {
              			$this->update($data);
                     

                      Session::flash('success', 'Sửa thành công');
                      return redirect('ad/kithi');
              }
    }
    public function delete($id){
    	kythi::destroy($id);
    	Session::flash('success', 'Xóa thành công');
                      return redirect('ad/kithi');

    }
    public function filter(Request $request){

    	$time=$request->time;
    	$loai=$request->loai;

    	//
    	if((!isset($loai))&&(!isset($time)))  return $this->view();

    	if((isset($loai)) && (isset($time))){
    	$kithi=DB::table('kythis')->join('chungchis','kythis.MaCC','=','chungchis.MaCC')->whereMonth('kythis.NgayThi',date('m-Y',strtotime($time)))->where('chungchis.MaCC',$loai)->get();
    	$chungchi=chungchi::all();

    	return view('page.tochuckithi')->with(['kithi'=>$kithi,'chungchi'=>$chungchi,'time'=>$time,'loai'=>$loai]);
    	}
    	if(isset($time)){
    	$kithi=DB::table('kythis')->join('chungchis','kythis.MaCC','=','chungchis.MaCC')->whereMonth('NgayThi',date('m-Y',strtotime($time)))->get();
    	$chungchi=chungchi::all();

    	return view('page.tochuckithi')->with(['kithi'=>$kithi,'chungchi'=>$chungchi,'time'=>$time,'loai'=>$loai]);
    	}

    	if(isset($loai)){
    	$kithi=DB::table('kythis')->join('chungchis','kythis.MaCC','=','chungchis.MaCC')->where('chungchis.MaCC',$loai)->get();
    	$chungchi=chungchi::all();

    	return view('page.tochuckithi')->with(['kithi'=>$kithi,'chungchi'=>$chungchi,'time'=>$time,'loai'=>$loai]);
    	}
    	
    }
    public function nhom(Request $request){
      $kithi=$request->kt;
      $so_luong_hv_moi_nhom=$request->sl;
      $so_luong_phieu_dang_ki=phieudkthi::where('MaKiThi',$kithi)->count();

      $so_nhom= ceil($so_luong_phieu_dang_ki/$so_luong_hv_moi_nhom);

      for($i=1; $i<=$so_nhom;$i++){
        $start=($i-1)*$so_luong_hv_moi_nhom;
        $end=$so_luong_hv_moi_nhom;
        $danh_sach=DB::table('phieudkthis')->where('MaKiThi',$kithi)->skip($start)->take($end)->select('MaHocVien')->get();
          foreach ($danh_sach as $danh_sach) {
            # code...
          $kt=DB::table('diemthichungchis')->where('MaHocVien',$danh_sach->MaHocVien)->where('MaKiThi',$kithi)->get();
          if($kt->isEmpty()){

            DB::table('diemthichungchis')->insert([
              'MaHocVien'=>$danh_sach->MaHocVien,
              'MaKiThi'=>$kithi,
              'PhongThi'=>$i,
              'DiemThi'=>json_encode(['nghe'=>0,'noi'=>0,'doc'=>0,'viet'=>0])
            ]);

          }
      }
          }
      Session::flash('success', 'Chia thành công');
                      return redirect('ad/kithi/chitiet/'.$kithi);
      
    }
    public function viewDS($id){
      $ds=DB::table('diemthichungchis')->join('hocvien','hocvien.MaHocVien','=','diemthichungchis.MaHocVien')->where('MaKiThi',$id)->get();
      return view('admin.kithi.danhsach')->with('ds',$ds);
    }
    public function delDS($id){
     
      DB::table('diemthichungchis')->where('MaKiThi',$id)->delete();

      Session::flash('success', 'Xóa thành công');
                      return redirect('ad/kithi/chitiet/'.$id);
    }
    
}
