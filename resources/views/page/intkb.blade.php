 

 
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
  @foreach($lopkhoa as $lk)
                                @if($lk->id == $nhom->id)
  <h3 style="text-transform: uppercase;">Thời khóa biểu lớp: {{$lk->lophoc->TenLop}}  </h3>
 
        <h3 style="text-transform: uppercase;"> Khóa:   {{$lk->khoahoc->TenKhoaHoc}} </h3>
  <b>     </b>
       @endif
                                @endforeach
       
    
   
       
  <table>

    <tr>
      <th colspan="4">Nhóm: {{$nhom->TenNhom}} 
        

       </th>
      
     
    </tr>
   
    <tr>
      <td rowspan="2"> Phòng : {{$nhom->MaPhongHoc}}  
        @foreach($phonghoc as $ph)
                              @if($nhom->MaPhongHoc == $ph->MaPhongHoc )
                             / {{$ph->khuvuc->TenKhuVuc}}
                              @endif
                              @endforeach</td>
        
          @foreach($chitietphancong as $ct)
          @if($nhom->MaNhom == $ct->MaNhom)
       
      <td>
       @foreach($thoigian as $tg)
      
        @if($ct->id_ThoiGian == $tg->id_ThoiGian)
       Thứ: {{$tg->Thu}} 
       @foreach($tiethoc as $th)
       @if ($ct->id_TietHoc == $th->id_TietHoc)

        (Từ:{{$th->ThoiGianBD}} Đến {{$th->ThoiGianKT}} )
        @endif
        @endforeach


       @endif
       
       @endforeach
    </td>
   
    
 
 

       
        @endif
     @endforeach
    </tr>
     
    <tr>
     @foreach($chitietphancong as $ct)
      @if($nhom->MaNhom == $ct->MaNhom)
    	<td>

 Giảng Viên: {{$ct->HoTenGV}}
        <br>
        @foreach($monhoc as $mh)
        @if ($ct->MaMonHoc == $mh->MaMonHoc)
       Môn Học: {{$mh->TenMonHoc}}
        @endif
         @endforeach
        
     </td>
    
     
 @endif
      @endforeach
     
 </tr>

    
  </table >
  
  
</center>


</div>
<p style="float: right;padding-right:200px"><a href="" onclick="myFunction('print')"> <img src="{{asset('img/print.png')}}">In thời khóa biểu</a></p>


<script>
function myFunction(divName) {
  var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;

}
</script>
  
  
