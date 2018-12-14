  @extends('layout.master')

@section('content')

<main>
<br>
<br>
<div class="content">

<div class="left">
  @if(isset($phieu))
   <div class="title-main"><h3>PHIẾU ĐĂNG KÍ #{{$phieu->id_PhieuDKHoc}}</h3></div>
   
  <table>

   
    <tr>
      <td>
    <center>
   <form action="nguoidung" method="POST">
     {{ csrf_field() }}

                <div>
                  <label style="float: left; margin-left: 250px;width: 100px;text-align:left"><b>Ngày đăng kí </b></label>
                  <div style="float: left; margin-left: 150px"> {{date('d-m-Y',strtotime($phieu->created_at))}}</div>
              </div>
              <br>
              <hr>
              <?php
                $lp=DB::table('lopkhoa')->join('lophoc','lophoc.MaLop','=','lopkhoa.MaLop')->join('tiethoc','lophoc.id_TietHoc','=','tiethoc.id_TietHoc')->where('id',$phieu->id)->first();

              ?>
               <div>
                 <label style="float: left; margin-left: 250px;width: 100px;text-align: left"><b>Tên lớp</b></label>
                  <div style="float: left; margin-left: 150px"> {{$lp->TenLop}}</div>
              </div>
                  <br>
                  <hr>
               <div>
                <div>
                 <label style="float: left; margin-left: 250px;width: 100px;text-align: left;"><b>Thời gian học</b></label>
                  <div style="float: left; margin-left: 150px"> {{$lp->ThoiGianBD}}--{{$lp->ThoiGianKT}}</div>
              </div>
                  <br>
                  <hr>
                  <label style="float: left; margin-left: 250px;width: 100px;text-align: left;"><b>Ngày bắt đầu</b></label>
                  <div style="float: left; margin-left: 150px">{{date('d-m-Y',strtotime($lp->NgayKhaiGiang))}}
                  </div>
              </div>
                  <br>
                  <hr>
               <div>
                  <label style="float: left; margin-left: 250px;width: 100px;text-align: left"><b>Ngày kết thúc</b></label>
                  <div style="float: left; margin-left: 150px">
                    {{date('d-m-Y',strtotime($lp->NgayKetThuc))}}
                    </div>
              </div>
                  <br>
                  <hr>
               <div>
                  <label style="float: left; margin-left: 250px;width: 100px; text-align: left;"><b>Buổi học</b></label>
                   <div style="float: left; margin-left: 150px">
                    <?php
                                if(!empty($lp->NgayChan))
                                $thu=json_decode($lp->NgayChan,true);

                              ?>
                          
                              @if(!empty($thu))
                              @foreach($thu as $t)

                              {{$t}}
                              @endforeach
                              @endif

                   </div>
              </div>
                    <br>
                    <hr>
              <div>
                  <label style="float: left; margin-left: 250px;width: 100px;text-align: left;"><b>Học phí</b></label>
                   <div style="float: left; margin-left: 150px">{{number_format($lp->HocPhi,0,'.','.')}} VND
                   </div>
              </div>
              <br><hr>
              <?php
                  $lopkm=DB::table('lopkhoa')->where('id',$phieu->id)->select('MaLop')->first();
                  $ds_km=DB::table('co')->join('khuyenmai','khuyenmai.MaKM','=','co.MaKM')->where('MaLop',$lopkm->MaLop)->get();
                  $giam=0;
                  foreach ($ds_km  as $ds_km) {
                    # code...
                    if((date('d-m-Y',strtotime($phieu->created_at))>=date('d-m-Y',strtotime($ds_km->ThoiGianBD)))&&(date('d-m-Y',strtotime($phieu->created_at))<=date('d-m-Y',strtotime($ds_km->ThoiGianKT)))){
                      $giam=$giam+$ds_km->MucGiam;
                    }
                    
                  }
                  
                  ?>
                  <div>
                  <label style="float: left; margin-left: 250px;width: 100px;text-align: left;"><b>Giảm giá</b></label>
                   <div style="float: left; margin-left: 150px">{{number_format($giam,0,'.','.')}} VND
                   </div>
              </div>
                    <br>
             
             
            </form>
          </center>
          </td>
          </tr>
          </table>
            @endif
</div>





  @include('layout.right')

	</div>
@endsection




