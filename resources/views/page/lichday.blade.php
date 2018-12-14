  @extends('layout.master')

@section('content')

<main>
<br>
<br>
<div class="content">

<div class="left">
  

<link href='https://fullcalendar.io/releases/fullcalendar-scheduler/1.9.4/lib/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.css' rel='stylesheet' />
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js'></script>
<script></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale/vi.js'></script>

<script src=""></script>
  {!! $calendar->script() !!}


      <div class="float-left">                 
          {!! $calendar->calendar() !!}

        
      </div>


   
</div>





  @include('layout.right')

	</div>
@endsection




