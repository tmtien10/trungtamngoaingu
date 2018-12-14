 @extends('layout.master')

@section('content')

<main>
<br>
<br>


<div class="content">

<div class="left">

  <div class="title-main"><h3>CÁC LỚP ĐĂNG KÝ</h3></div>
  <div style="overflow-x:auto;">
 @if (session('success'))
                      <p style="background-color:green; color: white;padding: 10px;">{{session('success')}}</p>
                          @endif
  @if (session('error'))
                      <p style="background-color:red; color: white;padding: 10px;">{{session('error')}}</p>
                          @endif
   

  <table>

    <tr>
      <th>Id phiếu</th>
      <th>Mã khóa</th>
      <th>Lớp học</th>
      <th>Ngày khai giảng</th>
      <th>Ngày kết thúc</th>
     <th>Tình trạng</th>
     <th></th>
    </tr> 

  
      @foreach($tkhocvien as $tk)
 @if(Auth::user()->username == $tk->username)
    <tr>
      
<td>
  @foreach( $phieudkhoc as $p ) 
  @if($tk->id_PhieuDKHoc == $p->id_PhieuDKHoc)
 <a href="hocvien/lopdk/{{$p->id_PhieuDKHoc}}"> {{$p->id_PhieuDKHoc}}</a>

  @endif
 @endforeach

</td>

 <td> 

   @foreach( $phieudkhoc as $p ) 
   @if($tk->id_PhieuDKHoc == $p->id_PhieuDKHoc)
@foreach($lopkhoa as $lk)
@if($p->id == $lk->id)
{{$lk->khoahoc->TenKhoaHoc}}

@endif
@endforeach
 @endif
 @endforeach
 </td>
  <td>   @foreach( $phieudkhoc as $p ) 
   @if($tk->id_PhieuDKHoc == $p->id_PhieuDKHoc)
@foreach($lopkhoa as $lk)
@if($p->id == $lk->id)
<a href="chitietlophoc/{{$lk->lophoc->MaLop}}">{{$lk->lophoc->TenLop}}</a>

@endif
@endforeach
 @endif
 @endforeach</td>
  <td> @foreach( $phieudkhoc as $p ) 
   @if($tk->id_PhieuDKHoc == $p->id_PhieuDKHoc)
@foreach($lopkhoa as $lk)
@if($p->id == $lk->id)
{{date('d-m-Y',strtotime($lk->NgayKhaiGiang))}}

@endif
@endforeach
 @endif
 @endforeach </td>
  <td> @foreach( $phieudkhoc as $p ) 
   @if($tk->id_PhieuDKHoc == $p->id_PhieuDKHoc)
@foreach($lopkhoa as $lk)
@if($p->id == $lk->id)
{{date('d-m-Y',strtotime($lk->NgayKetThuc))}}

@endif
@endforeach
 @endif
 @endforeach</td>

  <td> @foreach( $phieudkhoc as $p ) 
   @if($tk->id_PhieuDKHoc == $p->id_PhieuDKHoc)
@foreach($lopkhoa as $lk)
@if($p->id == $lk->id)
 @if($lk->NgayKhaiGiang < date('Y-m-d H:i:s'))
        @if ( date('Y-m-d H:i:s') < $lk->NgayKetThuc)
       <p> Đang học</p>

@endif
@endif
 @if($lk->NgayKetThuc < date('Y-m-d H:i:s'))
        
       <p> Đã kết thúc</p>

@endif
 @if($lk->NgayKhaiGiang > date('Y-m-d H:i:s'))
        
       <p> Sẽ diễn ra</p>

@endif

@endif
@endforeach
 @endif
 @endforeach</td>
<td> 
  @foreach( $phieudkhoc as $p ) 
  @if($tk->id_PhieuDKHoc == $p->id_PhieuDKHoc)

 <a href="hocvien/lopdk/del/{{$p->id_PhieuDKHoc}}">Hủy đăng ký 
 </a>

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
