 @extends('layout.master')

@section('content')

<main>
<br>
<br>

<div class="content">

<div class="left">

  <div class="title-main"><h3>CÁC LỚP DẠY</h3></div>
  <div style="overflow-x:auto;">

   

  <table>

    <tr>
      <th>Mã khóa</th>
      <th>Lớp dạy</th>
       <th>Môn dạy</th>
      <th>Thời gian</th>
      <th>Phòng</th>
       <th>Danh sách</th>
     <th>Tình trạng</th>
    </tr> 


        @foreach($chitietphancong as $tk)
 @if(Auth::user()->username == $tk->UserName)
    <tr>
      

 <td> 
 @foreach($nhom as $n)

@if ($tk->MaNhom == $n->MaNhom )
@foreach($lopkhoa as $l)
@if($n->id == $l->id)

{{$l->khoahoc->TenKhoaHoc}}
@endif
@endforeach
@endif
@endforeach

 </td>
 <td> 
 @foreach($nhom as $n)

@if ($tk->MaNhom == $n->MaNhom )
@foreach($lopkhoa as $l)
@if($n->id == $l->id)

{{$l->lophoc->TenLop}}
@endif
@endforeach
@endif
@endforeach


 @foreach($nhom as $n)

@if ($tk->MaNhom == $n->MaNhom )

- {{$n->TenNhom}}

@endif
@endforeach <br>
(  Khai giảng:@foreach($nhom as $n)

@if ($tk->MaNhom == $n->MaNhom )
@foreach($lopkhoa as $l)
@if($n->id == $l->id)

 {{date('d-m-Y',strtotime($l->NgayKhaiGiang))}}
@endif
@endforeach
@endif
@endforeach)

 </td>
  <td>@foreach($monhoc as $m)

@if ($m->MaMonHoc == $tk->MaMonHoc )

{{$m->TenMonHoc}}

@endif
@endforeach
 </td>
  <td> 
    @foreach($thoigian as $tg)
    @if($tg->id_ThoiGian == $tk->id_ThoiGian)
Thứ:{{$tg->Thu}} -
@endif
@endforeach
  @foreach($tiethoc as $th)
    @if($th->id_TietHoc == $tk->id_TietHoc)
Từ:{{$th->ThoiGianBD}} Đến {{$th->ThoiGianKT}} 
@endif
@endforeach

 </td>
  <td>
    @foreach($nhom as $n)

@if ($tk->MaNhom == $n->MaNhom )
{{$n->MaPhongHoc}}
@foreach($phonghoc as $ph)
                              @if($n->MaPhongHoc == $ph->MaPhongHoc )
                              /{{$ph->khuvuc->TenKhuVuc}}
                              @endif
                              @endforeach

@endif
@endforeach
 </td>



  <td>
   <a href="giangvien/danhsachhocvien/{{$tk->MaNhom}}"> Xem danh sách</a> 

</td>


 <td>
  @foreach($nhom as $n)

@if ($tk->MaNhom == $n->MaNhom )
@foreach($lopkhoa as $l)
@if($n->id == $l->id)

 @if($l->NgayKhaiGiang < date('Y-m-d H:i:s'))
        @if ( date('Y-m-d H:i:s') < $l->NgayKetThuc)
       <p> Đang dạy</p>
       @endif
       @endif
@if($l->NgayKetThuc < date('Y-m-d H:i:s'))
        
       <p> Đã kết thúc</p>

@endif
 @if($l->NgayKhaiGiang > date('Y-m-d H:i:s'))
        
       <p> Sẽ diễn ra</p>

@endif

@endif

@endforeach
@endif
@endforeach
 </td>
    
    </tr>

      @endif
    @endforeach



  </table>

 

</div>

</div>



  @include('layout.right')

	</div>
@endsection