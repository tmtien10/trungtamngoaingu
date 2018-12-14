  @extends('layout.master')

@section('content')

<main>
<br>
<br>
<div class="content">

<div class="left">
   <div class="title-main"><h3>PHIẾU ĐĂNG KÍ #{{$phieu->idphieudk}}</h3></div>
   
  <table>

   
    <tr>
      <td>
    <center>
   <form action="nguoidung" method="POST">
     {{ csrf_field() }}

                <div>
                  <label style="float: left; margin-left: 250px; width: 100px; text-align: left"><b>Ngày đăng kí </b></label>
                  <div style="float: left; margin-left: 200px;"> {{date('d-m-Y',strtotime($phieu->created_at))}}</div>
              </div>
              <br>
              <hr>
              <?php
                $kithi=DB::table('kythis')->join('chungchis','chungchis.MaCC','=','kythis.MaCC')->where('MaKiThi',$phieu->MaKiThi)->first();

              ?>
               <div>
                 <label style="float: left; margin-left: 250px; width: 100px; text-align: left"><b>Tên kì thi</b></label>
                  <div style="float: left; margin-left: 200px"> {{$kithi->TenKiThi}}</div>
              </div>
                  <br>
                  <hr>
               <div>
                <div>
                 <label style="float: left; margin-left: 250px;width: 100px;text-align: left;"><b>Chứng chỉ</b></label>
                  <div style="float: left; margin-left: 200px"> {{$kithi->tenCC}}</div>
              </div>
                  <br>
                  <hr>
                  <label style="float: left; margin-left: 250px; width: 100px; text-align: left"><b>Ngày thi</b></label>
                  <div style="float: left; margin-left: 200px">{{date('d-m-Y',strtotime($kithi->NgayThi))}}
                  </div>
              </div>
                  <br>
                  <hr>
               <div>
                  <label style="float: left; margin-left: 250px; width: 150px; text-align: left;"><b>Bắt đầu-Kết thúc</b></label>
                  <div style="float: left; margin-left: 150px">{{$kithi->GioBatDau}}-{{$kithi->GioKetThuc}}</div>
              </div>
                  <br>
                  <hr>
               <div>
                  <label style="float: left; margin-left: 250px; text-align: left; width: 100px"><b>Lệ phí</b></label>
                   <div style="float: left; margin-left: 200px">{{number_format($kithi->LePhi,0,'.','.')}} VND
                   </div>
              </div>
                    <br>
                    <hr>
              <?php
                   $user=Auth::user()->username;
                  $hovien=DB::table('tkhv')->where('username',$user)->first();
                  $phong=DB::table('diemthichungchis')->where('MaKiThi',$kithi->MaKiThi)->where('MaHocVien',$hovien->MaHocVien)->first();
              ?>
              @if(!empty($phong))

              <div>
                  <label style="float: left; margin-left: 250px"><b>Phòng thi:</b></label>
                <div style="float: left; margin-left: 250px"> {{$phong->PhongThi}}</div>
              </div>
              @endif
                  <br>
            </form>
          </center>
          </td>
          </tr>
          </table>

</div>





  @include('layout.right')

	</div>
@endsection




