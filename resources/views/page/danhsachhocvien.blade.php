 @extends('layout.master')

@section('content')

<main>
<div class="content">

<div class="left">

  <div class="title-main"><h2>DANH SÁCH HỌC VIÊN</h2></div>

  
  <div style="overflow-x:auto;">

  <table>
    
    
      <td colspan="4" style="background-color:  #2b3990;color: white;font-size: 15px">
  <p>Lớp  Nhóm  </p>
  </div>

</td>
</tr>
      <th>STT</th>
      <th>Mã học viên</th>
      <th>Họ tên học viên</th>
      <th>Ngày sinh</th>
     
     
    </tr>
    <tr>
      <td>1</td>
      <td>HV001</td>
      <td>Trần Văn A</td>
      <td>01/01/2000</td>
      
    </tr>
   
  </table>
  
</div>

</div>
@include('layout.right')
</div>
@endsection

