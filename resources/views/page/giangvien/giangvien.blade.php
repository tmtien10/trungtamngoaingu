  @extends('layout.master')

@section('content')

<main>
<br>
<br>
<div class="content">

<div class="left">
   <div class="title-main"><h3>THÔNG TIN TÀI KHOẢN</h3></div>
   <div style="float: left;"><img src="avatar/{{$tk->avatar}}" width="300px; height:250px"></div>
   <div style="float: left;margin-left: 50px">
   
  <table style="width: 500px">

   
    <tr>
     
      <td>
        <div class="b">Thông tin tài khoản</div>
         @if(session('success'))
             <p style="color:green">{{session('success')}}</p>
                         @endif
   <form action="giangvien/capnhat" method="POST" enctype="multipart/form-data">
     {{ csrf_field() }}
                
               <div>
                 <label><b>Đổi mật khẩu</b></label><br>
                  <input type="password" class="form-control password" name="new_pass" aria-describedby="basic-addon1">
              </div>
          
               <div>
                  <label><b>Nhập lại mật khẩu</b></label><br>
                  <input type="password" class="form-control password" placeholder="" name="old_pass" aria-describedby="basic-addon1" >
                  <div class="help-block">@if($errors->has('old_pass'))
                      <p style="color:red">{{$errors->first('old_pass')}}</p>
                          @endif</div>
              </div>


             
              <br>
               <div class="b">Thông tin giảng viên</div>

                <div class="form-group field-users-ho_ten required">
<label class="control-label" for="users-ho_ten">Họ tên</label><br>
<input type="text" id="users-ho_ten" class="form-control" name="hoten" maxlength="150" placeholder="Nguyễn Văn A" value="{{$nguoidung->HoTenGV}}">

<div class="help-block">@if($errors->has('hoten'))
                      <p style="color:red">{{$errors->first('hoten')}}</p>
                          @endif</div>
</div>
           <div class="form-group field-users-gioi_tinh required">
<label class="control-label" for="users-gioi_tinh">Giới tính</label><br>
<select id="users-gioi_tinh" class="form-control" name="gioitinh">
<option value="Nam"<?php  if($nguoidung->GioiTinhGV=='Nam') echo "selected";?>>Nam</option>
<option value="Nữ" <?php if($nguoidung->GioiTinhGV=='Nữ') echo "selected";?>>Nữ</option>
</select>

<div class="help-block"></div>
</div>      
           <div class="form-group field-users-dia_chi required">
<label class="control-label" for="users-dia_chi">Ngày sinh</label><br>
<input type="date" id="users-dia_chi" class="form-control" name="ngaysinh" value="{{$nguoidung->NgaySinhGV}}">

<div class="help-block">@if($errors->has('ngaysinh'))
                      <p style="color:red">{{$errors->first('ngaysinh')}}</p>
                          @endif</div>
</div> 
 
<div class="form-group field-users-dia_chi required">  
<label class="control-label" for="users-dien_thoai">Điện thoại</label><br>
<input type="text" id="users-dien_thoai" class="form-control" name="dienthoai" maxlength="11" placeholder="0123456789" value="{{$nguoidung->SDTGV}}">

<div class="help-block">@if($errors->has('dienthoai'))
                      <p style="color:red">{{$errors->first('dienthoai')}}</p>
                          @endif</div>
</div>
            <div class="form-group field-users-email required">
<label class="control-label" for="users-email">Email</label><br>
<input type="text" id="users-email" class="form-control" name="email" maxlength="50" placeholder="myemail@gmail.com" value="{{$nguoidung->EmailGV}}">

<div class="help-block">@if($errors->has('email'))
                      <p style="color:red">{{$errors->first('email')}}</p>
                          @endif</div>
</div> 
            <div class="form-group field-users-dia_chi required">
<label class="control-label" for="users-dia_chi">Địa chỉ</label><br>
<input type="text" id="users-dia_chi" class="form-control" name="diachi" maxlength="250" placeholder="01 Phạm Ngọc Thạch, P6, Q3, HCM" value="{{$nguoidung->DiaChiGV}}">

<div class="help-block">@if($errors->has('diachi'))
                      <p style="color:red">{{$errors->first('diachi')}}</p>
                          @endif</div>
</div>
            <div class="form-group field-users-dia_chi required">
<label class="control-label" for="users-dia_chi">Ảnh đại diện</label><br>
<input type="file" id="users-dia_chi" class="form-control" name="file">

<div class="help-block"></div>
</div>
               <br>
                <div class="form-group">
           <center> <button type="submit" class="btn btn-primary">Cập nhật</button></center>            </div>
            </form>


                    <script>
        $(document).ready(function() {
            $("#changePassword").change(function() {
             if($(this).is(":checked"))
             {
                $(".password").removeAttr('disabled');
             }
             else
             {
                $(".password").attr('disabled', '');
             }
            });
        });
    </script>
          </td>
          </tr>
          </table>

</div>

</div>



  @include('layout.right')

  </div>
@endsection




