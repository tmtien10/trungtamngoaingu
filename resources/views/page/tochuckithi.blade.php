 @extends('layout.master')

@section('content')

<main>
<br>
<br>

<div class="content">

<div class="left">

    <div class="title-main"><h2>LỊCH THI CHỨNG CHỈ</h2></div>
  <div style="overflow-x:auto;">
<i>Thí sinh cần đăng kí trước ngày thi 2 tuần</i><br><br>
  <form method="post" action="{{asset('filter')}}">
      {{ csrf_field() }}
    <select name="loai">
      <option value="">Chọn</option>
        @foreach($chungchi as $chungchi)
      <option value="{{$chungchi->MaCC}}"<?php if(isset($loai)){if($loai==$chungchi->MaCC) echo "selected";} ?>>{{$chungchi->tenCC}}</option>
        @endforeach
    </select>
    <input type="month" name="time" value="<?php if(isset($time)) echo $time; ?>">
    <button>Tìm kiếm</button>
  </form>
  <br><br>

  @if (session('error'))
                      <p style="background-color:red; color: white;padding: 10px;">{{session('error')}}</p>
                          @endif</div>
  <form method="post" action="dangkithi">
    {{ csrf_field() }}
      <table>
      <th>Tên kì thi</th>
      <th>Ngày Thi</th>
      <th>Thời Gian Thi </th>
      <th>Lệ phí</th>
      <th>Chứng chỉ</th>
      <th></th>
     
    @foreach ($kithi as $kithi)
    <tr>
      <td><a href="#">{{$kithi->TenKiThi}}</a></td>
      <td>{{date('d-m-Y',strtotime($kithi->NgayThi))}}</td>
      <td>{{$kithi->GioBatDau}}-{{$kithi->GioKetThuc}}</td>
      <td>{{number_format($kithi->LePhi,0,'.','.')}}</td>
      <td>{{$kithi->tenCC}}</td>
      <?php $bla=date('Y-m-d', strtotime('-2 weeks', strtotime($kithi->NgayThi)));
            $today=date('Y-m-d');
      ?>
      @if($today<$bla)
      <td><button name="dk" value="{{$kithi->MaKiThi}}" type="submit">Đăng kí</button></td>
      @else
      <td><button name="dk" value="{{$kithi->MaKiThi}}" type="submit" disabled="">Đăng kí</button></td>
      @endif
    </tr>
   
    @endforeach
  </table>
</form>
  
</div>




  @include('layout.right')
  </div>
	
@endsection