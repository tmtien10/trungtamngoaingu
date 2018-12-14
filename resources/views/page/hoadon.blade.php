 @extends('layout.master')

@section('content')

<main>
<div class="content">

<div class="left">

 <!--  <div class="title-main"><h2>Thông tin đăng ký</h2></div> -->
  @if (session('thongbao'))
        <div class="alert alert-sucess"><p style="background-color:green; color: white;padding: 20px;">{{session('thongbao')}}</p></div>
    @endif
      <p style="color:red">* Học viên đến trung tâm đóng học phí vào ngày khai giảng  và xem thời khóa biểu lớp học trên webiste của trung tâm</p>
<a style=" text-decoration: none;float: right;padding-right: 30px"title="" href="index"><img border="0" align="absmiddle">Trở về trang chủ</a>
    <!-- <h2> Thời Khóa Biểu</h2>

    <table>
    <tr>
      <th colspan="4">Lớp:Tiếng anh trẻ em 1 (Sáng:2,4,6)</th>
      
     
    </tr>
    <tr>
      <td rowspan="2">Phòng: 110/C1</td>
      <td>Thứ 2</td>
     
      <td>Thứ 4</td>
      
      <td>Thứ 6</td>
   
     
    
    </tr>
    <tr>
    	<td>Cô ??? Đọc</td>
    
      <td>Thầy???? Viết</td>

      <td>Cô:???? Ngữ pháp</td>
     
    </tr>
   
  </table>
  <br>
   <h2> Hóa Đơn</h2>
   <table>
    <tr>
      <th>ID</th>
      <th>Lớp</th>
      <th>Học Phí</th>
      
     
    </tr>
    <tr>
     
      <td>0123</td>
     
      <td>Tiếng anh trẻ em 1</td>
      
      <td>2.000.000(VNĐ)</td>
   
     
    
    </tr>
    
   
  </table>

  <p style="color:red">* Học viên in hóa đơn này ra và đến địa chỉ ... đóng học phí từ ngày->ngày, nếu học viên không đón học phí xem như học viên hủy đăng ký học</p>
<a style=" text-decoration: none;float: right;padding-right: 30px"title="Tạo bản in thời khóa biểu" href="intkb"><img border="0" src="img/print.gif" align="absmiddle">Tạo bản in thời khóa biểu</a>
  
  
</div>
  
</div>
  
</div> -->
</div>
@include('layout.right')
</div>
@endsection