@extends('layout.master')

@section('content')

<<br>
<br>
<main>
<div class="main2">
  <div class="login-page">
  <div class="form">
    <center><h2>ĐĂNG NHẬP</h2></center>
   <form id="login-form" class="form-horizontal" action="{{asset('/dangnhaptest')}}" method="POST">
     {{ csrf_field() }}
    <div class="help-block">@if($errors->has('error'))
                      <p style="background-color:#f44336; color: white;padding: 10px;">{{$errors->first('error')}}</p>
                          @endif</div>
            <div class="form-group field-loginform-username required">

<input type="text" id="loginform-username" class="form-control" name="username" autofocus="" placeholder="Tên đăng nhập">

<p class="help-block help-block-error">@if($errors->has('username'))
                      <p style="color:red">{{$errors->first('username')}}</p>
                          @endif</p>
</div>
            <div class="form-group field-loginform-password required">

<input type="password" id="loginform-password" class="form-control" name="password" placeholder="Mật khẩu">

<p class="help-block help-block-error">@if($errors->has('password'))
                      <p style="color:red">{{$errors->first('password')}}</p>
                          @endif</p>
</div>

            <div class="form-group field-loginform-rememberme">

</div>
            <div class="form-group">
            <center><button type="submit" class="btn btn-primary" name="login-button">Đăng nhập</button> </center>             
            </div>
            <br>
            Chưa có tài khoản 
            <a href="{{route('dangky')}}">Đăng kí</a> tại đây

</form>
  </div>
</div>
</div>
</main>

@endsection