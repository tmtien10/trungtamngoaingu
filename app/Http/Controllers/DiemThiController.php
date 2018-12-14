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
use Excel;
use File;

class DiemThiController extends Controller
{
    //
		public function nhapDiem(Request $request){
				$data=$request->all();

				if($request->has('file')){
					$extension = File::extension($request->file->getClientOriginalName());
					if ($extension == "xlsx" || $extension == "xls" || $extension == "csv"){

						$path = $request->file->getRealPath();
                		$data = Excel::load($path, function($reader) {
               					 })->get();
                		if((!$data->isEmpty()) && ($data->count())){
 
                   			 foreach ($data as $key => $value) {
                   			 	$ma=substr($value->hoc_vien, 0,5);
                   			 	$check=[
						
										'nghe'=>$value->nghe,
										'noi'=>$value->noi,
										'doc'=>$value->doc,
										'viet'=>$value->viet,
										];
								$diem=json_encode($check);
						DB::table('diemthichungchis')->where('MaKiThi',$request->kithi)->where('MaHocVien',$ma)->update(['DiemThi'=>$diem]);
                   		
                    }

					}
				}
					else {
						Session::flash('error','Vui lòng chọn file xlsx,xls,csv');
                      return redirect('ad/kithi/danhsach/'.$request->kithi);
					}


				
			}
			else {

				$n=count($data['maso']);
				$kithi=$request->kithi;
				$maso=$request->maso;
				$nghe=$request->nghe;
				$noi=$request->noi;
				$doc=$request->doc;
				$viet=$request->viet;
				
				for($i=0;$i<$n;$i++){
					if(!isset($nghe[$i])){
						$nghe[$i]=0;
					}
					if(!isset($noi[$i])){
						$noi[$i]=0;
					}
					if(!isset($doc[$i])){
						$doc[$i]=0;
					}
					if(!isset($viet[$i])){
						$viet[$i]=0;
					}
					$check=[
						
						'nghe'=>$nghe[$i],
						'noi'=>$noi[$i],
						'doc'=>$doc[$i],
						'viet'=>$viet[$i],
					];
					$diem=json_encode($check);
					DB::table('diemthichungchis')->where('MaKiThi',$kithi)->where('MaHocVien',$maso[$i])->update(['DiemThi'=>$diem]);
				
		}
				}
		Session::flash('success', 'Cập nhật thành công');
                      return redirect('ad/kithi/danhsach/'.$request->kithi);
			}
	public function del($id,$hv){

		DB::table('diemthichungchis')->where('MaHocVien',$hv)->where('MaKiThi',$id)->delete();
		Session::flash('success', 'Xóa thành công');
                      return redirect('ad/kithi/danhsach/'.$id);
	}

	public function downloadList($id){
		$data=diemthichungchi::where('MaKiThi',$id)->all();
		$fileName = 'danhsach'.time();
				return Excel::create($fileName, function($excel) use ($data) {
					$result=$this->result($data);
			$excel->sheet('mySheet', function($sheet) use ($result)

	        {	$sheet->mergeCells('A1:I1');
 
            	$sheet->cell('C1', function ($cell) {
                $cell->setValue('DANH  SÁCH THÍ SINH');
 
                $cell->setFontWeight('bold');
            });

				$sheet->fromArray($result, null, 'A3', false, true);

	        });

		})->download('csv');

	}
	protected function result($ds){

		$result=[];

		foreach ($ds as $key => $value) {
			# code...
			$diem=json_decode($value->DiemThi,true);
			$result[]=[
				'STT'=>$key+1,
				'Học Viên'=>$value->MaHocVien,
				'Phòng thi'=>$value->PhongThi,
				'Nghe'=>$diem['nghe'],
				'Nói'=>$diem['noi'],
				'Đọc'=>$diem['doc'],
				'Viết'=>$diem['viet']
			];
			}
			return $result;
		}
	public function transcript($id,$hv){

		$trscript=diemthichungchi::where('MaKiThi',$id)->where('MaHocVien',$hv)->get();
		return view('admin.kithi.bangdiem')->with('trscript',$trscript);
	}

	public function tkb(){
		$cc=chungchi::all();
		return view('admin.test')->with('cc',$cc);
	}
	}
