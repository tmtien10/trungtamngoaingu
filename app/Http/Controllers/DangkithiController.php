<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\phieudkthi;
use DB;
use Auth;
use App\hocvien;
use App\kythi;
use chungchi;
use Session;
use App\tkHocVien;

class DangkithiController extends Controller
{
    //
     protected function validator(array $data)
    {
        return Validator::make($data, [
            'hoten' => 'required|string',
            'gioitinh' => 'required|string',
            'email' => 'required|email|unique:hocvien,email',
            'sdt'=>'required|numeric|max:999999999999999|unique:hocvien,SDT',
            'diachi'=>'required|regex:/(^[0_9a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]+$)+/',
            'ngaysinh'=>'required',
        ]);
    }
    public function viewForm(){

    }
    public function viewList(){
    	$phieudkthi=DB::table('kythis')->join('phieudkthis','phieudkthis.MaKiThi','=','kythis.MaKiThi')->join('chungchis','chungchis.MaCC','=','kythis.MaCC')->get();
    	return view('admin.phieudangki.dangkithi')->with('phieudkthi',$phieudkthi);

    }
    public function viewCreate(){
    	$hocvien=hocvien::all();
        $kithi=kythi::all();
    	return view('admin.phieudangki.themdkthi')->with(['hocvien'=>$hocvien,'kithi'=> $kithi]);

    }
    public function viewUpdate($id){
        $phieu=phieudkthi::where('idphieudk',$id)->get();
        return view('admin.phieudangki.suaphieudkthi')->with('phieu',$phieu);

    }
     public function viewChitiet($id){
        $phieu=phieudkthi::where('idphieudk',$id)->get();
        return view('admin.phieudangki.chitietphieudkthi')->with('phieu',$phieu);

    }
    public function create($data){
        return $id=phieudkthi::create([

            'MaKiThi'=>$data['id'],
            'MaHocVien'=>$data['hocvien'],
            'TinhTrang'=>0,
        ]);
        
    	

    }
    public function update(Request $request){

        DB::table('phieudkthis')->where('idphieudk',$request->duyet)->update(['TinhTrang'=>$request->tinhtrang]);
        $phieu=phieudkthi::where('idphieudk',$request->duyet)->get();
      return view('admin.hoadon.themhoadonthi')->with('phieu',$phieu);
    }
    public function postCreate(Request $request){
       $user=Auth::user()->username;
       $hovien=tkHocVien::where('username',$user)->first();
       $da_tk=DB::table('phieudkthis')->where('MaHocVien','=',$hovien->MaHocVien)->where('MaKiThi',$request->dk)->count();
       if($da_tk==0){
       $data=[
        'id'=>$request->dk,
        'hocvien'=>$hovien->MaHocVien,
         ];
        
       $this->create($data);
       $a = DB::table('phieudkthis')->orderBy('idphieudk','DESC')->first();

        Session::flash('success', 'Đăng kí thành công. Mã số đăng kí của bạn là #'.$a->idphieudk);
                      return redirect('hocvien/dangkythi');
      }
      else {
         Session::flash('error', 'Bạn đã đăng kí trước đó');
                      return redirect('tochucthi');
      }  

    }
    public function delete($id){
        phieudkthi::destroy($id);
        Session::flash('success', 'Xóa thành công');
                      return redirect('ad/dangkithi');

    }
    public function view_phieudk($id){
      $user=Auth::user()->username;
       $hovien=tkHocVien::where('username',$user)->first();

      $phieu=DB::table('phieudkthis')->where('idphieudk',$id)->where('MaHocVien',$hovien->MaHocVien)->first();

      return view('page.chitietphieudkthi')->with('phieu',$phieu);

    }
    
}
