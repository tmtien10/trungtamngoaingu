 @extends('layout.master')

@section('content')

<main>
<br>
<br>
<div class="content">

<div class="left">
 
  <div class="title-main"><h3>Chi tiết lịch khai giảng {{$lopkhoa->TieuDe}}</h3></div>
 
  
  <div class="b"> <p style="color: #cc0000; font-size: 15px">Học phí: {{number_format($lopkhoa->HocPhi,0,'.','.')}} VNĐ</p></div>
  @foreach($khuyenmai as $km)
        @foreach($co as $c)
        @if($c->MaKM== $km->MaKM)
        @if($c->MaLop== $lopkhoa->MaLop)

        @if($km->ThoiGianBD <= date('Y-m-d H:i:s'))
        @if ( date('Y-m-d H:i:s') <= $km->ThoiGianKT)

       
     

    


       <div class="b">Giảm: {{number_format($km->MucGiam,0,'.','.')}} VNĐ </div>
   @endif
   @endif
   @endif
          @endif
          @endforeach
       @endforeach
  <div class="b">Ngày khai giảng: {{date('d-m-Y',strtotime($lopkhoa->NgayKhaiGiang))}}</div>

 <div class="b">Ngày kết thúc: {{date('d-m-Y',strtotime($lopkhoa->NgayKetThuc))}}</div>

<div class="b">Thông tin lớp học</div>
<div class="p">{!!$lopkhoa->lophoc->GioiThieu!!}</div>
  
</div>



  @include('layout.right')

	</div>
@endsection