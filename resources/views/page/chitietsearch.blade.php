 @extends('layout.master')

@section('content')

<main>
<br>
<br>
<div class="content">

<div class="left">

  <div class="title-main"><h3>Chi tiết lớp {{$lophoc->TenLop}}</h3></div>
 
 
  <div class="b"> <p style="color: #cc0000; font-size: 15px">Học phí: {{number_format($lophoc->HocPhi,0,'.','.')}} VNĐ</p></div>
 @foreach($co as $c)
        @if($c->MaLop == $lophoc->MaLop ) 
        @if($c->ThoiGianBD <= date('Y-m-d H:i:s'))
        @if ( date('Y-m-d H:i:s') <= $c->ThoiGianKT)
       <div class="b">Giảm: {{number_format($c->MucGiam,0,'.','.')}} VNĐ </div>
      @endif
   @endif
          @endif
       @endforeach
  <div class="b">Ngày khai giảng: {{date('d-m-Y',strtotime($lophoc->NgayKhaiGiang))}}</div>

 <div class="b">Ngày kết thúc: {{date('d-m-Y',strtotime($lophoc->NgayKetThuc))}}</div>

<div class="b">Thông tin lớp học</div>
<div class="p">{!!$lophoc->GioiThieu!!}</div>
  
</div>



  @include('layout.right')

	</div>
@endsection