<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\TheLoai;



class UserController extends Controller
{
    public function getDanhSach()
    {
        $user = User::all();
        return view('admin.user.danhsach',['user'=>$user]);
    }
    public function getThem()
    {
        return view('admin.user.them');
    }
    public function postThem(Request $request)
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
             $user->quyen = $request ->quyen;
             
             $user ->save();
             return redirect('admin/user/danhsach')->with('thongbao','Đã thêm người dùng thành công');
    }
    public function getEdit($id)
    {
        $user = User::find($id);
        return view('admin.user.sua',['user'=>$user]);
    }
    public function postEdit(Request $request,$id)
    {
        $user = User::find($id);
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
        $user->name = $request->name;
        $user->password =bcrypt($request ->password);
        $user->quyen = $request ->quyen;
        $user->save();
        return redirect('admin/user/danhsach')->with('thongbao','Đã sửa thành công');
    }
    public function getXoa($id)
    {
        $user = User::find($id)->delete();
        return redirect('admin/user/danhsach')->with('thongbao','Đã xóa thành công');
    }
    public function getDangNhapAdmin()
    {
        return view('admin.login');
    }
    public function postDangNhapAdmin(Request $request)
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
                return redirect('admin/tintuc/danhsach');
            }
            else
            {
                return redirect('admin/dangnhap')->with('thongbao','Email hoặc mật khẩu không chính xác');
            }
        }
        public function getDangXuatAdmin()
        {
            Auth::logout();
            return redirect('admin/dangnhap');
        }
}
