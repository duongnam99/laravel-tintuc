<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function getDanhSach(){
        $user = User::orderBy('id','DESC')->get();
        return view('admin.user.danhsach',['user'=>$user]);
    }
    public function getThem(){
        return view('admin.user.them');
    }
    public function postThem(Request $request){
        $this->validate($request,
            [
                'name' => 'required|min:3',
                'email'=> 'required|email',
                'password'=> 'required|min:6|max:32',
                'passwordAgain'=> 'required|same:password',
            ],
            [
                'passwordAgain.required' => 'Bạn chưa nhập lại password',
                'passwordAgain.same' => 'Password nhập lại không đúng',
                'required' => ':attribute không được để trống',
                'min' => ':attribute không được nhỏ hơn :min kí tự',
                'max' => ':attribute không được lớn hơn :max kí tự',
            ],
            [
                'name' => 'Tên',
                'email' => 'Email',
                'password' => 'Password',
            ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = $request->quyen;
        $user->save();

        return redirect('admin/user/them')->with('thongbao','Bạn đã thêm thành công');
    }
    public function getSua($id){
        $user = User::find($id);
        return  view('admin.user.sua',['user'=> $user]);
    }
    public function postSua(Request $request,$id){
        $this->validate($request,
            [
                'name' => 'required|min:3',
            ],
            [
                'name.required' => 'Bạn chưa nhập tên người dùng',
                'name.min' => 'Tên phải có ít nhất 3 kí tự',
            ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->quyen = $request->quyen;
        if($request->changepass == 'on'){
            $this->validate($request,
                [
                    'password'=> 'required|min:6|max:32',
                    'passwordAgain'=> 'required|same:password',
                ],
                [
                    'password.required' => 'Bạn chưa nhập password',
                    'password.min' => 'Password phải có từ 6-32 kí tự',
                    'password.max' => 'Password phải có từ 6-32 kí tự',
                    'passwordAgain.required' => 'Bạn chưa nhập lại password',
                    'passwordAgain.same' => 'Password nhập lại không đúng',
                ]);
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect('admin/user/sua/'.$id)->with('thongbao','Bạn đã thêm thành công');
    }
    public function getXoa($id){
        $user = User::find($id);
        $user->delete();

        return redirect('admin/user/danhsach')->with('thongbao','Đã xóa thành công');
    }
    public function getDangnhapAdmin(){
        return view('admin.login');
    }
    public function postDangnhapAdmin(Request $request){
        $this->validate($request,
            [
                'email'=>'required',
                'password'=>'required|min:6|max:32',
            ],
            [
                'email.required' => 'Bạn chưa nhập email',
                'password.required' => 'Bạn chưa nhập password',
                'password.min' => 'password phải từ 6 đến 32 kí tự',
                'password.max' => 'password phải từ 6 đến 32 kí tự',
            ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('admin/theloai/danhsach');
        }else {
            return redirect('admin/dangnhap')->with('thongbao','Đăng nhập không thành công');
        }
    }
    public function getDangxuatAdmin(){
        Auth::logout();
        return redirect('admin/dangnhap');
    }
}
