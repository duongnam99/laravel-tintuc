<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Slide;
use App\User;
class PageController extends Controller
{
    function __construct()
    {
        $theloai = TheLoai::all();
        $slide = Slide::all();
        view()->share('theloai',$theloai);
        view()->share('slide',$slide);
    }

    function trangchu(){
        return view('pages.trangchu');
    }
    public function lienhe(){
        return view('pages.lienhe');
    }
    public function loaitin($id){
        $loaitin = LoaiTin::find($id);
        $tintuc = TinTuc::where('idLoaiTin', $id)->paginate(5);
        return view('pages.loaitin',['loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }
    public function tintuc($id){
        $tintuc = TinTuc::find($id);
        $tinnoibat = Tintuc::where('NoiBat',1)->take(4)->get();
        $tinlienquan = TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(4)->get();
        return view('pages.tintuc',['tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan]);
    }
    public function getDangnhap(){
        return view('pages.dangnhap');
    }
    public function postDangnhap(Request $request){
        $this->validate($request,
            [
                'email'=>'required',
                'password'=>'required|min:6|max:32',
            ],
            [
                'required' => 'Bạn chưa nhập :attribute',
                'min' => ':attribute không được ít hơn 6 kí tự',
                'max' => ':attribute không được nhiều hơn 32 kí tự',
            ],
            [
                'email' => 'Email',
                'password' => 'Password'
            ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('trangchu');
        }else {
            return redirect('dangnhap')->with('thongbao','Đăng nhập không thành công');
        }

    }
    public function getDangxuat(){
        Auth::logout();
        return redirect('trangchu');
    }
    public function getNguoidung(){
        return view('pages.nguoidung');
    }
    public function postNguoidung(Request $request){
        $this->validate($request,
            [
                'name' => 'required|min:3',
            ],
            [
                'name.required' => 'Bạn chưa nhập tên người dùng',
                'name.min' => 'Tên phải có ít nhất 3 kí tự',
            ]);
        $user = Auth::user();
        $user->name = $request->name;
        if($request->changepass == 'on'){
            $this->validate($request,
                [
                    'password'=> 'required|min:6|max:32',
                    'passwordAgain'=> 'required|same:password',
                ],
                [
                    'required' => 'Bạn chưa nhập :attribute',
                    'min' => ':attribute không được ít hơn 6 kí tự',
                    'max' => ':attribute không được nhiều hơn 32 kí tự',
                    'same' => 'Mật khẩu không đồng nhất'
                ],
                [
                    'password' => 'Mật khẩu',
                    'passwordAgain' => 'Mật khẩu nhập lại',
                ]);
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect('nguoidung')->with('thongbao','Bạn đã sửa thành công');
    }
    public function getDangky(){
        return view('pages.dangky');
    }
    public function postDangky(Request $request){
        $this->validate($request,
            [
                'password'=> 'required|min:6|max:32',
                'passwordAgain'=> 'required|same:password',
            ],
            [
                'required' => 'Bạn chưa nhập :attribute',
                'min' => ':attribute không được ít hơn 6 kí tự',
                'max' => ':attribute không được nhiều hơn 32 kí tự',
                'same' => 'Mật khẩu không đồng nhất'
            ],
            [
                'password' => 'Mật khẩu',
                'passwordAgain' => 'Mật khẩu nhập lại',
            ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = 0;
        $user->save();

        return redirect('dangky')->with('thongbao','Bạn đã đăng ký thành công');
    }
    public function timkiem(Request $request){
        $tukhoa = $request->tukhoa;
        $tintuc = TinTuc::where('TieuDe','like',"%$tukhoa%")->orWhere(
            'TomTat','like',"%$tukhoa%")->orWhere(
                'Noidung','like',"%$tukhoa%")->take(30)->paginate(5);
        return view('pages.timkiem',['tintuc'=>$tintuc,'tukhoa'=>$tukhoa]);
    }
}
