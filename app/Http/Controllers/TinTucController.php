<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\TheLoai;
use App\LoaiTin;
use App\Comment;
class TinTucController extends Controller
{
    //
    public function getDanhSach()
    {
        $tintuc = TinTuc::orderBy('id','DESC')->get();
        return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }
    public function getThem()
        {
            $theloai = TheLoai::all();
            $loaitin = LoaiTin::all();
            return view('admin.tintuc.them',['theloai'=>$theloai],['loaitin'=>$loaitin]);
        }
        public function postThem(Request $request)
        {
            $request->validate(
            [
                'LoaiTin'=>'required',
                'TieuDe' =>'required|min:2',
                'TomTat' =>'required',
                'NoiDung' => 'required',
            ],
            [
                'LoaiTin.required' =>"Bạn chưa chọn tên loại tin",
                'TieuDe.min' => 'Tên tiêu đề quá ngắn',
                'TieuDe.required' =>'Vui lòng nhập tiêu đề',
                'TomTat.required' =>"Vui lòng nhập tóm tắt",
                'NoiDung.required' =>"Vui lòng nhập nội dung",

            ]);
            $tintuc = new TinTuc();
            $tintuc->TieuDe=$request->TieuDe;
            $tintuc->idLoaitin = $request->LoaiTin;
            $tintuc->NoiDung = $request->NoiDung;
            $tintuc->TomTat = $request->TomTat;
            $tintuc->SoLuotXem  = 0;
            $tintuc->NoiBat = $request->NoiBat;
            if($request->hasfile('Hinh'))
            {
                $file = $request->file('Hinh');
                $name = $file->getClientOriginalName();
                $Hinh = str_random(4)."_".$name;
                while(file_exists("upload/tintuc/".$Hinh))
                {
                    $Hinh = str_random(4)."_".$name;
                }
                $file->move("upload/tintuc",$Hinh);
                $tintuc->Hinh = $Hinh;
            }
            else
            {
                $tintuc->Hinh ="";
            }

            $tintuc->save();
            return redirect('admin/tintuc/danhsach')->with('thongbao','Đã thêm tin tức');
            
        }

        public function getEdit($id)
        { 
            $theloai = TheLoai::all();
            $loaitin = LoaiTin::all();
            $tintuc= TinTuc::find($id);
            return view('admin.tintuc.sua',['tintuc'=>$tintuc,'loaitin'=>$loaitin,'theloai'=>$theloai]);
        }
        public function postEdit(Request $request,$id)
        {
            $tintuc =TinTuc::find($id);
            $request->validate(
                [
                    'LoaiTin'=>'required',
                    'TieuDe' =>'required|min:2|',
                    'TomTat' =>'required',
                    'NoiDung' => 'required',
                ],
                [
                    'LoaiTin.required' =>"Bạn chưa chọn tên loại tin",
                    'TieuDe.min' => 'Tên tiêu đề quá ngắn',
                    'TieuDe.required' =>'Vui lòng nhập tiêu đề',
                    'TomTat.required' =>"Vui lòng nhập tóm tắt",
                    'NoiDung.required' =>"Vui lòng nhập nội dung",
    
                ]);
            $tintuc->TieuDe=$request->TieuDe;
            $tintuc->idLoaitin = $request->LoaiTin;
            $tintuc->NoiDung = $request->NoiDung;
            $tintuc->TomTat = $request->TomTat;
            $tintuc->NoiBat = $request->NoiBat;
            if($request->hasfile('Hinh'))
            {
                $file = $request->file('Hinh');
                $name = $file->getClientOriginalName();
                $Hinh = str_random(4)."_".$name;
                while(file_exists("upload/tintuc/".$Hinh))
                {
                    $Hinh = str_random(4)."_".$name;
                }
                $file->move("upload/tintuc",$Hinh);
                $tintuc->Hinh = $Hinh;
            }
            else
            {
                $tintuc->Hinh ="";
            }
            $tintuc->save();
            return redirect('admin/tintuc/sua/'.$id)->with('thongbao',"Đã sửa thành công");
        }
        public function getXoa($id)
        {
            $tintuc = TinTuc::find($id)->delete();
            return redirect("admin/tintuc/danhsach")->with('thongbao','Đã xóa thành công');
        }
        
}
