@extends('adminlayout.adminmaster')
@section('title','Thêm học viên')
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

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="{{ asset('assets/js/ace-extra.min.js')}}"></script>

@endsection
@section('breadcrumb')

							<li><i class="ace-icon fa fa-home home-icon"></i><a href="ad">Home</a></li>
							<li><a href="ad/hocvien/danhsach">Danh sách học viên</a> </li>
							<li class="active">Thêm học viên</li>
@endsection
@section('content')


						<div class="page-header">
							<h1>
								Thông tin học viên
							
							</h1>
						</div>
											<!-- PAGE CONTENT BEGINS -->
			

					<form class="form-horizontal" role="form" action="ad/hocvien/them" method="POST">
						   {{ csrf_field() }}

						  
						  
						<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Họ và tên   </label>

										<div class="col-sm-9">
											<input id="form-field-1" class="col-xs-10 col-sm-5" type="text" name="HoTenHocVien"><br><br>
											<p class="help-block col-xs-12 col-sm-reset inline">@if($errors->has('HoTenHocVien'))
                      <p style="color:red">{{$errors->first('HoTenHocVien')}}</p>
                          @endif</p>				
                          
                        
                    
										</div>
									</div>
									 <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên đăng nhập   </label>

										<div class="col-sm-9">
											<input id="form-field-1" class="col-xs-10 col-sm-5" type="text" name="username"><br><br>
											
                        
                    
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mật khẩu   </label>

										<div class="col-sm-9">
											<input id="form-field-1" class="col-xs-10 col-sm-5" type="password" name="password"><br><br>
											
                        
                    
										</div>
									</div>	
						<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Giới tính </label>
											<div class="col-sm-9">
												

												<div class="radio" name="GioiTinh">
													<label>
														<input name="GioiTinh" class="ace" type="radio" value="Nam" checked="">
														<span class="lbl"> Nam</span>
														
													</label>
													<label>
														<input name="GioiTinh" class="ace" type="radio" value="Nữ">
														<span class="lbl"> Nữ</span>
														
													</label>
													<p class="help-block col-xs-12 col-sm-reset inline">
						@if($errors->has('GioiTinh'))
                      <p style="color:red">{{$errors->first('GioiTinh')}}</p>
                          @endif</p>			
												</div>

											</div>
										</div>	
						
						<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ngày sinh</label>
											<div class="col-sm-9">
													<input class="col-xs-10 col-sm-5" id="form-field-mask-2" type="date" name="NgaySinh"><br><br>
									<p class="help-block col-xs-12 col-sm-reset inline">
						@if($errors->has('NgaySinh'))
                      <p style="color:red">{{$errors->first('NgaySinh')}}</p>
                          @endif</p>			
											</div>
						</div>
						<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Số điện thoại</label>
											<div class="col-sm-9">
													<input class="col-xs-10 col-sm-5" id="form-field-mask-2" type="text" name="SDT"><br><br>
						<p class="help-block col-xs-12 col-sm-reset inline">
						@if($errors->has('SDT'))
                      <p style="color:red">{{$errors->first('SDT')}}</p>
                          @endif</p>
											</div>
						</div>
						<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email  <span style="color: red">(*)</span> </label>
											<div class="col-sm-9">
													<input class="col-xs-10 col-sm-5" placeholder="example@gmail.com" id="form-field-mask-2" type="email" name="Email">	<br><br>
							<p class="help-block col-xs-12 col-sm-reset inline">
						@if($errors->has('Email'))
                      <p style="color:red">{{$errors->first('Email')}}</p>
                          @endif</p>				
											</div>
						</div>
						<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> CMND  <span style="color: red">(*)</span> </label>
											<div class="col-sm-9">
													<input class="col-xs-10 col-sm-5"  id="form-field-mask-2" type="text" name="cmnd">	<br><br>
							<p class="help-block col-xs-12 col-sm-reset inline">
						@if($errors->has('cmnd'))
                      <p style="color:red">{{$errors->first('cmnd')}}</p>
                          @endif</p>				
											</div>
						</div>
						<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ngày cấp  <span style="color: red">(*)</span> </label>
											<div class="col-sm-9">
													<input class="col-xs-10 col-sm-5" placeholder="example@gmail.com" id="form-field-mask-2" type="date" name="ngaycap">	<br><br>
							<p class="help-block col-xs-12 col-sm-reset inline">
						@if($errors->has('ngaycap'))
                      <p style="color:red">{{$errors->first('ngaycap')}}</p>
                          @endif</p>				
											</div>
						</div>
						<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nghề nghiệp  <span style="color: red">(*)</span> </label>
											<div class="col-sm-9">
													<input class="col-xs-10 col-sm-5" id="form-field-mask-2" type="text" name="nghenghiep">	<br><br>
							<p class="help-block col-xs-12 col-sm-reset inline">
						@if($errors->has('nghenghiep'))
                      <p style="color:red">{{$errors->first('nghenghiep')}}</p>
                          @endif</p>				
											</div>
						</div>
						<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Địa chỉ </label>
											<div class="col-sm-9">
													<input class="col-xs-10 col-sm-5"  id="form-field-mask-2" type="text" name="DiaChi"><br>
													<br>
							<p class="help-block col-xs-12 col-sm-reset inline">
						@if($errors->has('DiaChi'))
                      <p style="color:red">{{$errors->first('DiaChi')}}</p>
                          @endif</p>				
											</div>
						</div>

						
						<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Thêm
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Làm mới
											</button>
										</div>
									</div>
					</form>

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
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
			
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
				/***************/
				
				
				
				
				
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