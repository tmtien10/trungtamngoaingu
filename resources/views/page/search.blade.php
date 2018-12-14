 @extends('layout.master')

@section('content')

<main>
<div class="content">

<div class="left">

  <h2>KẾT QUẢ TÌM KIẾM</h2>
  <h4> Tìm thấy {{count($lophoc)}} lớp</h4>
   @foreach($lophoc as $lh)
  <div class="column4">
    <div class="card">
    <div class="container">
     
  <img src="upload/lophoc/{{$lh->Hinh}}" alt="Avatar" class="image">
  <div class="overlay">
    <a href="{{route('chitietlophoc',$lh->MaLop)}}" class="icon" title="User Profile">
     <button class="btn">Xem Chi Tiết</button>
    </a>
  </div>
</div>
      <div class="container1">
       <p class="title"><b style="text-transform: uppercase;">{{$lh->TenLop}}</b></p>
        
      
      </div>
    </div>
  </div>
 @endforeach

</div>

</div>
@include('layout.right')
</div>
@endsection

