 @extends('layout.master')

@section('content')

<main>
<br>
<br>
<div class="content">

<div class="left">
  <div class="title-main"><h2>LỊCH KHAI GIẢNG</h2></div>

    
    
   
  
   @foreach($lopkhoa as $hp)
   <div class="column1">
    <div class="card1">
   <div class="container">
     @foreach($co as $c)
        @if($c->MaLop == $hp->MaLop)
       <div class="ribbon-wrapper"><div class="ribbon sale">KM</div></div>
       @endif
       @endforeach
 <a href="{{route('chitietlichkhaigiang',$hp->id)}}">  <img src="upload/lophoc/{{$hp->Hinh}}" alt="Avatar" class="image"></a>
  
</div>
<div class="container1">
   <p>Ngày khai giảng:
        {{date('d-m-Y',strtotime($hp->NgayKhaiGiang))}}</p>
<a href="{{route('chitietlichkhaigiang',$hp->id)}}"  >{{$hp->TieuDe}}</a>
     
      </div>
  </div>
</div>
 @endforeach
  
</div>
  




  @include('layout.right')

  </div>
@endsection





