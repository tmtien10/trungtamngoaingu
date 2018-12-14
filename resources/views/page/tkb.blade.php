 @extends('layout.master')

@section('content')

<main>
<div class="content">

<div class="left">

  <div class="title-main"><h2>THỜI KHÓA BIỂU</h2></div>

  
  <div style="overflow-x:auto;">

 
    @foreach($lopkhoa as $lk)
   <p class="title"><b style="text-transform: uppercase;">{{$lk->lophoc->TenLop}}</b> </p>

<table>
</tr>
      <th>STT</th>
      <th>Tên nhóm</th>
      <th>Phòng Học</th>
      <th>Xem TKB</th>
     
    </tr>
   
   
    
    @foreach($nhom as $key=> $n)
    @if ($n->id == $lk->id)
    <tr> 
     
      <td>  {{$key+1}}</td>
    
      <td>{{$n->TenNhom}}</td>
      <td>{{$n->MaPhongHoc}}
       @foreach($phonghoc as $ph)
                              @if($n->MaPhongHoc == $ph->MaPhongHoc )
                             / {{$ph->khuvuc->TenKhuVuc}}
                              @endif
                              @endforeach</td>
      <td><a href="{{route('intkb',$n->MaNhom)}}" style="color: blue">Xem TKB</a></td>

    </tr>
    
    @endif
     @endforeach
   
  </table>
@endforeach
</div>


@include('layout.right')
</div>
@endsection

