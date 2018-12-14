<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
 use Auth;
 use DB;
 use Illuminate\Routing\Redirector;
 use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/ad';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required',
            'password' => 'required',
            
        ],['required'=>'Đây là trường bắt buộc']);
    }
    public function postLogin(Request $request){
        $data = $request->all(); 
        $validator = $this->validator($data);
 
            if ($validator->fails()) {
                         // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
            return redirect('dangnhap')->withErrors($validator)->withInput();
                         }
         else{
        $checkdata = [
            'username' => $request->username,
            'password' => $request->password,
            
        ];
        $taikhoan_id= $request->username;
                if (Auth::attempt($checkdata)) {
                    //$user=DB::table('taikhoan')->where('username',$taikhoan_id)->get();
             //return redirect()->route('home', [$user]);
                    if((Auth::user()->quyen==3)||(Auth::user()->quyen==4))
                     {
                        return redirect('/');}
                    else{
                      return  redirect()->back()
                    ->withErrors([
                        'error'  =>  'Bạn không được quyền truy cập'
                    ]);
                    }
                     }
                    
        else {
         return redirect()->back()
                    ->withErrors([
                        'error'  =>  'Sai username hoặc password'
                    ]);
             }
            }

    }
    public function postLoginadmin(Request $request){
        $data = $request->all(); 
        $validator = $this->validator($data);
 
            if ($validator->fails()) {
                         // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
            return redirect('ad/login')->withErrors($validator)->withInput();
                         }
         else{
        $checkdata = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        $taikhoan_id= $request->username;
                if (Auth::attempt($checkdata)) {
                    //$user=DB::table('taikhoan')->where('username',$taikhoan_id)->get();
             //return redirect()->route('home', [$user]);
                    if((Auth::user()->quyen==1)||(Auth::user()->quyen==2))
                     {
                        return redirect('/ad');}
                    else

                        {
                            redirect()->back()
                    ->withErrors([
                        'error'  =>  'Bạn không được quyền truy cập'
                    ]);
                        }                    
                     }
        else {
         return redirect()->back()
                    ->withErrors([
                        'error'  =>  'Sai username hoặc password'
                    ]);
             }
            }

    }
    public function logout(Request $request) {
                     Auth::logout();
                 return redirect('/');
            }
    
        }
