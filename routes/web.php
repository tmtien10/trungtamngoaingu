<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('test',function(){
    return view('admin.test');
});

Route::get('intkb/{MaNhom}',[
     'as'=>'intkb',
   'uses'=>'PageController@getIntkb'
]);
Route::get('/', 'PageController@getIndex');
Route::post('monhoc', 'MonHocController@getGV');
Route::post('ngaykhaigiang', 'NhomController@getNgay');
Route::get('confirmacc/{code}', 'Auth\RegisterController@verify');

 Auth::routes();

Route::get('index',[
	'as'=>'trangchu',
	//'uses'=>'PageController@getIndex'
]);
Route::get('gioithieu',[
	'as'=>'gioithieu',
	'uses'=>'PageController@getgioithieu'
]);
Route::get('khoahoc',[
	'as'=>'khoahoc',
	'uses'=>'PageController@getkhoahoc'
]);
Route::get('lophoc',[
    'as'=>'lophoc',
    'uses'=>'PageController@getlophoc'
]);
Route::get('lichkhaigiang',[
	'as'=>'lichkhaigiang',
	'uses'=>'PageController@getlichkhaigiang'
]);
Route::get('tochucthi',[
	'as'=>'tochucthi',
	'uses'=>'KiThiController@view'
]);



Route::get('lienhe',[
	'as'=>'lienhe',
	'uses'=>'PageController@getlienhe'
]);
Route::group(['prefix' => 'page','middleware'=>'dangkyhoc'], function() {
    Route::get('dangkyhoc',[
    	'as'=>'dangkyhoc',
    	'uses'=>'HocVienController@getdangkyhoc'
    ]);
     Route::get('hoadon',[
        'as'=>'hoadon',
       'uses'=>'PageController@gethoadon'
    ]);  });

Route::post('dangkyhoc', 'PageController@postDangKyHoc');
Route::get('hoadon',[
    'as'=>'hoadon',
    'uses'=>'PageController@gethoadon'
]);
Route::get('dangky',[
	'as'=>'dangky',
	'uses'=>'PageController@getdangky'
]);


Route::get('danhsachhocvien', function () {
    return view('page.danhsachhocvien');
});

Route::get('chitietlophoc/{MaLop}',[
    'as'=>'chitietlophoc',
    'uses'=>'PageController@getChitietlophoc'
]);
Route::get('chitietlichkhaigiang/{id}',[
    'as'=>'chitietlichkhaigiang',
    'uses'=>'PageController@getChitietlichkhaigiang'
]);
Route::get('chitietthongbao/{MaTB}',[
    'as'=>'chitietthongbao',
    'uses'=>'PageController@getChitietthongbao'
]);
Route::get ('search',[
'as'=>'search',
'uses'=>'PageController@getSearch'
]);

Route::get ('tkb',[
'as'=>'tkb',
'uses'=>'PageController@gettkb'
]);
Route::get ('tkb1',[
'as'=>'tkb1',
'uses'=>'PageController@gettkb1'
]);
Route::post('timkiem','PageController@gettkb2');

Route::get('dangnhap',[
	'as'=>'dangnhap',
	'uses'=>'PageController@getdangnhap'
]);
Route::get('ad/login', function () {
    return view('admin.loginadmin');

});
Route::post('filter','KiThiController@filter');;
Route::get('/logout','Auth\LoginController@logout' );

//đăng nhập
Route::post('/dangki/add', 'Auth\RegisterController@postDangki');
Route::post('/dangnhaptest','Auth\LoginController@postLogin');
Route::post('/dangnhapadmin','Auth\LoginController@postLoginadmin');
Route::get('/logout','Auth\LoginController@logout' );
//Học viên

Route::middleware(['IsStudent'])->group(function () {

Route::get('hocvien/dangkithi/del/{id}','HocVienController@del');
Route::get('hocvien/dangkythi','HocVienController@get_DS_DK_thi');
Route::get('hocvien/dangkithi/{id}','DangkithiController@view_phieudk');
Route::get('hocvien/lichhoc/','TKBController@hocvien_tkb');
Route::get('hocvien/dangkithi/del/{id}','HocVienController@del');
Route::get('hocvien/lopdk', 'PageController@getLopDK');
Route::get('hocvien/lopdk/{id}', 'PhieuDangKiController@view_phieudk');
Route::get('hocvien/lopdk/del/{id}','PageController@del');  
Route::get('dangkilophoc/{id}','PhieuDangKiController@Create');
Route::post('dangkithi/','DangkithiController@postCreate');
Route::get('nguoidung/','HocVienController@profile');
Route::post('hocvien/capnhat','HocVienController@profile_update');


    });

//Giảng viên
Route::middleware(['IsTeacher'])->group(function () {
Route::get('giangvien/lopday','PageController@getLopDay');
Route::get('giangvien/danhsachhocvien/{id}','PageController@getdanhsachhocvien');
Route::get('giangvien','GiangVienController@profile');
Route::post('giangvien/capnhat','GiangVienController@profile_update');
Route::get('giangvien/lichday/','TKBController@giangvien_tkb');


});
//Admin Cpanel
Route::middleware(['IsAdmin'])->group(function () {
	Route::get('/ad','PageController@index_admin');

//tài khoản

Route::get('ad/taikhoan','TaikhoanController@viewlist');
Route::get('ad/taikhoan/them','TaikhoanController@viewcreate' );
Route::post('ad/taikhoan/savenew','TaikhoanController@postCreate' );
Route::get('ad/taikhoan/{username}','TaikhoanController@viewUpdate' );
Route::post('ad/taikhoan/saveedit','TaikhoanController@postUpdate' );
Route::get('ad/taikhoan/del/{username}','TaikhoanController@delete' );

//cbtt
Route::get('ad/cbtt','CBTTController@viewCBTT');
Route::get('ad/cbtt/them','CBTTController@viewCreate');
Route::post('ad/cbtt/savenew','CBTTController@CreateCBTT');
Route::get('ad/cbtt/{MaNV}','CBTTController@viewUpdate' );
Route::post('ad/cbtt/save','CBTTController@UpdateCBTT');
Route::get('ad/cbtt/del/{MaNV}','CBTTController@delete' );


//học viên
 Route::group(['prefix' => 'ad/hocvien'], function() {
        
        Route::get('danhsach', 'HocVienController@getDanhSach');

        Route::get('sua/{MaHocVien}', 'HocVienController@getSua');
        Route::post('sua/{MaHocVien}', 'HocVienController@postSua');

        Route::get('them', 'HocVienController@getThem');
        Route::post('them', 'HocVienController@postThem');

        Route::get('xoa/{MaHocVien}', 'HocVienController@getXoa');

    });

//giảng viên

Route::group(['prefix' => 'ad/giangvien'], function() {
        
        Route::get('danhsach', 'GiangVienController@getDanhSach');

        Route::get('sua/{MaGV}', 'GiangVienController@getSua');
        Route::post('sua/{MaGV}', 'GiangVienController@postSua');

        Route::get('them', 'GiangVienController@getThem');
        Route::post('them', 'GiangVienController@postThem');

        Route::get('xoa/{MaGV}', 'GiangVienController@getXoa');

    });
//khóa
	Route::group(['prefix' => 'ad/khoahoc'], function() {
        //admin/theloai/danhsach
        Route::get('danhsach', 'KhoaHocController@getDanhSach');

        Route::get('sua/{id}', 'KhoaHocController@getSua');
        Route::post('sua/{id}', 'KhoaHocController@postSua');

        Route::get('them', 'KhoaHocController@getThem');
        Route::post('them', 'KhoaHocController@postThem');

        Route::get('xoa/{id}', 'KhoaHocController@getXoa');

    });

//lớp

Route::group(['prefix' => 'ad/lophoc'], function() {
        
        Route::get('danhsach', 'LopHocController@getDanhSach');

        Route::get('sua/{MaLop}', 'LopHocController@getSua');
        Route::post('sua/{MaLop}', 'LopHocController@postSua');

        Route::get('them', 'LopHocController@getThem');
        Route::post('them', 'LopHocController@postThem');

        Route::get('xoa/{MaLop}', 'LopHocController@getXoa');

    });
    Route::group(['prefix' => 'ad/lopkhoa'], function() {
        
        Route::get('danhsach', 'LopKhoaController@getDanhSach');

        Route::get('sua/{id}', 'LopKhoaController@getSua');
        Route::post('sua/{id}', 'LopKhoaController@postSua');

        Route::get('them', 'LopKhoaController@getThem');
        Route::post('them', 'LopKhoaController@postThem');

        Route::get('xoa/{id}', 'LopKhoaController@getXoa');

    });


//nhóm

              Route::group(['prefix' => 'ad/nhom'], function() {
        
        Route::get('danhsach', 'NhomController@getDanhSach');
        Route::get('danhsachhocvien/{MaNhom}', 'NhomController@getDanhSachHocVien');
        Route::get('sua/{MaNhom}', 'NhomController@getSua');
        Route::post('sua/{MaNhom}', 'NhomController@postSua');
        Route::get('xoahv/{id}/{nhom}', 'NhomController@xoa_hoc_vien');
        Route::get('them', 'NhomController@getThem');
        Route::post('them', 'NhomController@postThem');
        Route::get('themnhom', 'NhomController@getThemNhom');
        Route::post('themnhom', 'NhomController@postThemNhom');

        Route::post('themnhom', 'NhomController@postchia_nhom');
        Route::post('chianhom', 'NhomController@chia_nhom');


        Route::get('xoa/{MaNhom}', 'NhomController@getXoa');

    });


//khuyến mãi
	Route::group(['prefix' => 'ad/khuyenmai'], function() {
        
        Route::get('danhsach', 'KhuyenMaiController@getDanhSach');
         Route::get('danhsachlopkm/{MaKM}', 'KhuyenMaiController@getDanhsachlopkm');
      
        Route::get('sua/{MaKM}', 'KhuyenMaiController@getSua');
        Route::post('sua/{MaKM}', 'KhuyenMaiController@postSua');

        Route::get('them', 'KhuyenMaiController@getThem');
        Route::post('them', 'KhuyenMaiController@postThem');

        Route::get('xoa/{MaKM}', 'KhuyenMaiController@getXoa');
         Route::get('xoalop/{MaLop}/{MaKM}', 'KhuyenMaiController@getXoaLop');

    });

	//khu vực

 Route::group(['prefix' => 'ad/khuvuc'], function() {
        
        Route::get('danhsach', 'KhuVucController@getDanhSach');

        Route::get('sua/{MaKhuVuc}', 'KhuVucController@getSua');
        Route::post('sua/{MaKhuVuc}', 'KhuVucController@postSua');

        Route::get('them', 'KhuVucController@getThem');
        Route::post('them', 'KhuVucController@postThem');

        Route::get('xoa/{MaKhuVuc}', 'KhuVucController@getXoa');

    });
 //môn học

  Route::group(['prefix' => 'ad/monhoc'], function() {
        
        Route::get('danhsach', 'MonHocController@getDanhSach');

        Route::get('sua/{MaMonHoc}', 'MonHocController@getSua');
        Route::post('sua/{MaMonHoc}', 'MonHocController@postSua');

        Route::get('them', 'MonHocController@getThem');
        Route::post('them', 'MonHocController@postThem');

        Route::get('xoa/{MaMonHoc}', 'MonHocController@getXoa');

    });
 //Phòng học

   Route::group(['prefix' => 'ad/phonghoc'], function() {
        
        Route::get('danhsach', 'PhongHocController@getDanhSach');

        Route::get('sua/{MaPhongHoc}', 'PhongHocController@getSua');
        Route::post('sua/{MaPhongHoc}', 'PhongHocController@postSua');

        Route::get('them', 'PhongHocController@getThem');
        Route::post('them', 'PhongHocController@postThem');

        Route::get('xoa/{MaPhongHoc}', 'PhongHocController@getXoa');

    });
  //Kì thi
Route::get('ad/kithi','KiThiController@viewlist');
Route::get('ad/kithi/them','KiThiController@viewCreate');
Route::post('ad/kithi/savenew','KiThiController@postCreate');
Route::get('ad/kithi/{id}','KiThiController@viewUpdate');
Route::get('ad/kithi/chitiet/{id}','KiThiController@viewChiTiet');
Route::post('ad/kithi/save','KiThiController@postUpdate');
Route::get('ad/kithi/del/{id}','KiThiController@delete');



  //Thông báo
Route::get('ad/thongbao/','ThongBaoController@viewList');
Route::get('ad/thongbao/them','ThongBaoController@viewCreate' );
Route::post('ad/thongbao/save','ThongBaoController@postCreate');
Route::get('ad/thongbao/{id}','ThongBaoController@viewUpdate');
Route::post('ad/thongbao/update','ThongBaoController@postUpdate');
Route::get('ad/thongbao/del/{id}','ThongBaoController@delete');

//Đăng kí thi
Route::get('ad/dangkithi','DangkithiController@viewList');
Route::get('ad/dangkithi/them','DangkithiController@viewCreate');
Route::get('ad/dangkithi/{id}','DangkithiController@viewUpdate');
Route::post('ad/dangkithi/capnhat','DangkithiController@update');
Route::get('ad/dangkithi/del/{id}','DangkithiController@delete');
Route::get('ad/dangkithi/chitiet/{id}','DangkithiController@viewChitiet');

//Đăng kí học

Route::group(['prefix' => 'ad/phieudangki'], function() {
        
        Route::get('danhsach', 'PhieuDangKiController@getDanhSach');

        Route::get('sua/{id_PhieuDKHoc}', 'PhieuDangKiController@getSua');
        Route::post('sua/', 'PhieuDangKiController@postSua');

        Route::get('them', 'PhieuDangKiController@getThem');
        Route::post('them', 'PhieuDangKiController@postThem');

        Route::get('xoa/{id_PhieuDKHoc}', 'PhieuDangKiController@getXoa');

    });


//Hóa đơn thi

Route::get('ad/hoadon/','HoaDonController@viewList');
Route::post('ad/hoadon/them','HoaDonController@viewCreate');
Route::post('ad/hoadon/them/save','HoaDonController@postCreate');
Route::get('ad/hoadon/del/{id}','HoaDonController@delete');
Route::get('ad/hoadon/chitiet/{id}','HoaDonController@viewChitiet');

//Hóa đơn học
Route::group(['prefix' => 'ad/hoadonhoc'], function() {
        
        Route::get('danhsach', 'HoaDonDKHocController@getDanhSach');

        Route::get('chitiethoadondkhoc/{id_HoaDonDkHoc}', 'HoaDonDKHocController@getChiTiet');
       

        Route::get('them', 'HoaDonDKHocController@getThem');
        Route::post('them', 'HoaDonDKHocController@postThem');

        Route::get('xoa/{id_HoaDonDkHoc}', 'HoaDonDKHocController@getXoa');

    });
//Thời khóa biểu

    Route::group(['prefix' => 'ad/tkb'], function() {
        
        Route::get('danhsach', 'TKBController@getDanhSach');

        Route::get('sua/{id_TKB}', 'TKBController@show_tkb');
        Route::get('sua/chitiet/{id_TKB}', 'TKBController@getSua');

        Route::post('sua/edit', 'TKBController@postSua');
        Route::post('sua/them', 'TKBController@postSua_Them');
        Route::post('tao', 'TKBController@getTao');

        Route::get('sua/xoaphancong/{id_TKB}', 'TKBController@del');


        Route::get('them', 'TKBController@getThem');
        Route::post('tao/them', 'TKBController@postThem');

        Route::get('xoa/{id_TKB}', 'TKBController@getXoa');

    });
 //danh sách thi
Route::post('ad/kithi/chianhom','KiThiController@nhom');
Route::get('ad/kithi/danhsach/{id}','KiThiController@viewDS');
Route::post('ad/kithi/diemthi','DiemThiController@nhapDiem');
Route::get('ad/kithi/danhsach/del/{id}','KiThiController@delDS');
Route::get('ad/diemthi/del/{id}/{hv}','DiemThiController@del');
Route::get('download/{id}', 'DiemThiController@downloadList');
Route::get('download/{id}', 'DiemThiController@downloadList');
Route::get('ad/diemthi/chitiet/{id}/{hv}','DiemThiController@transcript');

//profile
Route::get('ad/myprofile/','CBTTController@profile');
Route::POST('ad/myprofile/save','CBTTController@saveprofile');
//Thống kê

Route::post('ad/thongke/dieukien','ThongKeController@getDieuKien');
Route::post('ad/thongkekithi/tk','ThongKeController@thong_ke_ki_thi');
Route::get('ad/thongkekithi',function(){
    return view('admin.thongke.thongkekithi');
});
Route::get('ad/thongkekhoahoc',function(){
    return view('admin.thongke.thongkekhoahoc');
});
Route::post('ad/thongkekhoa/tk','ThongKeController@thong_ke_khoa_hoc');

});
Route::get('test', function(){
    return view('admin.test');
});

Route::get('ad/thongkekithi/in/','ThongKeController@In_thong_ke_ki_thi')->name('thongkekithi');



