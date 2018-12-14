<?php

namespace App\Http\Controllers;
use App\GiangVien;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\TKGiangVien;
use App\taikhoan;
use App\MonHoc;
use App\DayMonHoc;
use DB;
use Auth;
use Illuminate\Support\Facades\Validator;
use Session;



class GiangVienController extends Controller
{
    public function getDanhSach()
    {
      $giangvien = GiangVien::all();
      $monhoc= MonHoc::all();
      return view('admin.giangvien.danhsach',['giangvien'=>$giangvien,'monhoc'=>$monhoc]);
    }

    public function getThem()
    {
      $monhoc= MonHoc::all();
      return view('admin.giangvien.them',['monhoc'=>$monhoc]);
    }
   

    //truyen requet de nhan du lieu
    public function postThem(Request $request)
    {
       $data = $request->all(); 
      //truyen vao 2 mang
      //mang 1 yeu cau dau vao du lieu
      //mang 2 hien thi thong bao loi
      $this->validate($request,
        [
        
		    'HoTenGV'=>'required',
        'GioiTinhGV'=>'required',
        'NgaySinhGV'=>'required',
        'TrinhDoGV'=>'required',
       
        'DiaChiGV'=>'required',
        'EmailGV'=>'required',
        'SDTGV'=>'required',

        ],
        [
				'HoTenGV.required'=>'Bạn chưa nhập họ tên giảng viên',
        'GioiTinhGV.required'=>'Bạn chưa chọn giới tính giảng viên',
        'TrinhDoGV.required'=>'Bạn chưa nhập trình đô giảng viên',
        
        'NgaySinhGV.required'=>'Bạn chưa nhập ngày  giảng viên',
        'DiaChiGV.required'=>'Bạn chưa nhập  địa chỉ giảng viên',
        'EmailGV.required'=>'Bạn chưa nhập email giảng viên',
        'SDTGV.required'=>'Bạn chưa nhập SDT giảng viên',


				
        ]);
      //sau khi bat loi, ta tao doi tuong 
      $giangvien = new GiangVien;
    
      $giangvien->HoTenGV = $request->HoTenGV;
     $giangvien->GioiTinhGV = $request->GioiTinhGV;
     $giangvien->DiaChiGV = $request->DiaChiGV;
      $giangvien->NgaySinhGV = $request->NgaySinhGV;
      $giangvien->EmailGV = $request->EmailGV;
      $giangvien->TrinhDoGV = $request->TrinhDoGV;
      $giangvien->SDTGV = $request->SDTGV;
       $giangvien->TinhTrang = 1;
     $giangvien->save();

     $monhoc=$request->MonHoc;
     
     $MaGV=GiangVien::getLastID()->first();
     foreach($monhoc as $key=>$mon){
     DB::table('day_mon_hocs')->insert([
        'MaGV'=>$MaGV->MaGV,
        'MaMonHoc'=>$monhoc[$key]
     ]);
      }
      return redirect('ad/giangvien/danhsach')->with('thongbao','Thêm giảng viên thành công');
    }

  public function getSua($MaGV)
    {
     $monhoc= DB::table('monhoc')->join('day_mon_hocs','monhoc.MaMonHoc','=','day_mon_hocs.MaMonHoc')->where('MaGV',$MaGV)->get();
     $mon=MonHoc::all();
   $giangvien = GiangVien::find($MaGV);
      return view('admin.giangvien.sua',['giangvien'=>$giangvien,'monhoc'=>$monhoc,'mon'=>$mon]);
}

    public function postSua(Request $request)
    {
      $giangvien = GiangVien::find($request->MaGV);
      $this->validate($request,
        [
        
        'HoTenGV'=>'required',
        'GioiTinhGV'=>'required',
        'NgaySinhGV'=>'required',
        'TrinhDoGV'=>'required',
        'DiaChiGV'=>'required',
        'EmailGV'=>'required',
        'SDTGV'=>'required',

        ],
        [
         
        'HoTenGV.required'=>'Bạn chưa nhập họ tên giảng viên',
        'GioiTinhGV.required'=>'Bạn chưa chọn giới tính giảng viên',
        'TrinhDoGV.required'=>'Bạn chưa nhập trình đô giảng viên',
        'NgaySinhGV.required'=>'Bạn chưa nhập ngày  giảng viên',
        'DiaChiGV.required'=>'Bạn chưa nhập  địa chỉ giảng viên',
        'EmailGV.required'=>'Bạn chưa nhập email giảng viên',
        'SDTGV.required'=>'Bạn chưa nhập SDT giảng viên',


        
        ]);
      //sau khi bat loi, ta tao doi tuong 

     
      $giangvien->HoTenGV = $request->HoTenGV;
     $giangvien->GioiTinhGV = $request->GioiTinhGV;
     $giangvien->DiaChiGV = $request->DiaChiGV;
      $giangvien->NgaySinhGV = $request->NgaySinhGV;
      $giangvien->EmailGV = $request->EmailGV;
      $giangvien->TrinhDoGV = $request->TrinhDoGV;
     $giangvien->save();

      $monhoc=$request->MonHoc;
     $id=DayMonHoc::where('MaGV','=',$request->MaGV)->delete();
     foreach($monhoc as $key=>$mon){
     DB::table('day_mon_hocs')->insert([
        'MaGV'=>$request->MaGV,
        'MaMonHoc'=>$monhoc[$key]
     ]);


}
      return redirect('ad/giangvien/danhsach')->with('thongbao','Sửa giảng viên thành công');
    }

    public function getXoa($MaGV)
    {
      $giangvien = GiangVien::find($MaGV);
      $giangvien->delete();
      return redirect('ad/giangvien/danhsach')->with('thongbao','Đã xóa thành công');
    }
     public function profile(){
        $user=Auth::user()->username;
        $hovien=tkGiangVien::where('username',$user)->first();
        $nguoidung=giangvien::where('MaGV',$hovien->MaGV)->first();

        $tk=taikhoan::where('username',$user)->first();


          return view('page.giangvien.giangvien',compact('nguoidung','tk'));

    }
      protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255',
            'dienthoai'=>'required|numeric|max:999999999999999',
            'hoten'=>'required|regex:/(^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]+$)+/',
            'diachi'=>'required',
            
        ],[
                'required'=>'Đây là trường bắt buộc',
                'unique'=>'Thông tin đã được sử dụng bởi user khác',
                'min'=>'password ít nhất 6 kí tự',
                'numeric'=>'Định dạng số',
                'max'=>'SDT không quá 15 số',
                'regex'=>'Định dạng không đúng'

        ]);
    }
    public function profile_update(Request $request){
        $gvien=tkGiangVien::where('username',Auth::user()->username)->first();

        $data = $request->all(); 
            $validator = $this->validator($data);
 
                   if ($validator->fails()) {
                         // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
                     return redirect('giangvien')->withErrors($validator)->withInput();
                         }
                  else {   
                                // Dữ liệu vào hợp lệ sẽ thực hiện tạo người dùng dưới csdl
         $file_name='0';
        if(isset($data['file']))
        {
            $files =$data['file'];
            $file_name = time().'_'.$files->getClientOriginalName();
            // Lưu file vào thư mục  với tên là biến $filename
            $files->move('avatar', $file_name);
            DB::table('taikhoan')->where('username',Auth::user()->username)->update([
                'avatar'=>$file_name
            ]);
            

         }
         DB::table('giangvien')->where('MaGV',$gvien->MaGV)->update(['HoTenGV'=>$data['hoten'],
            'GioiTinhGV'=>$data['gioitinh'],
            'NgaySinhGV'=>$data['ngaysinh'],
            'DiaChiGV'=>$data['diachi'],
            'EmailGV'=>$data['email'],
            'SDTGV'=>$data['dienthoai'],
            
        ]);
        if(isset($data['new_pass'])){
            $val=Validator::make($data,[
                'old_pass'=>'required',
                'new_pass'=>'min:6',
            ],['required'=>'Đây là trường bắt buộc']);
            if ($validator->fails()) {
                         // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
                     return redirect('giangvien')->withErrors($val)->withInput();
                         }
                  else {
                    $current_pass=Auth::user()->password;
                    if(Hash::check($data['old_pass'],$current_pass)){
                      DB::table('taikhoan')->where('username',$hocvien->username)->update(['password'=>Hash::make($data['new_pass'])]);

                    }
                    else{
                      return redirect('giangvien')->withErrors(['old_pass'=>'Sai password'])->withInput();
                    }
                  }
                

          }
          Session::flash('success', 'Sửa thành công');
                      return redirect('giangvien');


    }
     

}
}
