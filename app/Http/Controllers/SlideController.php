<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    //
    public function getDanhSach()
    {
        $slide=Slide::all();
        return view('admin.slide.danhsach',['slide'=>$slide]);
    }
    
    public function getThem()
    {
        return view('admin.slide.them');
    }
    public function postThem(Request $request)
        {
            $request->validate(
            [
                'Ten' =>'required|min:2|max:100',
                'NoiDung' => 'required',
            ],
            [
                'Ten.required' =>"Bạn chưa chọn tên loại tin",
                'Ten.min' => 'Tên tiêu đề quá ngắn',
                'Ten.max' => 'Tên tiêu đề quá dài',
                'NoiDung.required' =>"Vui lòng nhập nội dung",

            ]);
            $slide = new Slide();
            $slide->Ten=$request->Ten;
            $slide->NoiDung = $request->NoiDung;
            if($request->has('link'))
            
                $slide->link = $request->link;
            
            if($request->hasfile('Hinh'))
            {
                $file = $request->file('Hinh');
                $name = $file->getClientOriginalName();
                $Hinh = str_random(4)."_".$name;
                while(file_exists("upload/slide/".$Hinh))
                {
                    $Hinh = str_random(4)."_".$name;
                }
                $file->move("upload/slide",$Hinh);
                    $slide->Hinh = $Hinh;
            }
            else
            {
                $slide->Hinh ="";
            }

            $slide->save();
            return redirect('admin/slide/them')->with('thongbao','Đã thêm slide thành công');
            
        }


    public function getEdit($id)
    {
        $slide=Slide::find($id);
        return view('admin.slide.sua',['slide'=>$slide]);
    }
    public function postEdit(Request $request,$id)
    {
        $slide=Slide::find($id);
        $request->validate(
            [
                'Ten' =>'required|min:2|max:100',
                'NoiDung' => 'required',
            ],
            [
                'Ten.required' =>"Bạn chưa chọn tên loại tin",
                'Ten.min' => 'Tên tiêu đề quá ngắn',
                'Ten.max' => 'Tên tiêu đề quá dài',
                'NoiDung.required' =>"Vui lòng nhập nội dung",

            ]);
            $slide->Ten=$request->Ten;
            $slide->NoiDung = $request->NoiDung;
            if($request->has('link'))
            
                $slide->link = $request->link;
            
            if($request->hasfile('Hinh'))
            {
                $file = $request->file('Hinh');
                $name = $file->getClientOriginalName();
                $Hinh = str_random(4)."_".$name;
                while(file_exists("upload/slide/".$Hinh))
                {
                    $Hinh = str_random(4)."_".$name;
                }
                $file->move("upload/slide",$Hinh);
                    $slide->Hinh = $Hinh;
            }
            else
            {
                $slide->Hinh ="";
            }

            $slide->save();
            return redirect('admin/slide/danhsach')->with('thongbao','Đã sửa slide thành công');
            
        }
        public function getXoa($id)
        {
            $slide = Slide::find($id)->delete();
            return redirect('admin/slide/danhsach')->with('thongbao','Đã xóa thành công');
        }
}
