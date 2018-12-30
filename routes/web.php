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
use App\TheLoai;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\LoaiTinController;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dangnhap','UserController@getDangNhapAdmin');
Route::post('admin/dangnhap','UserController@postDangNhapAdmin');
Route::get('admin/dangxuat','UserController@getDangXuatAdmin');


Route::group(['prefix'=>'admin','middleware'=>'AdminLogin'],function(){
    Route::group(['prefix'=>'theloai'],function(){
        Route::get('danhsach','TheLoaiController@getDanhSach');

        Route::get('sua/{id}', 'TheLoaiController@getEdit');
        Route::post('sua/{id}','TheLoaiController@postEdit');

        Route::get('them','TheLoaiController@getThem');
        Route::post('them','TheLoaiController@postThem');

        Route::get('xoa/{id}','TheLoaiController@postXoa');

    });
    Route::group(['prefix'=>'loaitin'],function(){
        Route::get('danhsach','LoaiTinController@getDanhSach');
        
        Route::get('sua/{id}', 'LoaiTinController@getEdit');
        Route::post('sua/{id}','LoaiTinController@postEdit');

        Route::get('them','LoaiTinController@getThem');
        Route::post('them','LoaiTinController@postThem');

        Route::get('xoa/{id}','LoaiTinController@postXoa');
    });
    Route::group(['prefix'=>'tintuc'],function(){
        Route::get('danhsach','TinTucController@getDanhSach');
        
        Route::get('them','TinTucController@getThem');
        Route::post('them','TinTucController@postThem');

        Route::get('sua/{id}','TinTucController@getEdit');
        Route::post('sua/{id}','TinTucController@postEdit');

        Route::get('xoa/{id}','TinTucController@getXoa');
    });

    Route::group(['prefix'=>'ajax'],function(){
        Route::get('loaitin/{idTheLoai}','AjaxController@getLoaiTin');
    });

    Route::group(['prefix'=>'comment'],function(){
        Route::get('xoa/{id}/{idTinTuc}','CommentController@getXoa');
    });

    Route::group(['prefix'=>'slide'],function(){
        Route::get('danhsach','SlideController@getDanhSach');
        
        Route::get('them','SlideController@getThem');
        Route::post('them','SlideController@postThem');

        Route::get('sua/{id}','SlideController@getEdit');
        Route::post('sua/{id}','SlideController@postEdit');

        Route::get('xoa/{id}','SlideController@getXoa');
    });

    Route::group(['prefix'=>'user'],function(){
        Route::get('danhsach','UserController@getDanhSach');
        
        Route::get('them','UserController@getThem');
        Route::post('them','UserController@postThem');

        Route::get('sua/{id}','UserController@getEdit');
        Route::post('sua/{id}','UserController@postEdit');

        Route::get('xoa/{id}','UserController@getXoa');
    });
});

Route::post('timkiem','PagesController@TimKiem');
Route::get('dangky','PagesController@getDangKy');
Route::post('dangky','PagesController@postDangKy');
Route::get('nguoidung','PagesController@getNguoiDung');
Route::post('nguoidung','PagesController@postNguoiDung');
Route::get('trangchu','PagesController@trangchu');
Route::get('lienhe','PagesController@lienhe');
Route::get('loaitin/{id}','PagesController@loaitin');
Route::get('tintuc/{id}','PagesController@tintuc');
Route::get('dangnhap','PagesController@getDangNhap');
Route::post('dangnhap','PagesController@postDangNhap');
Route::get('dangxuat','PagesController@getDangXuat');
Route::get('comment','PagesController@getComment');
Route::post('comment/{id}','CommentController@postComment');

