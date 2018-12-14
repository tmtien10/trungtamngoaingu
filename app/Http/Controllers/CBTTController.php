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
use Session;
use Validator;
use Hash;
use DB;
use Auth;
class CBTTController extends Controller
{
    //
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email'=>'required|email|unique:cbtt,EmailNV',
            'dienthoai'=>'required|numeric|unique:cbtt,SDTNV',
            'diachi'=>'required',
            'hoten'=>'required|regex:/(^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]+$)+/',
            'ngaysinh'=>'required',
            'gioitinh'=>'required'  
               ],[
               'required'=>'Đây là trường bắt buộc',
                'unique'=>'Thông tin đã được sử dụng bởi user khác',
                'min'=>'password ít nhất 6 kí tự',
                'numeric'=>'Định dạng số',
                'max'=>'SDT không quá 15 số',
                'regex'=>'Định dạng không đúng']);
    }

    protected function create($data){

      return cbtt::create([
        'HoTenNV'=>$data['hoten'],
        'GioiTinhNV'=>$data['gioitinh'],
        'NgaySinhNV'=>$data['ngaysinh'],
        'DiaChiNV'=>$data['diachi'],
        'EmailNV'=>$data['email'],
        'SDTNV'=>$data['dienthoai'],
        'TinhTrang'=>1,
      ]);
    }
    protected function update($data){
      return DB::table('cbtt')->where('MaNV',$data['MaNV'])->update([
        'HoTenNV'=>$data['hoten'],
        'GioiTinhNV'=>$data['gioitinh'],
        'NgaySinhNV'=>$data['ngaysinh'],
        'DiaChiNV'=>$data['diachi'],
        'EmailNV'=>$data['email'],
        'SDTNV'=>$data['dienthoai'],
        'TinhTrang'=>$data['tinhtrang'],
      ]);

    }
    public function viewCbtt(){

      $cbtt=cbtt::all();
      return view('admin.cbtt.dscbtt')->with('cbtt',$cbtt);
    }
   public function viewCreate(){
      return view('admin.cbtt.themcbtt');
   }
   public function CreateCBTT(Request $request){

            $data = $request->all();

            $validator = $this->validator($data);
             if ($validator->fails()) {
                         // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
                     return redirect('ad/cbtt/them')->withErrors($validator)->withInput();
                         }
                  else {  
                    if($this->create($data)){
                      Session::flash('success', 'Thêm mới thành công');
                      return redirect('ad/cbtt');
                    }
                  }
        }
      public function viewUpdate($MaNV){
          $cbtt=cbtt::find($MaNV);
        return view('admin.cbtt.editcbtt')->with('cbtt',$cbtt);
       }
     public function UpdateCBTT(Request $request){

                $data = $request->all(); 
                $id=$data['MaNV'];
            $validator = Validator::make($data, [
            'email'=>'required|email',
            'dienthoai'=>'required|numeric',
            'diachi'=>'required',
            'hoten'=>'required|regex:/(^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]+$)+/',
            'ngaysinh'=>'required',
            'gioitinh'=>'required'  
               ],['required'=>'Đây là trường bắt buộc',
                'min'=>'password ít nhất 6 kí tự',
                'numeric'=>'Định dạng số',
                'max'=>'SDT không quá 15 số',
                'regex'=>'Định dạng không đúng']);
            if ($validator->fails()) {
                         // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
                     return redirect('ad/cbtt/'.$id)->withErrors($validator)->withInput();
                         }
                  else {
                    $this->update($data);
                      Session::flash('success', 'Sửa thành công');
                      return redirect('ad/cbtt');                      
                  }
          }
      public function delete($MaNV){
        cbtt::destroy($MaNV);
        Session::flash('success', 'Xóa thành công');
                      return redirect('ad/cbtt');
      }
      public function profile(){
        $username=Auth::user()->username;
        $user=DB::table('taikhoan')->join('tkcbtt','tkcbtt.username','=','taikhoan.username')->where('taikhoan.username','=',$username)->get();

        return view('admin.cbtt.thongtincb',compact('user',$user));
      }
      public function saveprofile(Request $request){
          $data=$request->all();
         $username=Auth::user()->username;
        $user=DB::table('taikhoan')->join('tkcbtt','tkcbtt.username','=','taikhoan.username')->where('taikhoan.username','=',$username)->first();

        //update avatar
        if(isset($data['file'])){
            $files =$data['file'];
            $file_name = time().'_'.$files->getClientOriginalName();
            // Lưu file vào thư mục  với tên là biến $filename
            $files->move('avatar', $file_name);
           DB::table('taikhoan')->where('username',$username)->update([
                'avatar'=>$file_name
           ]);


         }

         //update thong tin
         $validator = Validator::make($data, [
            'email'=>'required|email',
            'dienthoai'=>'required|numeric',
            'diachi'=>'required',
            'hoten'=>'required|regex:/(^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]+$)+/',
            'ngaysinh'=>'required',
            'gioitinh'=>'required'  
               ],['required'=>'Đây là trường bắt buộc',
                'min'=>'password ít nhất 6 kí tự',
                'numeric'=>'Định dạng số',
                'max'=>'SDT không quá 15 số',
                'regex'=>'Định dạng không đúng']);
            if ($validator->fails()) {
                         // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
                     return redirect('ad/myprofile')->withErrors($validator)->withInput();
                         }
                  else {
                    $this->update($data);

                  }

          if(isset($data['new_pass'])){
            $val=Validator::make($data,[
                'old_pass'=>'required',
                'new_pass'=>'min:6',
            ],['required'=>'Đây là trường bắt buộc']);
            if ($validator->fails()) {
                         // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
                     return redirect('ad/myprofile')->withErrors($val)->withInput();
                         }
                  else {
                    $current_pass=Auth::user()->password;
                    if(Hash::check($data['old_pass'],$current_pass)){
                      DB::table('taikhoan')->where('username',$username)->update(['password'=>Hash::make($data['new_pass'])]);

                    }
                    else{
                      return redirect('ad/myprofile')->withErrors(['old_password'=>'Sai password'])->withInput();
                    }
                  }
                

          }
          Session::flash('success', 'Sửa thành công');
                      return redirect('ad/myprofile');
        
      }

}
