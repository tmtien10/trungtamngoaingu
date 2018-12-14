<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\taikhoan;
use App\hocvien;
use App\giangvien;
use App\cbtt;
use App\tkHocVien;
use App\tkGiangVien;
use App\tkcbtt;
use Session;
use Validator;
use Hash;
use DB;
class TaikhoanController extends Controller
{
    //
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|min:3|unique:taikhoan,username',
            'password' => 'required|string|min:6',
            'nguoidung'=>'required'
        ]);
    }
    public function getTaiKhoan($username){

    	$taikhoan=taikhoan::find($username);
    	$hocvien=taikhoan::find($username)->hocvien;

    	//dd($taikhoan->hocvien);
    	return view('page.taikhoan')->with(['taikhoan'=>$taikhoan,'hocvien'=>$hocvien]);
    }
    public function viewlist(){
    	$taikhoan=taikhoan::all();
    	return view('admin.taikhoan.taikhoan')->with('taikhoan',$taikhoan);
    }
    public function viewcreate(){

    	$taikhoan=taikhoan::all();
    	$hocvien=hocvien::all();
    	return view('admin.taikhoan.themtaikhoan')->with(['taikhoan'=>$taikhoan, 'hocvien'=>$hocvien]);
    }
    public function create($data){
    	 $file_name=0;
        
         
    		return taikhoan::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'confirmation_code'=>NULL,
            'confirmed' => 1,
            'quyen'=>$data['quyen'],
            'avatar'=>$file_name
        ]);	

    }
    public function postCreate(Request $request){
    	

    		$data = $request->all(); 
            $validator = $this->validator($data);
             if ($validator->fails()) {
                         // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
                     return redirect('ad/taikhoan/them')->withErrors($validator)->withInput();
                         }
                  else {   
                                // Dữ liệu vào hợp lệ sẽ thực hiện tạo người dùng dưới csdl

                  	//kiểm tra người dùng thuộc nhóm nào
           $check_hoc_vien=hocvien::where('MaHocVien','=',$request->nguoidung)->exists();
           $check_giang_vien=giangvien::where('MaGV','=',$request->nguoidung)->exists();
           $check_cbtt=cbtt::where('MaNV','=',$request->nguoidung)->exists();
           
                  		if(($request->quyen==4)&&($check_hoc_vien==true)){
                  
                  				if($this->create($data)){
                  		tkHocVien::create([
                  					'MaHocVien'=>$request->nguoidung,
                  			'username'=>$request->username,
                  				]);
                  				 Session::flash('success', 'Thêm mới thành công');
                  				 return redirect('ad/taikhoan');
                  							}
                  						}
                  	elseif(($request->quyen==3)&&($check_giang_vien==true)){
                  			if($this->create($data)){
                  	tkGiangVien::create([
                  		'MaGV'=>$request->nguoidung,
                  			
                  			'username'=>$request->username,
                  		]);
                  		Session::flash('success', 'Thêm mới thành công');
                  		                  		 return redirect('ad/taikhoan');
                  				}
                  			}
                  	
                  	elseif((($request->quyen==2)||($request->quyen==1))&&($check_cbtt==true)){
                      if($this->create($data)){
                  		tkcbtt::create([
                  			'MaNV'=>$request->nguoidung,
                  			
                  			'username'=>$request->username,
                  		]);
                  		Session::flash('success', 'Thêm mới thành công');
                  		                  		 return redirect('ad/taikhoan');
                  				}
                        }
                  	else {
                  			Session::flash('error', 'Người dùng khong tồn tại');
                  		        return redirect('ad/taikhoan/them');
                  	}

                  	}
                  }
        public function viewupdate($username){
        	$taikhoan=taikhoan::find($username);
        	if(($taikhoan->quyen==1)||($taikhoan->quyen==2)){
        		$nguoidung=DB::table('tkcbtt')->where('username',$username)->get();
        		
        	}
        	elseif ($taikhoan->quyen==4) {
        		$nguoidung=DB::table('tkhv')->where('username',$username)->get();
        	}
        	elseif ($taikhoan->quyen==3){
        		$nguoidung=tkGiangVien::where('username',$username)->get();
        	}

        	return view('admin.taikhoan.suataikhoan')->with(['taikhoan'=>$taikhoan,'nguoidung'=>$nguoidung]);
        }
        public function postUpdate(Request $request){
        	$role=$request->quyen;
        	DB::table('taikhoan')->where('username',$request->username)->update(['quyen'=>$role]);
        
        	Session::flash('success', 'Đã sửa thành công');
                  				 return redirect('ad/taikhoan');
        }
        public function delete($username){
        	taikhoan::destroy($username);
        	Session::flash('success', 'Xóa thành công');
                  				 return redirect('ad/taikhoan');
        }
}
