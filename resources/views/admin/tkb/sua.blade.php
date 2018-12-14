@extends('adminlayout.adminmaster')
@section('title','Sửa tkb')
@section('css')

<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.min.css')}}" />

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="{{ asset('assets/css/fonts.googleapis.com.css')}}" />

    <!-- ace styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('assets/css/ace-skins.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.css"/>

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="{{ asset('assets/js/ace-extra.min.js')}}"></script>
@endsection
@section('breadcrumb')

							<li><i class="ace-icon fa fa-home home-icon"></i><a href="ad">Home</a></li>
							<li><a href="ad/st">Danh sách tkb</a> </li>
							<li class="active">Sửa tkb</li>
@endsection
@section('content')

					<div class="page-header">
							<h1>
								Thông tin thời khóa biểu
							
							</h1>
						</div>

                <div class="float-right">
                  @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                  @endif
              <form class="form-horizontal">
                            {{ csrf_field() }}
              <?php
                $a=DB::table('nhom')->join('lopkhoa','lopkhoa.id','=','nhom.id')->join('lophoc','lophoc.MaLop','=','lopkhoa.MaLop')->where('MaNhom',$nhom->MaNhom)->first();

              ?>
              <div class="form-group">
                               <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tên nhóm</span></label>
                             <div class="col-sm-9">
                             <input type="text" readonly="" value="{{$a->TenNhom}}">     
                      </div>
                    </div>
              <div class="form-group">
                               <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Lớp học</span></label>
                             <div class="col-sm-9">
                             <input type="text" readonly="" value="{{$a->TenLop}}">     
                      </div>
                    </div>
              <div class="form-group">
                               <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Áp dụng</span></label>
                             <div class="col-sm-9">
                             <input type="text" readonly="" value="{{date('d-m-Y',strtotime($a->NgayKhaiGiang))}}----{{date('d-m-Y', strtotime($a->NgayKetThuc))}}">     
                      </div>
                    </div>
                      
            </div>
					</form>
        </div>
          <div class="col-lg-12" style="padding-bottom:20px"> <div class="hr hr-16 hr-dotted"></div></div>
 
                    <div class="col-lg-7" style="padding-bottom:120px">
                      <CENTER> <h3>  THỜI KHÓA BIỂU</h3></CENTER>
                   
          @if(isset($calendar))             
        <div class="float-left">                 
          {!! $calendar->calendar() !!}

        
      </div>
@endif
                                
          </div>         
                     

                     <div class="col-lg-5" style="padding-bottom:120px">

                   
                        @if(!isset($phancong))
        <div class="float-right">
              <form class="form-horizontal" action="ad/tkb/sua/them" method="POST">
                            {{ csrf_field() }}
        <div class="form-group">

                      <label class="col-sm-4 control-label no-padding-right" for="form-field-1">      <center><h2> Thêm mới</h2></center></label>

        </div>
        <div class="form-group">
          <?php
                  $thu=DB::table('thoigian')->get();
          ?>
                               <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Thứ</span></label>
                             <div class="col-sm-9">
                       
                      </div>
                      <div class="col-sm-9">
                      <select class="thu" name="thu">
                        @foreach($thu as $t)

                        <option value="{{$t->id_ThoiGian}}">{{$t->Thu}}</option>
                        @endforeach
                      </select>
                    </div>
                
                      </div> 
                          
        <div class="form-group">
                               <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Môn học</span></label>
                             <div class="col-sm-9">
                       
                      </div>
                      <div class="col-sm-9">
                      <select class="mon" name="mon">
                        @foreach($monhoc as $m)

                        <option value="{{$m->MaMonHoc}}">{{$m->TenMonHoc}}</option>
                        @endforeach
                      </select>
                    </div>
                
                      </div> 
                          
              
       <div class="form-group">
                              
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Giảng dạy</span></label>
                              <div class="col-sm-9">
                             
                                  <select class="gv" name="gv">
                                    @foreach($gv as $gv)

                        <option value="{{$gv->MaGV}}">{{$gv->HoTenGV}}</option>
                                   @endforeach
                                  </select>
                                </div> 
                              </div>
                      </div>
        <div class="col-md-offset-3 col-md-9">
                      <button class="btn btn-info" name="tkb" value="{{$nhom->id_TKB}}" type="submit">
                     
                       Lưu
                      </button>

                      &nbsp; &nbsp; &nbsp;
                     <input class="btn btn-danger" type="button" value="Hủy" onclick="location.href='ad/tkb/danhsach';">
                        
                       
                       &nbsp; &nbsp; &nbsp;

  
                    </div>
                                    
                        </form>      
                            
         @endif   

 
          @if(isset($phancong))
        <div class="float-right">
              <form class="form-horizontal" action="ad/tkb/sua/edit" method="POST">
                            {{ csrf_field() }}
                             <div class="form-group">
                               <label class="col-sm-3 control-label no-padding-right" for="form-field-1">id</span></label>
                             <div class="col-sm-9">
                        <input class="col-xs-10 col-sm-5" id="form-field-mask-2" type="text" name="id" readonly="" value="{{$phancong->id}}">
                      </div>
                
                      </div>

        <div class="form-group">
                               <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Môn học</span></label>
                             <div class="col-sm-9">
                       
                      </div>
                      <div class="col-sm-9">
                      <select class="mon" name="mon">
                        @foreach($monhoc as $m)

                        <option value="{{$m->MaMonHoc}}"<?php if($m->MaMonHoc==$phancong->MaMonHoc) echo"selected"; ?>>{{$m->TenMonHoc}}</option>
                        @endforeach
                      </select>
                    </div>
                
                      </div> 
                          
              
       <div class="form-group">
                              
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Giảng dạy</span></label>
                              <div class="col-sm-9">
                             
                                  <select class="gv" name="gv">
                                    @foreach($gv as $gv)

                        <option value="{{$gv->MaGV}}"<?php if($gv->MaGV==$phancong->MaGV) echo"selected"; ?>>{{$gv->HoTenGV}}</option>
                                   @endforeach
                                  </select>
                                </div> 
                              </div>
                      </div>
        <div class="col-md-offset-3 col-md-9">
                      <button class="btn btn-info" type="submit">
                     
                       Lưu
                      </button>

                      &nbsp; &nbsp; &nbsp;
                     <input class="btn btn-danger" type="button" value="Hủy" onclick="location.href='ad/tkb/danhsach';">
                        
                       
                       &nbsp; &nbsp; &nbsp;
                      <a href="ad/tkb/sua/xoaphancong/{{$phancong->id}}">
                        <i class="fa fa-trash"></i>
                      </a>
                    </div>
                                    
                        </form>
                      </div>
        @endif                                     
									   
      

@endsection
@section('script')
<!-- basic scripts -->

    <!--[if !IE]> -->
    <script src="{{ asset('assets/js/jquery-2.1.4.min.js')}}"></script>

    <!-- <![endif]-->

    <!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script src=""></script>
  {!! $calendar->script() !!}
<script type="text/javascript">
      $(document).on('change', '.mon', function(e){
      e.preventDefault();
      $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
      });
     
               
      $.ajax({
          'url' : 'monhoc',
          'data': {
            'mon' : $(".mon").val(),
  
          },
          'type' : 'POST',
          success: function (data) {
            console.log(data);
            $(".gv").empty();
                $.each(data, function(key, value){
                  
                    $(".gv").append(
                        "<option value=" + value.MaGV + ">" + value.HoTenGV + "</option>"
                    );
                });
              
           
            } 
          
        });
    });
 

</script>
    <!-- page specific plugin scripts -->
    <script src="{{ asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('assets/js/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('assets/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('assets/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('assets/js/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('assets/js/dataTables.select.min.js')}}"></script>

    <!-- ace scripts -->
    <script src="{{ asset('assets/js/ace-elements.min.js')}}"></script>
    <script src="{{ asset('assets/js/ace.min.js')}}"></script>

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
      jQuery(function($) {
        //initiate dataTables plugin
        var myTable = 
        $('#dynamic-table')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( {
          bAutoWidth: false,
          "aoColumns": [
            { "bSortable": false },
            null, null,null, null, null,
            { "bSortable": false }
          ],
          "aaSorting": [],
          
          
          //"bProcessing": true,
              //"bServerSide": true,
              //"sAjaxSource": "http://127.0.0.1/table.php" ,
      
          //,
          //"sScrollY": "200px",
          //"bPaginate": false,
      
          //"sScrollX": "100%",
          //"sScrollXInner": "120%",
          //"bScrollCollapse": true,
          //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
          //you may want to wrap the table inside a "div.dataTables_borderWrap" element
      
          //"iDisplayLength": 50
      
      
          select: {
            style: 'multi'
          }
          } );
      
        
        
        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
        
        new $.fn.dataTable.Buttons( myTable, {
          buttons: [
            {
            "extend": "colvis",
            "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Hiện/ẩn</span>",
            "className": "btn btn-white btn-primary btn-bold",
            columns: ':not(:first):not(:last)'
            },
            {
            "extend": "copy",
            "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy vào bộ nhớ</span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {
            "extend": "csv",
            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Xuất file excel</span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {
            "extend": "excel",
            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {
            "extend": "pdf",
            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
            "className": "btn btn-white btn-primary btn-bold"
            }  
          ]
        } );
        myTable.buttons().container().appendTo( $('.tableTools-container') );
        
        //style the message box
        var defaultCopyAction = myTable.button(1).action();
        myTable.button(1).action(function (e, dt, button, config) {
          defaultCopyAction(e, dt, button, config);
          $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
        });
        
        
        var defaultColvisAction = myTable.button(0).action();
        myTable.button(0).action(function (e, dt, button, config) {
          
          defaultColvisAction(e, dt, button, config);
          
          
          if($('.dt-button-collection > .dropdown-menu').length == 0) {
            $('.dt-button-collection')
            .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
            .find('a').attr('href', '#').wrap("<li />")
          }
          $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
        });
      
        ////
      
        setTimeout(function() {
          $($('.tableTools-container')).find('a.dt-button').each(function() {
            var div = $(this).find(' > div').first();
            if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
            else $(this).tooltip({container: 'body', title: $(this).text()});
          });
        }, 500);
        
        
        
        
        
        myTable.on( 'select', function ( e, dt, type, index ) {
          if ( type === 'row' ) {
            $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
          }
        } );
        myTable.on( 'deselect', function ( e, dt, type, index ) {
          if ( type === 'row' ) {
            $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
          }
        } );
      
      
      
      
        /////////////////////////////////
        //table checkboxes
        $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
        
        //select/deselect all rows according to table header checkbox
        $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
          var th_checked = this.checked;//checkbox inside "TH" table header
          
          $('#dynamic-table').find('tbody > tr').each(function(){
            var row = this;
            if(th_checked) myTable.row(row).select();
            else  myTable.row(row).deselect();
          });
        });
        
        //select/deselect a row when the checkbox is checked/unchecked
        $('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
          var row = $(this).closest('tr').get(0);
          if(this.checked) myTable.row(row).deselect();
          else myTable.row(row).select();
        });
      
      
      
        $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
          e.stopImmediatePropagation();
          e.stopPropagation();
          e.preventDefault();
        });
        
        
        
        //And for the first simple table, which doesn't have TableTools or dataTables
        //select/deselect all rows according to table header checkbox
        var active_class = 'active';
        $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
          var th_checked = this.checked;//checkbox inside "TH" table header
          
          $(this).closest('table').find('tbody > tr').each(function(){
            var row = this;
            if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
            else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
          });
        });
        
        //select/deselect a row when the checkbox is checked/unchecked
        $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
          var $row = $(this).closest('tr');
          if($row.is('.detail-row ')) return;
          if(this.checked) $row.addClass(active_class);
          else $row.removeClass(active_class);
        });
      
        
      
        /********************************/
        //add tooltip for small view action buttons in dropdown menu
        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
        
        //tooltip placement on right or left
        function tooltip_placement(context, source) {
          var $source = $(source);
          var $parent = $source.closest('table')
          var off1 = $parent.offset();
          var w1 = $parent.width();
      
          var off2 = $source.offset();
          //var w2 = $source.width();
      
          if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
          return 'left';
        }
        
        
        
        
        /***************/
        $('.show-details-btn').on('click', function(e) {
          e.preventDefault();
          $(this).closest('tr').next().toggleClass('open');
          $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
        });
        /***************
        
        
        
        
        
        /**
        //add horizontal scrollbars to a simple table
        $('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
          {
          horizontal: true,
          styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
          size: 2000,
          mouseWheelLock: true
          }
        ).css('padding-top', '12px');
        */
      
      
      })
    </script>

@endsection