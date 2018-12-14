@extends('adminlayout.adminmaster')
@section('title','Sửa thông báo')
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
							<li><a href="admin/st">Danh sách thông báo</a> </li>
							<li class="active">Sửa thông báo </li>
@endsection
@section('content')
			<div class="page-header">
							<h1>
								Sửa thông báo
							
							</h1>
						</div>
			<form class="form-horizontal" role="form"  method="post" action="ad/thongbao/update" enctype="multipart/form-data">
						{{ csrf_field() }}
						@foreach($tb as $tb)
				<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="form-field-1">Mã thông báo</label>
											<div class="col-sm-9">
													<input class="col-xs-10 col-sm-5" id="form-field-mask-2" type="text" name="id" value="{{$tb->MaTB}}" readonly="">
												
											</div>

						</div>
				<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="form-field-1">Tên thông báo</label>
											<div class="col-sm-9">
													<input class="col-xs-10 col-sm-5" id="form-field-mask-2" type="text" name="name" value="{{$tb->TenTB}}">
												
											</div>

						</div>
				<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="form-field-1">Nội dung</label>
											<div class="col-sm-9">	
					<textarea id="editor1" name="noidung" >{{$tb->NoiDungTB}}</textarea>
				</div>
			</div>
			
				<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="form-field-1">Loại thông báo</label>
											<div class="col-sm-9">	
											<select name="loai">
												
												<option value="1" <?php if($tb->LoaiTB==1) echo "selected";?>>Thông báo học</option>
												<option value="2" <?php if($tb->LoaiTB==2) echo "selected";?>>Thông báo thi</option>
												<option value="3" <?php if($tb->LoaiTB==3) echo "selected";?>>Kết quả thi</option>
											</select>					
				</div>

			</div>
					<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="form-field-1">File đính kèm</label>
											<div class="col-sm-9">
												{{$tb->file}}
													<input class="col-xs-10 col-sm-5" id="form-field-mask-2" type="file" name="file" >
												
											</div>

						</div>
						<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit" name="old_file" value="{{$tb->file}}">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Lưu
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Hủy
											</button>
										</div>
										
									</div>
					@endforeach
			</form>
					
@endsection


@section('script')
 <script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
		<script> CKEDITOR.replace('editor1'); </script>

@endsection