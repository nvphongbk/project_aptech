<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\TheLoai;
use App\Slide;
use App\LoaiTin;
use App\TinTuc;
use App\User;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    function __construct()
    {
        $theloai = TheLoai::all();
        view()->share('theloai',$theloai);
        $slide = Slide::all();
        view()->share('slide',$slide);
    }

    function trangchu()
    {
      
        return view('pages.trangchu');
    }
    function lienhe()
    {
       
        return view('pages.lienhe');
    }
    function loaitin($id)
    {
        $loaitin= LoaiTin::find($id);
        $tintuc = TinTuc::where('idLoaiTin',$id)->paginate(5);
        return view('pages.loaitin',['loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }
    function tintuc($id)
    {
        $tintuc = TinTuc::find($id);
        $tinnoibat = TinTuc::where('NoiBat',1)->take(5)->get();
        $tinlienquan = TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(4)->get();
        return view('pages.tintuc',['tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan]);
    }
    function getDangnhap()
    {
        return view('pages.dangnhap');
    }
    function postDangNhap(Request $request)
    {
        $request->validate(
            [
                'email'=>'required',
                'password'=>'required',
            ],
            [
                'email.required'=>'Nhập email',
                'password.required' =>'Nhập password',
            ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('trangchu');
        }
        else
        {
            return redirect('dangnhap')->with('thongbao','Email hoặc mật khẩu không chính xác');
        }
    }
    public function getDangXuat()
    {
        Auth::logout();
        return redirect('dangnhap');
    }
    public function getNguoiDung()
        {
            return view('pages.nguoidung');
        }
    public function postNguoiDung(Request $request)
        {
            $request->validate(
                [
                    'name'=>'required|min:2|max:50',
                    'password' => 'required|min:6',
                    'passwordAgain' => 'required|same:password'
        
                ],
                [
                    'name.required' =>"Vui lòng nhập tên",
                    'name.min' => 'Tên quá ngắn',
                    'name.max' => 'Tên quá dài',
                    'password.required' => 'Vui lòng nhập mật khẩu',
                    'password.min' => ' Mật khẩu quá ngắn, phải dài hơn 6 ký tự',
                    'passwordAgain.same'=>'Mật khẩu xác nhận chưa giống mật khẩu',
                    'passwordAgain.required'=>'Vui lòng nhập mật khẩu xác nhận'
        
                ]);
                $user = Auth::user();
                $user->name = $request->name;
                $user->password =bcrypt($request ->password);
                $user->save();
                return redirect('nguoidung')->with('thongbao','Đã sửa thành công');
        }
        public function getDangKy()
            {
                return view('pages.dangky');
            }
        public function postDangKy(Request $request)
            {
                $request->validate(
            [
                'name'=>'required|min:2|max:50',
                'email' => 'required|unique:users,email|min:6|max:50',
                'password' => 'required|min:6',
                'passwordAgain' => 'required|same:password'
            ],
            [
                'name.required' =>"Vui lòng nhập tên",
                'name.min' => 'Tên quá ngắn',
                'name.max' => 'Tên quá dài',
                'email.required' => 'vui lòng nhập email',
                'email.unique' => 'Email đã tồn tại',
                'email.min' => 'email quá ngắn',
                'email.max' => 'email quá dài',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => ' Mật khẩu quá ngắn, phải dài hơn 6 ký tự',
                'passwordAgain.same'=>'Mật khẩu xác nhận chưa giống mật khẩu',
                'passwordAgain.required'=>'Vui lòng nhập mật khẩu xác nhận'
            ]);
             $user = new User;
             $user->name = $request->name;
             $user->email = $request->email;
             $user->password =bcrypt($request ->password);
             $user ->save();
             return redirect('dangnhap')->with('thongbao','Bạn đã đăng ký thành công, vui lòng đăng nhâp');
            }

            public function TimKiem(Request $request)
            {
                $tukhoa = $request->tukhoa;
                $tintuc = TinTuc::where('TieuDe','like',"%$tukhoa%")->orWhere('TomTat','like',"%$tukhoa%")->orWhere('NoiDung','like',"%$tukhoa%")->take(30)->paginate(10);
                return view('pages.timkiem',['tintuc'=>$tintuc,'tukhoa'=>$tukhoa]);
            }
}
