<?php

namespace App\Http\Controllers;
use App\HocVien;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\TKHocVien;
use Auth;
use DB;
use App\taikhoan;
use App\phieudkthi;
use Illuminate\Support\Facades\Validator;
use Session;




class HocVienController extends Controller
{
    public function getDanhSach()
    {
      $hocvien = HocVien::all();
      return view('admin.hocvien.danhsach',['hocvien'=>$hocvien]);
    }

    public function getThem()
    {
      return view('admin.hocvien.them');
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
       
		    'HoTenHocVien'=>'required',
        'GioiTinh'=>'required',
        'NgaySinh'=>'required',
        'DiaChi'=>'required',
        'Email'=>'required',
        'SDT'=>'required',

        ],
        [
          
				'HoTenHocVien.required'=>'Bạn chưa nhập họ tên học viên',
        'GioiTinh.required'=>'Bạn chưa chọn giới tính',
        'NgaySinh.required'=>'Bạn chưa nhập ngày sinh',
        'DiaChi.required'=>'Bạn chưa nhập ngày sinh địa chỉ',
        'Email.required'=>'Bạn chưa nhập email',
        'SDT.required'=>'Bạn chưa nhập SDT',


				
        ]);
      //sau khi bat loi, ta tao doi tuong 
      $hocvien = new HocVien;
      
      $hocvien->HoTenHocVien = $request->HoTenHocVien;
      $hocvien->GioiTinh = $request->GioiTinh;
      $hocvien->DiaChi = $request->DiaChi;
      $hocvien->Email = $request->Email;
       $hocvien->NgaySinh = $request->NgaySinh;
      $hocvien->SDT = $request->SDT;
      $hocvien->CMND=$request->cmnd;
      $hocvien->NgayCap=$request->ngaycap;
      $hocvien->NgheNghiep=$request->nghenghiep;
      $hocvien->save();

       User::create([
             'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'confirmed' => 0,
            'quyen'=>4,
            
        ]);


      $userid=hocvien::getlastID()->first();
      tkhocvien::create([
            'MaHocVien'=>$userid->MaHocVien,
            'username'=>$data['username'],        
      ]);

      return redirect('ad/hocvien/danhsach')->with('thongbao','Thêm học viên thành công');
    }

  public function getSua($MaHocVien)
    {
     
   $hocvien = HocVien::find($MaHocVien);
      return view('admin.hocvien.sua',['hocvien'=>$hocvien]);
}

    public function postSua(Request $request, $MaHocVien)
    {
      $hocvien = HocVien::find($MaHocVien);
      $this->validate($request,
        [
      
        'HoTenHocVien'=>'required',
        
        'NgaySinh'=>'required',
        'DiaChi'=>'required',
        'Email'=>'required',
        'SDT'=>'required',

        ],
        [
         
        'HoTenHocVien.required'=>'Bạn chưa nhập họ tên học viên',
       
        'NgaySinh.required'=>'Bạn chưa nhập ngày sinh',
        'DiaChi.required'=>'Bạn chưa nhập ngày sinh địa chỉ',
        'Email.required'=>'Bạn chưa nhập email',
        'SDT.required'=>'Bạn chưa nhập SDT',


        
        ]);
      //sau khi bat loi, ta tao doi tuong 
    
    
      $hocvien->HoTenHocVien = $request->HoTenHocVien;
      $hocvien->GioiTinh=$request->GioiTinh;
      $hocvien->DiaChi = $request->DiaChi;
      $hocvien->Email = $request->Email;
       $hocvien->NgaySinh = $request->NgaySinh;
      $hocvien->SDT = $request->SDT;
      $hocvien->CMND=$request->cmnd;
      $hocvien->NgayCap=$request->NgayCap;
      $hocvien->NgheNghiep=$request->nghenghiep;
      $hocvien->save();

      return redirect('ad/hocvien/danhsach')->with('thongbao','sửa học viên thành công');
    }

    public function getXoa($MaHocVien)
    {
      $hocvien = HocVien::find($MaHocVien);
      $hocvien->delete();
      return redirect('ad/hocvien/danhsach')->with('thongbao','Đã xóa thành công');
    }
    public function get_DS_DK_thi(){
      $MaHocVien=TKHocVien::where('username',Auth::user()->username)->select('MaHocVien')->first();
      $phieudkthi=DB::table('kythis')->join('phieudkthis','phieudkthis.MaKiThi','=','kythis.MaKiThi')->where('MaHocVien','=',$MaHocVien->MaHocVien)->get();
      return view('page.dangkythi',compact('phieudkthi',$phieudkthi));
    }
    public function del($id){
      phieudkthi::destroy($id);
                      return redirect('hocvien/dangkythi');
    }

    public function profile(){
        $user=Auth::user()->username;
        $hovien=tkHocVien::where('username',$user)->first();
        $nguoidung=hocvien::where('MaHocVien',$hovien->MaHocVien)->first();
        $tk=taikhoan::where('username',$user)->first();


          return view('page.nguoidung',compact('nguoidung','tk'));

    }
     protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255',
            'dienthoai'=>'required|numeric|max:999999999999999',
            'hoten'=>'required|regex:/(^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]+$)+/',
            'diachi'=>'required',
            'cmnd'=>'required|numeric|max:999999999999999',
            'ngaycap'=>'required',
            'nghenghiep'=>'required'
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
        $hocvien=tkHocVien::where('username',Auth::user()->username)->first();

        $data = $request->all(); 
            $validator = $this->validator($data);
 
                   if ($validator->fails()) {
                         // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
                     return redirect('nguoidung')->withErrors($validator)->withInput();
                         }
                  else {   
                                // Dữ liệu vào hợp lệ sẽ thực hiện tạo người dùng dưới csdl
         $confirmation_code = time().uniqid(true);
         $email=$data['email'];
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
         DB::table('hocvien')->where('MaHocVien',$hocvien->MaHocVien)->update(['HoTenHocVien'=>$data['hoten'],
            'GioiTinh'=>$data['gioitinh'],
            'NgaySinh'=>$data['ngaysinh'],
            'DiaChi'=>$data['diachi'],
            'Email'=>$data['email'],
            'SDT'=>$data['dienthoai'],
            'CMND'=>$data['cmnd'],
            'NgayCap'=>$data['ngaycap'],
            'NgheNghiep'=>$data['nghenghiep']
        ]);
        if(isset($data['new_pass'])){
            $val=Validator::make($data,[
                'old_pass'=>'required',
                'new_pass'=>'min:6',
            ],['required'=>'Đây là trường bắt buộc']);
            if ($validator->fails()) {
                         // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
                     return redirect('nguoidung')->withErrors($val)->withInput();
                         }
                  else {
                    $current_pass=Auth::user()->password;
                    if(Hash::check($data['old_pass'],$current_pass)){
                      DB::table('taikhoan')->where('username',$hocvien->username)->update(['password'=>Hash::make($data['new_pass'])]);

                    }
                    else{
                      return redirect('nguoidung')->withErrors(['old_pass'=>'Sai password'])->withInput();
                    }
                  }
                

          }
          Session::flash('success', 'Sửa thành công');
                      return redirect('nguoidung');


    }
     

}
}
