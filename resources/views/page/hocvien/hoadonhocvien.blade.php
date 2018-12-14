 @extends('layout.master')

@section('content')

<main>
<br>
<br>

<div class="content">

<div class="left">

  <div class="title-main"><h3>CÁC HÓA ĐƠN</h3></div>
  <div style="overflow-x:auto;">

  <table>
    <tr>
      <th>Mã khóa</th>
      <th>Lớp học</th>
      <th>Ngày khai giảng</th>
      <th>Ngày kết thúc</th>
     
    </tr>
    <tr>
      <td>Jill</td>
      <td>Smith</td>
      <td>50</td>
      <td>50</td>
    
    </tr>
    <tr>
      <td>Eve</td>
      <td>Jackson</td>
      <td>94</td>
      <td>94</td>
     
    </tr>
    <tr>
      <td>Adam</td>
      <td>Johnson</td>
      <td>67</td>
      <td>67</td>
      
    </tr>
  </table>
  
</div>

</div>



  @include('layout.right')

  </div>
@endsection