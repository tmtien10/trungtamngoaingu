 @extends('layout.master')

@section('content')


<br>
<br>
<main>
<div class="main2">
  <div class="login-page2">
  <div class="form">
    <center><h2>Đăng Ký Tài Khoản</h2></center>
     @if (session('thongbao'))
        <div class="alert alert-sucess"><p style="background-color:green; color: white;padding: 20px;">{{session('thongbao')}}</p></div>
    @endif
  <form id="w0" class="form-horizontal" action="{{asset('/dangki/add')}}" method="post"  enctype="multipart/form-data">
          {{ csrf_field() }}
        Thông tin tài khoản
        <hr>

            <div class="form-group field-users-username required">
<label class="control-label" for="users-username">Tên đăng nhập</label>
<input type="text" id="users-username" class="form-control" name="username" maxlength="100" value="{{old('username')}}">

<div class="help-block">@if($errors->has('username'))
                      <p style="color:red">{{$errors->first('username')}}</p>
                          @endif</div>
</div>
            <div class="form-group field-users-password required">
<label class="control-label" for="users-password">Mật khẩu </label>
<input type="password" id="users-password" class="form-control" name="password" maxlength="100" value="{{old('password')}}">



<div class="help-block">@if($errors->has('password'))
                      <p style="color:red">{{$errors->first('password')}}</p>
                          @endif</div>
</div>
 <div class="form-group field-users-dien_thoai required">
<label class="control-label" for="users-dien_thoai">Điện thoại</label>
<input type="text" id="users-dien_thoai" class="form-control" name="dienthoai" maxlength="11" placeholder="0123456789" value="{{old('dienthoai')}}">

<div class="help-block">@if($errors->has('dienthoai'))
                      <p style="color:red">{{$errors->first('dienthoai')}}</p>
                          @endif</div>
</div>
            <div class="form-group field-users-email required">
<label class="control-label" for="users-email">Email</label>
<input type="text" id="users-email" class="form-control" name="email" maxlength="50" placeholder="myemail@gmail.com" value="{{old('email')}}">

<div class="help-block">@if($errors->has('email'))
                      <p style="color:red">{{$errors->first('email')}}</p>
                          @endif</div>
</div><br>
          Thông tin cá nhân
        <hr>
            <div class="form-group field-users-ho_ten required">
<label class="control-label" for="users-ho_ten">Họ tên</label>
<input type="text" id="users-ho_ten" class="form-control" name="hoten" maxlength="150" placeholder="Nguyễn Văn A" value="{{old('hoten')}}">

<div class="help-block">@if($errors->has('hoten'))
                      <p style="color:red">{{$errors->first('hoten')}}</p>
                          @endif</div>
</div>
           <div class="form-group field-users-gioi_tinh required">
<label class="control-label" for="users-gioi_tinh">Giới tính</label>
<select id="users-gioi_tinh" class="form-control" name="gioitinh">
<option value="Nam">Nam</option>
<option value="Nữ">Nữ</option>
</select>

<div class="help-block"></div>
</div>      
           <div class="form-group field-users-dia_chi required">
<label class="control-label" for="users-dia_chi">Ngày sinh</label>
<input type="date" id="users-dia_chi" class="form-control" name="ngaysinh" maxlength="250">

<div class="help-block">@if($errors->has('ngaysinh'))
                      <p style="color:red">{{$errors->first('ngaysinh')}}</p>
                          @endif</div></div>

 <div class="form-group field-users-dia_chi required">
<label class="control-label" for="users-dia_chi">CMND</label>
<input type="text" id="users-dia_chi" class="form-control" name="cmnd" maxlength="250" value="{{old('cmnd')}}">

<div class="help-block">@if($errors->has('cmnd'))
                      <p style="color:red">{{$errors->first('cmnd')}}</p>
                          @endif</div>
                        </div>  
 <div class="form-group field-users-dia_chi required">
<label class="control-label" for="users-dia_chi">Ngày cấp</label>
<input type="date" id="users-dia_chi" class="form-control" name="ngaycap" maxlength="250" value="{{old('ngaycap')}}">

<div class="help-block">@if($errors->has('ngaycap'))
                      <p style="color:red">{{$errors->first('ngaycap')}}</p>
                          @endif</div></div> 
 <div class="form-group field-users-dia_chi required">
<label class="control-label" for="users-dia_chi">Nghề nghiệp</label>
<input type="text" id="users-dia_chi" class="form-control" name="nghenghiep" maxlength="250" value="{{old('nghenghiep')}}">

<div class="help-block">@if($errors->has('nghenghiep'))
                      <p style="color:red">{{$errors->first('nghenghiep')}}</p>
                          @endif</div></div>                
            <div class="form-group field-users-dia_chi required">
<label class="control-label" for="users-dia_chi">Địa chỉ</label>
<input type="text" id="users-dia_chi" class="form-control" name="diachi" maxlength="250" placeholder="01 Phạm Ngọc Thạch, P6, Q3, HCM" value="{{old('diachi')}}">

<div class="help-block">@if($errors->has('diachi'))
                      <p style="color:red">{{$errors->first('diachi')}}</p>
                          @endif</div>
</div>
            <div class="form-group field-users-dia_chi required">
<label class="control-label" for="users-dia_chi">Ảnh đại diện</label>
<input type="file" id="users-dia_chi" class="form-control" name="file" maxlength="250">

<div class="help-block"></div>
</div>
<br>
            <div class="form-group">
           <center> <button type="submit" class="btn btn-primary">Đăng ký</button></center>            </div>

            </form>
  </div>
</div>
</div>
</main>

@endsection