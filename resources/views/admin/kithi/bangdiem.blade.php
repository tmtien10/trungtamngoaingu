
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Phiếu điểm</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
         .container div {
         margin: 10px;
         padding :10px;
         }
        
      </style>
   </head>
   <body> 
   	<div class="container">

   		Bảng điểm

		<div class="d-flex justify-content-center" id="print">

			<div class="d-flex flex-column">
				<div class="p-1"></div>
				<div class="p-1">
		<table class="table-borderless" style="text-align: left; width: 600px; border-spacing: 5px">
			<thead>
			<tr class="p-3 mb-2 bg-success text-white" ><th colspan="2" style="text-align: center" >THÔNG TIN THÍ SINH</th></tr>

		</thead>
		<tbody>
		@foreach($trscript as $trscript)

		<?php
			$hs=DB::table('hocvien')->where('MaHocVien',$trscript->MaHocVien)->get();
			$diem=json_decode($trscript->DiemThi,true);
		?>
			@foreach($hs as $hs)

	<tr><td>ID HỌC VIÊN :		</td><td>{{$hs->MaHocVien}} </td> </tr>
	<tr><td>HỌ TÊN HỌC VIÊN:	</td><td>	{{$hs->HoTenHocVien}}</td> </tr>
	<tr><td>NGÀY SINH :		</td><td>{{$hs->NgaySinh}}</td></tr>
	<tr><td>ĐỊA CHỈ  :		</td><td>{{$hs->DiaChi}}</td></tr>
	<tr><td>EMAIL  :		</td><td>{{$hs->Email}}</td></tr>
	<tr><td>SỐ ĐIỆN THOẠI :	</td><td>	{{$hs->SDT}}</td></tr>

			@endforeach
		</tbody>
	</table>
</div>
	<div class="p-1">
	<table class="table table-bordered table-sm">
		<thead>
		<tr><th>Reading</th>
		<th>Speaking</th>
		<th>Writting</th>
		<th>Listening</th>
		</tr>
	</thead>
	<tbody>
		<tr><td>{{$diem['doc']}}</td>
		<td>{{$diem['noi']}}</td>
		<td>{{$diem['viet']}}</td>
		<td>{{$diem['nghe']}}</td></tr>
	</tbody>
	</table>
			</div>
	<div class="p-1">
		<div class="float-left">Ngày in: {{date('d-m-Y')}}
			</div>
			<div class="float-right"><i>Trung tâm ngoại ngữ</i><br></div>
			
	</div>
</div>
</div>
	@endforeach
	<button onclick="myFunction('print')"  class="btn btn-info btn-lg"><i class="fa fa-print"></i>  In</button>

<script>
function myFunction(divName) {
  var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;

}
</script>
</div>
</body>
</html>