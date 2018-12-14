 @extends('layout.master')

@section('content')

<main>
<br>
<br>
<div class="content">

<div class="left">
 
 <div class="title-main"><h3>THÔNG BÁO {{$thongbao->TenTB}}</h3></div>
 
 
  <div class="p">{!!$thongbao->NoiDungTB!!}</div>
  <div class="b"><a href="file/{{$thongbao->file}}">{{$thongbao->file}}</a></div>
</div>



  @include('layout.right')

	</div>
@endsection