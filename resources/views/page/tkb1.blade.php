 @extends('layout.master')

@section('content')

<main>
  <br>
<br>
<div class="content">

<div class="left">

  <div class="title-main"><h2>THỜI KHÓA BIỂU</h2></div>
<center>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
<form name="frmDSILP" method="post" autocomplete="off" action="timkiem">
  {{csrf_field()}}
  
<div class="form-group">
                   

                    <div class="col-sm-9">
                       <label ><b> Khóa học </b>  </label>
                        <select class="form-control1" name="KhoaHoc" id="khoa">  
                           @foreach($khoahoc as $kh)
                            <option value="{{$kh->MaKhoa}}"<?php if(isset($khoa)){if($khoa==$kh->MaKhoa) echo "selected";}?>>{{$kh->TenKhoaHoc}}</option>
                          @endforeach
                          </select> 
                
                      </div>  
                      
            </div>
            <div class="form-group">

                    <div class="col-sm-9">
                      <label ><b> Tên Lớp  </b> </label>
                        <select class="form-control1" name="LopHoc" id="lop1">  
                           
                           @foreach($lophoc as $lh)
                            <option value="{{$lh->MaLop}}" <?php if(isset($lop1)){if($lop1==$lh->MaLop) echo "selected";}?>>{{$lh->TenLop}}</option>
                            @endforeach   
                          
                          </select> 
                  
                
                      </div>  
            </div>
            <div class="form-group">
                   

                    <div class="col-sm-9">
                       <label ><b> Ngày khai giảng  </b></label>
                        <select class="form-control1" name="ngkhaigiang" id="ngkhaigiang" value=""> 
                          </select> 
                 <button type="submit" class="btn btn-primary" name="login-button">Liệt kê</button>
                      </div>  

            </div>
  <table id="tbMain1" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0" width="97%">
 
    <tbody>
     
      <tr>
      <td  nowrap="true" align="middle" height="22" class="main_3">
       <b>STT</b>
      </td>
      <td nowrap="true" align="middle" class="main_3">
       <b> Mã lớp</b>
      </td>
      <td  nowrap="true" align="middle" class="main_3">
       <b> Phòng học</b>
      </td>
      <td  nowrap="true" align="middle" class="main_3">
      <b> Khu vực</b>
      </td>
      <td  nowrap="true" align="middle" class="main_3">
       
      </td>
      <?php  $stt=0;?>
    </tr>
    @if(isset($lopkhoa))
      @foreach($lopkhoa as $lk)
         <?php $stt++;  ?>
    <tr>
      <td>
     {{$stt}}
      </td>
       <td>
          {{$lk->MaNhom}}( {{$lk->TenNhom}})
      </td>

       <td>
         {{$lk->MaPhongHoc}}
      </td>
       <td>
 @foreach($phonghoc as $ph)
                              @if($lk->MaPhongHoc == $ph->MaPhongHoc )
                             {{$ph->khuvuc->TenKhuVuc}}
                              @endif
                              @endforeach
      </td>
       <td>
<a href="{{route('intkb',$lk->MaNhom)}}" style="color: blue">Xem TKB</a>
      </td>
    </tr>
@endforeach
@endif
</tbody>

</table>
  
</form>
</center>
 <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
      


    <!-- page specific plugin scripts -->
   
    <script>
$(document).ready(function(){
 
 
 $(document).on('change', '#lop1', function(e){
      e.preventDefault();
      $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
      });
               
      $.ajax({
          'url' : 'ngaykhaigiang',
          'data': {
            'lop' : $("#lop1").val(),
  
          },
          'type' : 'POST',
          success: function (data) {
            console.log(data);
             $("#ngkhaigiang").empty();
                $.each(data, function(key, value){
                  
                    $("#ngkhaigiang").append(
                        "<option value=" + value.NgayKhaiGiang + ">" + value.NgayKhaiGiang + "</option>"
                    );
                });
              
           
            } 
          
        });
    });

 });

</script>

</div>


@include('layout.right')
</div>
@endsection

