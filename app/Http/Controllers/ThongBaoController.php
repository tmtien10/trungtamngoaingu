<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\thongbao;
use App\cbtt;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;
use Session;



class ThongBaoController extends Controller
{
    //
    protected function validator(array $data)
    {
        return Validator::make($data, [
            
            'name'=>'required|regex:/(^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]+$)+/',
            'noidung'=>'required'
               ],[
                'required'=>'Đây là trường bắt buộc',
                'regex'=>'Chứa các kí tự không cho phép'
            ]);
    }
    protected function create($data){
    	return thongbao::create([
    		'TenTB'=>$data['name'],
    		'NoiDungTB'=>$data['noidung'],
    		'file'=>$data['file'],
    		'MaNV'=>$data['nv'],
    		'LoaiTB'=>$data['loai']

    	]);
    }
    protected function update($data,$id){
    	return DB::table('thongbao')->where('MaTB',$id)->update([
    		'TenTB'=>$data['name'],
    		'NoiDungTB'=>$data['noidung'],
    		'file'=>$data['file'],
    		'MaNV'=>$data['nv'],
    		'LoaiTB'=>$data['loai']

    	]);
    }
    public function viewList(){
    	$tb=thongbao::all();
    	return view('admin.thongbao.thongbao')->with('tb',$tb);
    }
    public function viewCreate(){

    	return view('admin.thongbao.themthongbao');

    }
    public function viewUpdate($id){

    	$tb=thongbao::where('MaTB',$id)->get();
    	return view('admin.thongbao.suathongbao')->with('tb',$tb);

    }
    public function postCreate(Request $request){

    	$data = $request->all();

            $validator = $this->validator($data);
             if ($validator->fails()) {
                         // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
                     return redirect('ad/thongbao/them')->withErrors($validator)->withInput();
                         }
                  else { 
                  	$file_name=0;
                  	if(isset($data['file']))
        			{
          						$files =$data['file'];
            					$file_name = time().'_'.$files->getClientOriginalName();
            					// Lưu file vào thư mục  với tên là biến $filename
           						 $files->move('file', $file_name);
            

         				}
         			$user=Auth::user()->username;
      				$nv=DB::table('tkcbtt')->where('username',$user)->first();
         			$data_insert=[
         					'name'=>$request->name,
         					'noidung'=>$request->noidung,
         					'file'=>$file_name,
         					'nv'=>$nv->MaNV,
         					'loai'=>$request->loai


         			];
         			$this->create($data_insert);
         			Session::flash('success', 'Thêm mới thành công');
                      return redirect('ad/thongbao');

                  }
    }
    public function postUpdate(Request $request){

    			$data = $request->all();

            $validator = $this->validator($data);
             if ($validator->fails()) {
                         // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
                     return redirect('ad/thongbao/'.$request->id)->withErrors($validator)->withInput();
                         }
                  else { 
                  	$file_name=$request->old_file;
                  	if(isset($data['file']))
        			{
          						$files =$data['file'];
            					$file_name = time().'_'.$files->getClientOriginalName();
            					// Lưu file vào thư mục  với tên là biến $filename
           						 $files->move('file', $file_name);
            

         				}
         			$user=Auth::user()->username;
      				$nv=DB::table('tkcbtt')->where('username',$user)->first();
         			$data_update=[

         					'name'=>$request->name,
         					'noidung'=>$request->noidung,
         					'file'=>$file_name,
         					'nv'=>$nv->MaNV,
         					'loai'=>$request->loai



         			];
                  	$this->update($data_update,$request->id);
                  	Session::flash('success', 'Sửa thành công');
                      return redirect('ad/thongbao');
                  }

    }
    public function delete($id){
    	thongbao::destroy($id);
    	Session::flash('success', 'Xóa thành công');
                      return redirect('ad/thongbao');
    }
}
