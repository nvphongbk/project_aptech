<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;

class LoaiTinController extends Controller
{
    //
    public function getDanhSach()
    {
        $loaitin=LoaiTin::all();
        return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }

    public function getThem()
    {   
        $theloai = TheLoai::all();
        return view('admin.loaitin.them',['theloai'=>$theloai]);
    }
    public function postThem(Request $request)
    {
        $request->validate(
            [
                'Ten'=>'required|unique:LoaiTin,Ten|min:2|max:50'
            ],
            [
                'Ten.required' =>"bạn chưa nhập tên thể loại",
                'Ten.unique'=>"Tên loại tin này đã tồn tại",
                'Ten.min' => 'Tên quá ngắn',
                'Ten.max' => 'Tên quá dài',
            ]);
            $loaitin = new LoaiTin();
            $loaitin->Ten=$request->Ten;
            $loaitin->idTheLoai = $request->TheLoai;
            $loaitin->save();
            return redirect('admin/loaitin/danhsach')->with('thongbao','Đã thêm loại tin');
    }

    public function getEdit($id){
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::find($id);
        return view('admin.loaitin.sua',['loaitin'=>$loaitin,'theloai'=>$theloai]);
    }

    public function postEdit(Request $request,$id)
    {
        $request->validate(
            [
                'Ten'=>'required|unique:TheLoai,Ten|min:2|max:50'
            ],
            [
                'Ten.required' =>"Bạn chưa nhập tên loại tin",
                'Ten.min' => 'Tên quá ngắn',
                'Ten.max' => 'Tên quá dài',
                'Ten.unique'=>"Tên thể loại đã tồn tại"
            ]);
        $loaitin=LoaiTin::find($id);
        $loaitin->Ten=$request->Ten;
        $loaitin->idTheLoai=$request->TheLoai;
        $loaitin->save();
        return redirect('admin/loaitin/danhsach')->with('thongbao','Đã sửa loại tin thành công');
    }

    public function postXoa($id)
    {
        $loaitin=LoaiTin::find($id)->delete();
        return redirect('admin/loaitin/danhsach')->with('thongbao','Đã xóa loại tin thành công');
    }
}
