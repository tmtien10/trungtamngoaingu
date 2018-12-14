 @extends('layout.master')

@section('content')

<br>
<br>
<main>
<div class="main2">
  <div class="login-page2">
      <div class="form">
    <h2>Đăng Ký Thi</h2>
  <form action="">


    <label for="hoten"><b>Họ tên</b></label>
    <input type="text1" placeholder="Họ tên" name="hoten" required>

    <label for="sdt"><b>SĐT</b></label>
    <input type="text1" placeholder="SĐT" name="sdt" required>

  <label for="email"><b>Email</b></label>
    <input type="text1" placeholder="Email" name="email" required>

    <label for="diachi"><b>Địa chỉ</b></label>
    <input type="text1" placeholder="Địa chỉ" name="diachi" required>
     <label for="khoahoc"><b>Chứng chỉ thi</b></label><br>
    <select class="form-control" required="" id="course" name="course">
                                <option value="">----Chọn chứng chỉ bạn muốn đăng kí----</option>
                                <option value="treem">Chứng chỉ A</option>
                                <option value="giaotiep">Chứng chỉ B</option>
                                <option value="giaotiep">Chứng chỉ C</option>
                                <option value="giaotiep">Toeic</option>
                                <option value="giaotiep">Ielts</option>
                               
                              </select>
 
    <br>


 
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="login-button">Đăng ký</button>              
            </div>

 
</form>
</div>
</div>
  
  </div>

</main>

@endsection