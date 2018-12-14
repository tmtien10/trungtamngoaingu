<div class="nav">
<a href=""><i  class="fa fa-phone"></i> 01234567890</a>
  <a href=""><i class="fa fa-envelope"></i> contact@gmail.com</a>
    <a href=""><i class="fa fa-map-marker"></i> Số 148, Xuân Khánh, Ninh Kiều, Cần Thơ</a>
     <div class="nav-right">
<a href="#" class="fa fa-facebook"></a>
<a href="#" class="fa fa-google"></a>
<a href="#" class="fa fa-skype"></a>
 <a href="#" class="fa fa-youtube-play"></a>



  </div>
</div>

   <div id='navbar'>
<ul>
  <li><a href="{{asset('/')}}"><img src="img/logo.png"></a></li>
  <li><form role="search" method="get" id="searchform" action="{{'search'}}">
                  <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />


                  <button class="fa fa-search" type="submit" id="searchsubmit"></button>
            </form></li>
  <!-- <li><a href="{{route('trangchu')}}"><i class="fa fa-home"></i></a></li> -->
   <li><a href="{{route('gioithieu')}}">giới thiệu</a></li>
 
   <li class='active has-sub'><a >Lớp Học</a>
      <ul>
      
          @foreach($lophoc as $lh)
               <li class=''>
                  <a href="{{route('chitietlophoc',$lh->MaLop)}}">{{$lh->TenLop}}</a>
                </li>
                @endforeach
               
         
      </ul>
   </li>
   <li><a href="{{route('lichkhaigiang')}}">lịch khai giảng</a></li>
   <li><a href="{{route('tochucthi')}}">tổ chức thi</a></li>
    <li><a href="{{route('tkb1')}}">tkb</a></li>
     <li><a href="{{route('lienhe')}}">liên hệ</a></li>
 
  @if(Auth::check())


         @if(Auth::user()->quyen==4)
  <!-- Hocvien -->
  <li class='active has-sub' ><a > <i class="fa fa-user fa-fw"> </i>Chào,{{Auth::user()->username}}</a>
 <ul> 
         <li class=''><a href="nguoidung">Thông Tin Tài Khoản </a>
         
         </li>
          <li class=''><a href="hocvien/lopdk"> Các lớp đăng ký học</a>
         
         </li>
          <li class=''><a href="hocvien/dangkythi">Các kỳ thi </a>
         
         </li>
         
         
          <li class=''><a href="hocvien/lichhoc">Lịch học </a>
         
         </li>
        
      
       
         <li class=''><a href="{{route('logout')}}">Đăng xuất</a>
            
         </li>
           <!-- /Hocvien -->
         <!-- Giaovien -->
         @elseif (Auth::user()->quyen==3)
         <li class='active has-sub' ><a > <i class="fa fa-user fa-fw"> </i>Chào,{{Auth::user()->username}}</a>
 <ul> 
         <li class=''><a href='giangvien'>Thông Tin Tài Khoản </a>
         
         </li>
         <li class=''><a href="giangvien/lopday">Các Lớp Dạy</a>
            
         </li>
         <li class=''><a href="giangvien/lichday">Lịch dạy</a>
            
         </li>
          </li>
        
         <li class=''><a href="{{route('logout')}}">Đăng xuất</a>
            
         </li>
        @else
<li class='active has-sub' ><a > <i class="fa fa-user fa-fw"> </i>Tài Khoản</a>
 <ul>
         <li class=''><a href="{{route('dangnhap')}}"><i class="fa fa-sign-in"> </i>Đăng Nhập</a>
         
         </li>
         <li class=''><a href="{{route('dangky')}}"><i class="fa fa-pencil-square-o"></i>Đăng Ký</a>
            
         </li>
      </ul>
    </li>
 <!-- /Giaovien -->

      </ul>
    </li>  
     
     @endif
    @else
<li class='active has-sub' ><a > <i class="fa fa-user fa-fw"> </i>Tài Khoản</a>
 <ul>
         <li class=''><a href="{{route('dangnhap')}}"><i class="fa fa-sign-in"> </i>Đăng Nhập</a>
         
         </li>
         <li class=''><a href="{{route('dangky')}}"><i class="fa fa-pencil-square-o"></i>Đăng Ký</a>
            
         </li>
      </ul>
    </li>
    @endif

</ul>
</div>



<script type="text/javascript">
window.onscroll = function() {myFunction()};

var myTopnav = document.getElementById("myTopnav");
var sticky = myTopnav.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    myTopnav.classList.add("sticky")
  } else {
    myTopnav.classList.remove("sticky");
  }
}
</script>