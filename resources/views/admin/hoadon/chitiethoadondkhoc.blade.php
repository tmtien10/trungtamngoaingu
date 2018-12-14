
@extends('adminlayout.adminmaster')
@section('title','Chi tiết hóa đơn')
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

							<li><i class="ace-icon fa fa-home home-icon"></i><a href="admin">Home</a></li>
							<li><a href="admin/st">Danh sách hóa đơn</a> </li>
							<li class="active">Hóa đơn</li>
@endsection
@section('content')


					<div class="page-header">
							<h1>
								Thông tin hóa đơn
							
							</h1>
						</div>
											<!-- PAGE CONTENT BEGINS -->
											<form id="print">
						{{ csrf_field() }}
											@foreach($phieu as $phieu)
					<div class="col-sm-10 col-sm-offset-1">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-large">
												<h3 class="widget-title grey lighter">
													
													Hóa đơn
												</h3>

												<div class="widget-toolbar no-border invoice-info">
													<span class="invoice-info-label">ID</span>
													<span class="red">#{{$phieu->id_PhieuDKHoc}}</span>
													<br>
													<span class="invoice-info-label">Ngày lập:</span>
													<span class="blue">{{date('d-m-Y h:i:s',strtotime($phieu->created_at))}}</span>
												</div>

												<div class="widget-toolbar hidden-480">
													<a >
														
													</a>
												</div>
											</div>
							<?php
								$user=DB::table('hocvien')->where('MaHocVien',$phieu->MaHocVien)->get();
								
							?>
											<div class="widget-body">
												<div class="widget-main padding-24">
													<div class="row">
														<div class="col-sm-5">
															<div class="row">
																<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
																	<b>THÔNG TIN HỌC VIÊN</b>
																</div>
															</div>

															<div>
																@foreach($user as $user)
																	<input type="text" name="mahv" hidden="" value="{{$user->MaHocVien}}">
																<ul class="list-unstyled spaced">
																	<li>
																		<i class="ace-icon fa fa-caret-right blue"></i>Họ tên: {{$user->HoTenHocVien}}
																	</li>

																	<li>
																		<i class="ace-icon fa fa-caret-right blue"></i>Giới tính: {{$user->GioiTinh}}
																	</li>

																	<li>
																		<i class="ace-icon fa fa-caret-right blue"></i>Ngày sinh: {{$user->NgaySinh}}
																	</li>

																	<li>
																		<i class="ace-icon fa fa-caret-right blue"></i>
																		Số điện thoại: {{$user->SDT}}
																	
																	</li>

																	<li class="divider"></li>
																	<li>
																		<i class="ace-icon fa fa-caret-right blue"></i>
																		Email: {{$user->Email}}
																	</li>

																	<li>
																		<i class="ace-icon fa fa-caret-right blue"></i>
																		Địa chỉ: {{$user->DiaChi}}
																	</li>
																</ul>
																@endforeach
															</div>
														</div>
													<?php
								$lopdk=DB::table('lophoc')->join('lopkhoa','lopkhoa.MaLop','=','lophoc.MaLop')->join('tiethoc', 'tiethoc.id_TietHoc','=','lophoc.id_TietHoc')->where('id',$phieu->id)->get();
							?>

													
													<div class="row">
														<div class="col-sm-6">
															<div class="row">
																<div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
																	<b>THÔNG TIN LỚP HỌC</b>
																</div>
															</div>

															<div>
																@foreach($lopdk as $lopdk)
																<input type="text" name="malop" hidden="" value="{{$lopdk->id}}">
																<ul class="list-unstyled spaced">
																	<li>
																		<i class="ace-icon fa fa-caret-right blue"></i>Tên 	lớp: {{$lopdk->TenLop}}
																	</li>
																	<li>
																		<i class="ace-icon fa fa-caret-right blue"></i>Thời gian học: {{$lopdk->ThoiGianBD}}-{{$lopdk->ThoiGianKT}}
																	</li>

																	<li>
																		<i class="ace-icon fa fa-caret-right blue"></i>Ngày bắt đầu: {{date('d-m-Y',strtotime($lopdk->NgayKhaiGiang))}}
																	</li>

																	<li>
																		<i class="ace-icon fa fa-caret-right blue"></i>Ngày kết thúc: {{date('d-m-Y',strtotime($lopdk->NgayKetThuc))}}
																	</li>
																	@endforeach
																	<li>
																		<i class="ace-icon fa fa-caret-right blue"></i>Nhóm học: {{$phieu->MaNhom}}
																	</li>
																	<li class="divider"></li>
																	
																</ul>
																
															</div>
														</div><!-- /.col -->

														
													</div><!-- /.row -->


													<div class="hr hr8 hr-double hr-dotted"></div>
									<div class="space-6"></div>
									<div class="space-6"></div>
									<div class="space-6"></div>
									<div class="space-6"></div>
									<h3 class="widget-title grey lighter">
													
									Thông tin thanh toán
								</h3>
									<div class="space-6"></div>
									<div>
														<table class="table table-striped table-bordered">
															<thead>
																<tr>
																	<th class="center">#</th>
																	<th>Lớp học</th>
																	
																	<th class="hidden-480">Học phí</th>
																	<th class="hidden-480">Giảm giá</th>
																	<th class="hidden-480">Tổng tiền</th>
																	
																</tr>
															</thead>
										<?php
								$lopdk1=DB::table('lophoc')->join('lopkhoa','lopkhoa.MaLop','=','lophoc.MaLop')->join('tiethoc', 'tiethoc.id_TietHoc','=','lophoc.id_TietHoc')->where('id',$phieu->id)->get();
							?>
										@foreach($lopdk1 as $lopdk1)	
									<?php
									$lopkm=DB::table('lopkhoa')->join('phieudkhoc','phieudkhoc.id','=','lopkhoa.id')->where('id_PhieuDKHoc',$phieu->id_PhieuDKHoc)->select('MaLop','phieudkhoc.created_at')->first();
									$ds_km=DB::table('co')->join('khuyenmai','khuyenmai.MaKM','=','co.MaKM')->where('MaLop',$lopkm->MaLop)->get();
									$giam=0;
									foreach ($ds_km  as $ds_km) {
										# code...
										if((date('d-m-Y',strtotime($lopkm->created_at))>=date('d-m-Y',strtotime($ds_km->ThoiGianBD)))&&(date('d-m-Y',strtotime($lopkm->created_at))<=date('d-m-Y',strtotime($ds_km->ThoiGianKT)))){
											$giam=$giam+$ds_km->MucGiam;
										}
										
									}
									
									?>
															<tbody>
																<tr>
																	<td class="center">1</td>
																	<td><a href="ad/lophoc/sua/{{$lopdk->MaLop}}">{{$lopdk1->TenLop}} </a></td>
																	
																	<td class="hidden-xs">
																		{{number_format($lopdk1->HocPhi,0,'.','.')}}
																	</td>
																	<td class="hidden-480">{{number_format($giam,0,'.','.')}}</td>
																	<td class="hidden-480">{{number_format($lopdk1->HocPhi-$giam,0,'.','.')}}</td>
																	
																</tr>

																
															</tbody>
														</table>
													</div>

													<div class="hr hr8 hr-double hr-dotted"></div>

													<div class="row">
														<div class="col-sm-5 pull-right">
															<h4 class="pull-right">
																Tổng cộng :
																<span class="red">{{number_format($lopdk1->HocPhi-$giam,0,'.','.')}} VND</span>
															</h4>
														</div>
														<div class="col-sm-7 pull-left"> Extra Information </div>
													</div>

													<div class="space-6"></div>

													@endforeach
													<div class="hr hr8 hr-double hr-dotted"></div>
													<div class="row">
														<div class="col-sm-5 pull-right">
															<h4 class="pull-right">
																Người lập: <br><br>
																
																{{$phieu->HoTenNV}}

																
															</h4>
														</div>
													</div>
										@endforeach
										</form>
									<div class="col-sm-10 pull-left"> 
									<center>	<button onclick="myFunction('print')" value="{{$phieu->id_PhieuDKHoc}}"class="btn btn-info" type="button">In hóa đơn</button>
										
												</center>	</div>
											</div>
											</div>		

												
													
									
								
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
				<script>
function myFunction(divName) {
  var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;

}
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