 @extends('layout.master')

@section('content')

<main>
<br>
<br>
<div class="content">

<div class="left">
	

@foreach($lop as $lop)
  <div class="title-main"><h3>Chi tiết lớp học {{$lop->TenLop}}</h3></div>
   <div class="b">Tên lớp: {{$lop->TenLop}}</div>
<div class="b"> Khuyến mãi </div>

<?php $kg=DB::table('lopkhoa')->join('lophoc','lophoc.MaLop','=','lopkhoa.MaLop')->where('lophoc.MaLop',$lop->MaLop)->get();
      $km=DB::table('co')->join('khuyenmai','khuyenmai.MaKM','=','co.MaKM')->where('MaLop',$lop->MaLop)->get();
      $today=date('Y-m-d');
       ?>
       @foreach($km as $km)
          <?php $day1=date('Y-m-d', strtotime($km->ThoiGianBD));
                $day2=date('Y-m-d', strtotime($km->ThoiGianKT));
           ?>
              @if($today<$day2)
      <div class="p" style="color: red">  {{$km->TenKM}}: Từ {{date('d-m-Y', strtotime($km->ThoiGianBD))}} đến {{date('d-m-Y',strtotime($km->ThoiGianKT))}} </div>
              @endif
       @endforeach
      
  <div class="b">Số tuần học: {{$lop->SoTuanHoc}} tuần </div>
  <?php $t=DB::table('tiethoc')->where('id_TietHoc',$lop->id_TietHoc)->first();?>
    <div class="b">Thời gian học: {{$t->ThoiGianBD}} giờ - {{$t->ThoiGianKT}} giờ </div>


  <div class="b">Giới thiệu về lớp học</div>
<div class="p">{!!$lop->GioiThieu!!}</div>
  
@if(!Empty($kg))
@foreach($kg as $h)
   <div class="column1">
    <div class="card1">
   <div class="container">
     @foreach($co as $c)
        @if($c->MaLop == $h->MaLop)
       <div class="ribbon-wrapper"><div class="ribbon sale">KM</div></div>
       @endif
       @endforeach
 <img src="upload/lophoc/{{$h->Hinh}}" alt="Avatar" class="image">
 <?php $bla=date('Y-m-d', strtotime('-2 weeks', strtotime($h->NgayKhaiGiang)));
            
      ?>
     
  <div class="overlay">
  	@if($today<$bla)
    <a href="dangkilophoc/{{$h->id}}" class="icon" title="Đăng kí ngay">
     <button class="btn">Đăng ký</button>
 		</a>
     @endif
    </a>
  </div>
</div>
<div class="container1">
   <p><b>Từ:</b>
        {{date('d-m-Y',strtotime($h->NgayKhaiGiang))}}
        <br>
    <b>Đến:</b>
    	{{date('d-m-Y',strtotime($h->NgayKetThuc))}}
</p>
 <div class="b"> <p style="color: #cc0000; font-size: 15px">Học phí: {{number_format($h->HocPhi,0,'.','.')}} VNĐ</p></div>
<a href="{{route('chitietlichkhaigiang',$h->id)}}"  >{{$h->TieuDe}}</a>
      <div class="b">Thứ: 

 <?php
       if(!empty($h->NgayChan))
       $thu=json_decode($h->NgayChan,true); 
        $dayofweek=DB::table('thoigian')->get();
        ?>
         @if(!empty($thu))
              @foreach($dayofweek as $t)
                @if(in_array($t->id_ThoiGian,$thu))

           {{$t->Thu}}
               @endif 
               @endforeach
            @endif  
            </div>  
      </div>
  </div>
</div>
 @endforeach
@endif
</div>

@endforeach

  @include('layout.right')

	</div>
@endsection