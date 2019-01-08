<!DOCTYPE html>
<html lang="en">
	<head>

		 <base href="{{asset('')}}">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>@yield('title')</title>
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<meta name="description" content="" /> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		
		@yield('css')

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->


		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="ad/" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							TRUNG TÂM NGOẠI NGỮ NS
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						
						<li class="purple dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								@if(Auth::user()->avatar!=0)
								<img class="nav-user-photo" src="avatar/{{Auth::user()->avatar}}" alt="Jason's Photo" />
								@else
								<img class="nav-user-photo" src="{{asset('avatar/noimg.png')}}" alt="Jason's Photo" />
								@endif
								<span class="user-info">
									<small>Chào,</small>
									{{Auth::user()->username}}
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							
								<li>
									<a href="ad/myprofile/">
										<i class="ace-icon fa fa-user"></i>
										Thông tin tài khoản
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="logout">
										<i class="ace-icon fa fa-power-off"></i>
										Đăng xuất
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				
				<ul class="nav nav-list">
					<li class="">
						<a href="ad">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-user "></i>
							<span class="menu-text">
								HỌC VIÊN
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="ad/hocvien/danhsach">
									<i class="menu-icon fa fa-caret-right"></i>

									DANH SÁCH
								</a>
	
							</li>

							<li class="">
								<a href="ad/hocvien/them">
									<i class="menu-icon fa fa-caret-right"></i>
									THÊM MỚI
								</a>

								<b class="arrow"></b>
							</li>

							
										
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> GIẢNG VIÊN </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="ad/giangvien/danhsach">
									<i class="menu-icon fa fa-caret-right"></i>
									DANH SÁCH
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="ad/giangvien/them">
									<i class="menu-icon fa fa-caret-right"></i>
								THÊM MỚI
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a class="dropdown-toggle">
							<i class="menu-icon fa fa-book"></i>
							<span class="menu-text"> KHÓA HỌC </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>


						<ul class="submenu">
							<li class="">
								<a href="ad/khoahoc/danhsach">
									<i class="menu-icon fa fa-caret-right"></i>
									DANH SÁCH
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="ad/khoahoc/them">
									<i class="menu-icon fa fa-caret-right"></i>
								THÊM MỚI
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a class="dropdown-toggle">
							<i class="menu-icon fa fa-book"></i>
							<span class="menu-text"> MÔN HỌC </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>


						<ul class="submenu">
							<li class="">
								<a href="ad/monhoc/danhsach">
									<i class="menu-icon fa fa-caret-right"></i>
									DANH SÁCH
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="ad/monhoc/them">
									<i class="menu-icon fa fa-caret-right"></i>
								THÊM MỚI
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-folder"></i>
							<span class="menu-text"> LỚP HỌC</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="ad/lophoc/danhsach">
									<i class="menu-icon fa fa-caret-right"></i>
									DANH SÁCH
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="ad/lophoc/them">
									<i class="menu-icon fa fa-caret-right"></i>
								THÊM MỚI
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-folder"></i>
							<span class="menu-text"> LỚP KHÓA</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="ad/lopkhoa/danhsach">
									<i class="menu-icon fa fa-caret-right"></i>
									DANH SÁCH
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="ad/lopkhoa/them">
									<i class="menu-icon fa fa-caret-right"></i>
								THÊM MỚI
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-folder"></i>
							<span class="menu-text">NHÓM </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="ad/nhom/danhsach">
									<i class="menu-icon fa fa-caret-right"></i>
									DANH SÁCH
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="ad/nhom/themmoi">
									<i class="menu-icon fa fa-caret-right"></i>
								THÊM MỚI
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-book"></i>
							<span class="menu-text"> TKB </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{asset('ad/tkb/danhsach')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									DANH SÁCH
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{asset('ad/tkb/them')}}">
									<i class="menu-icon fa fa-caret-right"></i>
								THÊM MỚI
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-percent"></i>
							<span class="menu-text"> KHUYẾN MÃI </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="ad/khuyenmai/danhsach">
									<i class="menu-icon fa fa-caret-right"></i>
									DANH SÁCH
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="ad/khuyenmai/them">
									<i class="menu-icon fa fa-caret-right"></i>
								THÊM MỚI
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa 	fa-check-square-o "></i>
							<span class="menu-text"> KÌ THI </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="ad/kithi">
									<i class="menu-icon fa fa-caret-right"></i>
									DANH SÁCH
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="ad/kithi/them">
									<i class="menu-icon fa fa-caret-right"></i>
								THÊM MỚI
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> PHÒNG HỌC </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="ad/phonghoc/danhsach">
									<i class="menu-icon fa fa-caret-right"></i>
									DANH SÁCH
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="ad/phonghoc/them">
									<i class="menu-icon fa fa-caret-right"></i>
								THÊM MỚI
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> KHU VỰC </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="ad/khuvuc/danhsach">
									<i class="menu-icon fa fa-caret-right"></i>
									DANH SÁCH
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="ad/khuvuc/them">
									<i class="menu-icon fa fa-caret-right"></i>
								THÊM MỚI
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa 	fa-pencil-square-o "></i>
							<span class="menu-text"> PHIẾU ĐĂNG KÍ </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a class="dropdown-toggle" href="#"><i class="menu-icon fa fa-caret-right"></i>
									KHÓA HỌC <b class="arrow fa fa-angle-down"></b></a>		
							
								<b class="arrow"></b>
								<ul class="submenu nav-show">
										<li class="">
											<a href="ad/phieudangki/danhsach"><i class="menu-icon fa fa-caret-right"></i>DANH SÁCH</a>

												<b class="arrow"></b>
										</li>

										<li class="">
											<a href="ad/phieudangki/them">
												<i class="menu-icon fa fa-caret-right"></i>
												THÊM MỚI
											</a>
										</li>
								</ul>
							</li>

							<li class="">
								<a class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>
								KÌ THI<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>
							<ul class="submenu nav-show">
										<li class="">
											<a href="ad/dangkithi"><i class="menu-icon fa fa-caret-right"></i>DANH SÁCH</a>

												<b class="arrow"></b>
										</li>

										<li class="">
											<a href="ad/dangkithi/them">
												<i class="menu-icon fa fa-caret-right"></i>
												THÊM MỚI
											</a>
										</li>
								</ul>
							</li>
						</ul>
					</li>
						<li class="">
						<a href="ad/hoadon/" class="dropdown-toggle">
							<i class="menu-icon fa 	fa-money "></i>
							<span class="menu-text"> HÓA ĐƠN </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a class="dropdown-toggle" href="#"><i class="menu-icon fa fa-caret-right"></i>
									KHÓA HỌC <b class="arrow fa fa-angle-down"></b></a>		
							
								<b class="arrow"></b>
								<ul class="submenu nav-show">
										<li class="">
											<a href="ad/hoadonhoc/danhsach"><i class="menu-icon fa fa-caret-right"></i>DANH SÁCH</a>

												<b class="arrow"></b>
										</li>

										<li class="">
											<a href="ad/hoadonhoc/them">
												<i class="menu-icon fa fa-caret-right"></i>
												THÊM MỚI
											</a>
										</li>
								</ul>
							</li>

							<li class="">
								<a class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>
								KÌ THI<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>
							<ul class="submenu nav-show">
										<li class="">
											<a href="ad/hoadon/"><i class="menu-icon fa fa-caret-right"></i>DANH SÁCH</a>

												<b class="arrow"></b>
										</li>

										<li class="">
											<a href="ad/hoadon/them">
												<i class="menu-icon fa fa-caret-right"></i>
												THÊM MỚI
											</a>
										</li>
								</ul>
							</li>
						</ul>
					</li>
				 @if(Auth::user()->quyen==1)
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-bullhorn "></i>
							<span class="menu-text"> THÔNG BÁO</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="ad/thongbao/">
									<i class="menu-icon fa fa-caret-right"></i>
									DANH SÁCH
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="ad/thongbao/them">
									<i class="menu-icon fa fa-caret-right"></i>
									THÊM MỚI
								</a>

								<b class="arrow"></b>
							</li>

							
						</ul>
					</li>

					<li class="">
						<a href="ad/cbtt" class="dropdown-toggle">
							<i class="menu-icon fa fa-user "></i>
							<span class="menu-text">NHÂN VIÊN </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="ad/cbtt">
									<i class="menu-icon fa fa-caret-right"></i>
									DANH SÁCH
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="ad/cbtt/them">
									<i class="menu-icon fa fa-caret-right"></i>
									THÊM MỚI
								</a>

								<b class="arrow"></b>
							</li>

							
						</ul>
					</li>
				<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users "></i>
							<span class="menu-text">TÀI KHOẢN </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="ad/taikhoan">
									<i class="menu-icon fa fa-caret-right"></i>
									DANH SÁCH
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="ad/taikhoan/them">
									<i class="menu-icon fa fa-caret-right"></i>
									THÊM MỚI
								</a>

								<b class="arrow"></b>
							</li>
						</ul></li>
					
			<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-line-chart"></i>
							<span class="menu-text">THỐNG KÊ </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="ad/thongkekhoahoc">
									<i class="menu-icon fa fa-caret-right"></i>
									THỐNG KÊ KHÓA HỌC
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="ad/thongkekithi">
									<i class="menu-icon fa fa-caret-right"></i>
									THỐNG KÊ KỲ THI
								</a>
								@endif
								<b class="arrow"></b>
							</li>
						</ul></li>
						

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							@yield('breadcrumb')
						</ul><!-- /.breadcrumb -->

						
					</div>

					<div class="page-content">
						
						<div class="row">
							<div class="col-xs-12">
								@yield('content')

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder"></span>
							&copy; 2013-2014
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		@yield('script')
	</body>
</html>
