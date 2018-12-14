 

 
<div id="print">
 <p style="padding-top: 20px;padding-left: 150px;">
  Bộ Giáo Dục và Đào Tạo<br>
Trung Tâm Ngoại Ngữ NS<br>
<img src="{{asset('img/logo.png')}}" style="padding-left: 50px;padding-top: 10px"></p>


  <style type="text/css">
    table{
    border-collapse: collapse;
    border-spacing: 0;
    width: 80%;
    border: 1px solid #ddd;

}

td {
    
    padding: 8px;
    border: 1px solid #ddd;

}
th{
   text-align: center;
    padding: 8px;
    border: 1px solid #ddd;
}
tr:nth-child(even){background-color: #f2f2f2}
  </style>

 <center>

                               
  <h3 style="text-transform: uppercase;"> DANH SÁCH HỌC VIÊN LỚP: 
 
    @foreach($nhom as $n)

@if ($chitietphancong->MaNhom == $n->MaNhom )
@foreach($lopkhoa as $l)
@if($n->id == $l->id)

{{$l->lophoc->TenLop}}
@endif
@endforeach
@endif
@endforeach


 @foreach($nhom as $n)

@if ($chitietphancong->MaNhom == $n->MaNhom )

- {{$n->TenNhom}}

@endif
@endforeach
   
 </h3> 
 <h4>   
   @foreach($thoigian as $tg)
    @if($tg->id_ThoiGian == $chitietphancong->id_ThoiGian)
Thứ:{{$tg->Thu}} -
@endif
@endforeach
  @foreach($tiethoc as $th)
    @if($th->id_TietHoc == $chitietphancong->id_TietHoc)
Từ:{{$th->ThoiGianBD}} Đến {{$th->ThoiGianKT}} 
@endif
@endforeach 


<br>

 @foreach($nhom as $n)

@if ($chitietphancong->MaNhom == $n->MaNhom )
Phòng: {{$n->MaPhongHoc}}
@foreach($phonghoc as $ph)
                              @if($n->MaPhongHoc == $ph->MaPhongHoc )
                              /{{$ph->khuvuc->TenKhuVuc}}
                              @endif
                              @endforeach

@endif
@endforeach 
</h4>
  <table>

<tr>
  <th>
    STT
  </th>
  <th>
    Mã Học Viên
  </th>
  <th>
    Họ Tên Học Viên
  </th>
  <th>
    Giới Tính
  </th>
   <th>
   Ngày Sinh
  </th>
</tr>
<?php  $stt=0;?>
<tr>
  @foreach($thuoclophoc as $tl)

  @if($tl->MaNhom == $chitietphancong->MaNhom)
    <?php $stt++;  ?>
<td>
  {{$stt}}
 
 
 

</td>
<td>
{{$tl->MaHocVien}}
</td>
<td>
{{$tl->HoTenHocVien}}
</td>
<td>
{{$tl->GioiTinh}}
</td>
<td>
 {{ date('d-m-Y',strtotime($tl->NgaySinh))}}
</td>



  </tr>


@endif
 @endforeach
    
  </table >
  
  
</center>


</div>

<p style="float: right;padding-right:200px"><a href="" onclick="myFunction('print')"> <img src="{{asset('img/print.png')}}">In danh sách</a></p>


<script>
function myFunction(divName) {
  var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;

}
</script>
  
  



  
  
