<div class="right">
  <div class="sidebar-wrap col-md-3 content-left-wrap">
<div id="secondary" class="widget-area" role="complementary">
	<div style="margin-top:30px">	
<div class="widget-title">

<h2>LỚP HỌC NỔI BẬT</h2>
</div>
</div>
<br>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Anh</button>
  <button class="tablinks">Hàn</button>
  <button class="tablinks">Nhật</button>
</div>

<div id="London" class="tabcontent">
	<div class="la">

 <ul class="tab-panenb tab-tienganh" style="display: block;">
	<li>
    	<img alt="Trung tâm tiếng Anh " src="img/2.jpg">
    	<div class="desnb"><span class="ranknb">1</span><h3 class="ellipsisnb">Trung Tâm Anh, Hàn, Nhật uy tín</h3></div>
        <span class="item-masknb"></span>
  	</li>
  
 

@foreach($lophoc as $key => $lh)
     <li><span class="ranknb">
      
     {{$key+2}}

     </span><h3 class="ellipsisnb"><a target="_blank" href="{{route('chitietlophoc',$lh->MaLop)}}">{{$lh->TenLop}}</a></h3></li>
     @endforeach
    
</ul>
</div>
</div>

<!-- <div id="Paris" class="tabcontent">
 <div class="la">
 <ul class="tab-panenb tab-tienghan" style="display: block;">
	<li>
        <img alt="Trung tâm tiếng Hàn uy tín" src="img/than.jpg">
    	<div class="desnb"><span class="ranknb">1</span><h3 class="ellipsisnb"><a target="_blank" href="">Trung tâm tiếng Hàn uy tín</a></h3></div>
        <span class="item-masknb"></span>
  	</li>
    <li><span class="ranknb">2</span><h3 class="ellipsisnb"><a target="_blank" href="">Luyện thi TOPIK</a></h3></li>
    <li><span class="ranknb">3</span><h3 class="ellipsisnb"><a target="_blank" href="">Học tiếng Hàn giao tiếp</a></h3></li>
    <li><span class="ranknb">4</span><h3 class="ellipsisnb"><a target="_blank" href="">Học tiếng Hàn cơ bản</a></h3></li>
    <li><span class="ranknb">5</span><h3 class="ellipsisnb"><a target="_blank" href="">Tiếng Hàn Giao Tiếp cấp tốc</a></h3></li>
    <li><span class="ranknb">6</span><h3 class="ellipsisnb"><a target="_blank" href="">Tiếng Hàn Du lịch</a></h3></li>
    <li><span class="ranknb">7</span><h3 class="ellipsisnb"><a target="_blank" href="">Tiếng Hàn Du học</a></h3></li>
    <li><span class="ranknb">8</span><h3 class="ellipsisnb"><a target="_blank" href="">Nơi học tiếng Hàn uy tín?</a></h3></li>
    <li><span class="ranknb">9</span><h3 class="ellipsisnb"><a target="_blank" href="">Trung tâm tiếng Hàn cấp tốc</a></h3></li>
    <li><span class="ranknb">10</span><h3 class="ellipsisnb"><a target="_blank" href="">Tiếng Hàn Doanh Nghiệp</a></h3></li>
</ul>
</div>
</div> -->
<!-- <div id="Tokyo" class="tabcontent">
 <div class="la">
 <ul class="tab-panenb tab-tiengnhat" style="display: block;">
	<li>
        <img alt="Trung tâm tiếng Nhật uy tín" src="img/tnhat.jpg">
    	<div class="desnb"><span class="ranknb">1</span><h3 class="ellipsisnb"><a target="_blank" href="">Trung tâm tiếng Nhật uy tín</a></h3></div>
        <span class="item-masknb"></span>
   	</li>
    <li><span class="ranknb">2</span><h3 class="ellipsisnb"><a target="_blank" href="">Luyện thi N3 - N4 - N5</a></h3></li>
    <li><span class="ranknb">3</span><h3 class="ellipsisnb"><a target="_blank" href="">Học tiếng Nhật cấp tốc</a></h3></li>
    <li><span class="ranknb">4</span><h3 class="ellipsisnb"><a target="_blank" href="">Học tiếng Nhật giao tiếp uy tín</a></h3></li>
    <li><span class="ranknb">5</span><h3 class="ellipsisnb"><a target="_blank" href=>Học tiếng Nhật hiệu quả</a></h3></li>
    <li><span class="ranknb">6</span><h3 class="ellipsisnb"><a target="_blank" href="">Tiếng Nhật Du học</a></h3></li>
    <li><span class="ranknb">7</span><h3 class="ellipsisnb"><a target="_blank" href="">Bí quyết học tiếng Nhật</a></h3></li>
    <li><span class="ranknb">8</span><h3 class="ellipsisnb"><a target="_blank" href="">Tiếng Nhật hiệu quả</a></h3></li>
    <li><span class="ranknb">9</span><h3 class="ellipsisnb"><a target="_blank" href="">Học tiếng Nhật chất lượng</a></h3></li>
    <li><span class="ranknb">10</span><h3 class="ellipsisnb"><a target="_blank" href="">Tiếng Nhật Doanh Nghiệp</a></h3></li>
</ul>
</div>
</div> -->

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</div>

<div style="margin-top:30px">
<div class="widget-title">
<h2>LỊCH KHAI GIẢNG</h2>
</div>
</div>
<table>
 
  @foreach($lopkhoa as $lk)
<tr>
    <td><a href="{{route('chitietlichkhaigiang',$lk->id)}}"> <img src="upload/lophoc/{{$lk->Hinh}}" style="width: 120px; height: 100px"></a></td>
    <td>
              <span><i class="fa">&#xf017;</i>{{date('d-m-Y',strtotime($lk->updated_at))}}</span><br>
              <p><a href="{{route('chitietlichkhaigiang',$lk->id)}}"> {{$lk->TieuDe}} </a></p>
             Khai giảng: {{date('d-m-Y',strtotime($lk->NgayKhaiGiang))}}
            </div>
</td>
</tr>
@endforeach

</table>
<!-- <div style="clear:both;margin-bottom:20px"> --></div>
</div></div>
</div>