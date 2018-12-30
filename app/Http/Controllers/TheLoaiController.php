<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;

class TheLoaiController extends Controller
{
    //
    public function getDanhSach()
    {
        $theloai=TheLoai::all();
        return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }
    public function getSua()
    {

    }
    public function getThem()
    {
        return view('admin.theloai.them');
    }
    public function postThem(Request $request)
    {
        $request->validate(
        [
            'Ten'=>'required|min:2|max:50'
        ],
        [
            'Ten.required' =>"bạn chưa nhập tên thể loại",
            'Ten.min' => 'Tên quá ngắn',
            'Ten.max' => 'Tên quá dài',
        ]);
        $theloai = new TheLoai();
        $theloai->Ten=$request->Ten;
        $theloai->save();
        return redirect('admin/theloai/them')->with('thongbao','Thêm thể loại thành công');
    }


    public function getEdit($id)
    {
        $theloai=TheLoai::find($id);
        return view('admin.theloai.sua',['theloai'=>$theloai]);
    }
    public function postEdit(Request $request,$id)
    {
        $theloai=TheLoai::find($id);
        $request->validate(
            [
                'Ten'=>'required|unique:TheLoai,Ten|min:2|max:50'
            ],
            [
                'Ten.required' =>"Bạn chưa nhập thể loại",
                'Ten.min' => 'Tên quá ngắn',
                'Ten.max' => 'Tên quá dài',
                'Ten.unique'=>"Tên thể loại đã tồn tại"
            ]);
        $theloai->Ten=$request->Ten;
        $theloai->save();
        return redirect('admin/theloai/danhsach')->with('thongbao','Đã sửa thể loại thành công');
    }
    public function postXoa($id){
        $theloai=TheLoai::find($id)->delete();
        return redirect('admin/theloai/danhsach')->with('thongbao','Đã xóa thể loại thành công');

    }
}
