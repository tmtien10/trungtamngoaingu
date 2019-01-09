<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use  Redirect;
use Session;
use DB;

use Mail;
use App\hocvien;
use App\TKHocVien;
use App\taikhoan;

use App\Mail\UserEmail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|unique:taikhoan',
            'email' => 'required|string|email|max:255|unique:hocvien,Email',
            'password' => 'required|string|min:6',
            'dienthoai'=>'required|numeric|max:999999999999999|unique:hocvien,SDT',
            'hoten'=>'required|regex:/(^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]+$)+/',
            'diachi'=>'required',
            'cmnd'=>'required|numeric|max:999999999999999|unique:hocvien,CMND',
            'ngaycap'=>'required',
            'nghenghiep'=>'required',
            'ngaysinh'=>'required'
        ],[
                'required'=>'Đây là trường bắt buộc',
                'unique'=>'Thông tin đã được sử dụng bởi user khác',
                'min'=>'password ít nhất 6 kí tự',
                'numeric'=>'Định dạng số',
                'max'=>'SDT không quá 15 số',
                'regex'=>'Định dạng không đúng'

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)

    {    
        //
    }
    public function postDangKi(Request $request){

           $data = $request->all(); 
            $validator = $this->validator($data);
 
                   if ($validator->fails()) {
                         // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
                     return redirect('dangky')->withErrors($validator)->withInput();
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
            

         }

       User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'confirmation_code'=>$confirmation_code,
            'confirmed' => 0,
            'quyen'=>4,
            'avatar'=>$file_name
        ]);
        hocvien::create([
            'HoTenHocVien'=>$data['hoten'],
            'GioiTinh'=>$data['gioitinh'],
            'NgaySinh'=>$data['ngaysinh'],
            'DiaChi'=>$data['diachi'],
            'Email'=>$data['email'],
            'SDT'=>$data['dienthoai'],
            'CMND'=>$data['cmnd'],
            'NgayCap'=>$data['ngaycap'],
            'NgheNghiep'=>$data['nghenghiep']
        ]);
      $userid=hocvien::getlastID()->first();
      TKHocVien::create([
            'MaHocVien'=>$userid->MaHocVien,
            'username'=>$data['username'],        
      ]);
      Mail::send('mail.email-confirmation', ['code'=>$confirmation_code], function($message) use ($email){
          $message->to($email)->subject('Email xác nhận');
       });
      
            Session::flash('thongbao', 'Vui lòng kiểm tra mail xác nhận!');
            return redirect('dangky');
                      }
                }
   public function verify($code){

        $user = User::where('confirmation_code', '=',$code)->get();
        if ($user->count() > 0) {
            DB::table('taikhoan')->where('confirmation_code', '=',$code)->update([
                'confirmed' => 1,
                'confirmation_code' => null
            ]);
            return "<script>alert('Xác nhận thành công!Vui lòng đăng nhập lại');
                window.location.href='https://qlttnn.herokuapp.com';</script>";
        } else {
            return "<script>alert('Mã xác nhận không chính xác');
                window.location.href='https://qlttnn.herokuapp.com';</script>";
        }

        
   }
}