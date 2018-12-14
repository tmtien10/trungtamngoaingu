 @extends('layout.master')

@section('content')

<br>
<br>
<main>
<br>
<br>


<div class="content">
  <div class="left">

  <div class="title-main"><h3>LỊCH SỬ ĐĂNG KÍ THI</h3></div>
  <div style="overflow-x:auto;">
 @if (session('success'))
                      <p style="background-color:green; color: white;padding: 10px;">{{session('success')}}</p>
                          @endif
  @if (session('error'))
                      <p style="background-color:red; color: white;padding: 10px;">{{session('error')}}</p>
                          @endif

                <table>
               <tr ><th>ID Phiếu</th>
                  <th>Kì thi</th>
                  <th>Ngày thi</th>
                  <th>Ngày đăng kí</th>
                  <th>Tình trạng</th>
                  <th></th></tr>
                   @if(isset($phieudkthi))
                  @foreach($phieudkthi as $dk)
                  <tr >
                      <td style="text-align: center;"><a href="hocvien/dangkithi/{{$dk->idphieudk}}">{{$dk->idphieudk}}</a></td>
                      <td style="text-align: center;"><a href="kithi/{{$dk->MaKiThi}}">{{$dk->TenKiThi}}</a></td>
                      <td style="text-align: center;">{{date('d-m-Y',strtotime($dk->NgayThi))}}</td>
                      <td style="text-align: center;">{{date('d-m-Y',strtotime($dk->created_at))}}</td>
                      @if($dk->TinhTrang==1)
                      <td style="text-align: center;">Đã duyệt</td>
                      @else
                      <td style="text-align: center;">Chưa duyệt</td>
                      @endif
                      <td style="text-align: center;"><a href="hocvien/dangkithi/del/{{$dk->idphieudk}}">Hủy đăng ký</a></td>


                  </tr>

                  @endforeach
                     @endif
                </table>



 </div>
</div>
 @include('layout.right')
</div>
@endsection