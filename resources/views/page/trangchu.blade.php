  @extends('layout.master')

@section('content')
 

 <div id="jssor_1" style="position:relative;margin:0 auto;top:50px;left:0px;width:980px;height:410px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->

        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:50px;left:0px;width:100%;height:100%;text-align:center;">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:410px;overflow:hidden;">
          @if(isset($slide))
            @foreach($slide as $sl)
            <div>
                <img data-u="image" src="img/{{$sl->image}}" />
            </div>
            @endforeach
          @endif
            
   
       
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb053" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
              
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora093" style="width:50px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
           <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M11949,1919L5964.9,7771.7c-127.9,125.5-127.9,329.1,0,454.9L11949,14079"></path>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora093" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
          <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M5869,1919l5984.1,5852.7c127.9,125.5,127.9,329.1,0,454.9L5869,14079"></path>
            </svg>
        </div>
    </div>

    <script type="text/javascript">jssor_1_slider_init();</script>
    <!-- #endregion Jssor Slider End -->


 <div class="main">
  <div class="title-main" style="padding-top: 70px;"></div>
   <div class="column2">
  <h4 class="city">LỊCH KHAI GIẢNG</h4>

  @if(isset($lopkhoa))
   @foreach($lopkhoa as $hp)
    <div class="column1">
  
    <div class="card1">
     
    <div class="container">

        @foreach($khuyenmai as $km)
        @foreach($co as $c)
        @if($c->MaKM== $km->MaKM)
        @if($c->MaLop== $hp->MaLop)

        @if($km->ThoiGianBD <= date('Y-m-d H:i:s'))
        @if ( date('Y-m-d H:i:s') <= $km->ThoiGianKT)

       
     

    


       
       <div class="ribbon-wrapper"><div class="ribbon sale">KM </div></div>
   @endif
   @endif
   @endif
          @endif
          @endforeach
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
  
  @endif
 
</div>

<br>

    <div class="column3">

  
       

<center><h2> GIỚI THIỆU</h2></center>


 <div class="column21">
<center><img src="img/10.png" width="40%"></center>
<p  style="padding: 5px"> Với nhiều năm kinh nghiệm giảng dạy và đào tạo </p>

</div>
 
 <div class="column31">
 <center> <img src="img/4.png" width="40%"></center>
<p style="padding: 5px"> Đội ngũ chuyên môn cao đa số là người nước ngoài </p>
</div>      

    <div class="column21">
<center><img src="img/61.png" style="width:40%"></center>
<p  style="padding: 5px">Chương trình học đa dạng thiết kế theo từng độ tuổi</p>

</div>
 
 <div class="column31">
 <center> <img src="img/05.png" width="40%"></center>
<p style="padding: 5px">Đối tác chiến lược uuy tín liên kết với nhiều trường Đại Học</p>
</div> 

    <div class="column21">
<center><img src="img/03.png" style="width:40%"></center>
<p  style="padding: 5px">Phần mềm học tập chuyên dụng hỗ trợ tối đa việc học </p>

</div>
 
 <div class="column31">
 <center> <img src="img/01.png" width="40%"></center>
<p style="padding: 5px"> Tỉ lệ cao học viên đạt mục tiêu đầu ra khóa học</p>
</div>   
  

<a href="{{route('gioithieu')}}" style="float: right; color: #ef5028">XEM THÊM</a>
           
         



  
  </div>

</div>
<div class="main">
  
   <div class="title-main" style=""><h2> LỚP HỌC</h2></div>
 @if(isset($lophoc))
  @foreach($lophoc as $lh)
  
  <div class="column">
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
 @endif
</div>
<div class="main">
<div class="title-main"><h2>Thông báo</h2></div>

  <div class="column4">
    <table>
    <h4 class="city">THÔNG BÁO HỌC</h4>
   @foreach($thongbao as $tb)
    @if($tb->LoaiTB == 1)
    <tr>
    <td width="100px"><a href="{{route('chitietthongbao',$tb->MaTB)}}"> <img src="img/tb.jpg" style="width: 100px; height: 100px"></a></td>
    <td>
              <span><i class="fa">&#xf017;</i>{{date('d-m-Y, h:i:s', strtotime($tb->created_at))}}</span><br>
              <p><a href="{{route('chitietthongbao',$tb->MaTB)}}"> {{$tb->TenTB}}</a></p>
            </div>
</td>
</tr>
@endif
@endforeach

</table>
  </div>


  <div class="column4">
      <table>
    <h4 class="city">THÔNG BÁO THI</h4>
    @foreach($thongbao as $tb)
    @if($tb->LoaiTB == 2)
    <tr>
    <td width="100px"><a href="{{route('chitietthongbao',$tb->MaTB)}}"> <img src="img/tb.jpg" style="width: 100px; height: 100px"></a></td>
    <td>
              <span><i class="fa">&#xf017;</i>{{date('d-m-Y, h:i:s', strtotime($tb->created_at))}}</span><br>
              <p><a href="{{route('chitietthongbao',$tb->MaTB)}}"> {{$tb->TenTB}}</a></p>
            </div>
</td>
</tr>
@endif
@endforeach

</table>
  </div>
  <div class="column4">
      <table>
    <h4 class="city">KẾT QUẢ THI</h4>

    @foreach($thongbao as $tb)
    @if($tb->LoaiTB == 3)
    <tr>
    <td width="100px"><a href="{{route('chitietthongbao',$tb->MaTB)}}"> <img src="img/tb.jpg" style="width: 100px; height: 100px"></a></td>
    <td>
              <span><i class="fa">&#xf017;</i>{{date('d-m-Y, h:i:s', strtotime($tb->created_at))}}</span><br>
              <p><a href="{{route('chitietthongbao',$tb->MaTB)}}"> {{$tb->TenTB}}</a></p>
            </div>
</td>
</tr>
@endif
@endforeach

</table>

  </div>
 
</div>



  @endsection