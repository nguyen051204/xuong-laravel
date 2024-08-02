<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function showFormLogin()
   {
    return view('login');
   }
   public function login(Request $request)//validate
   {
       $credentials = $request->validate([
           'email' => ['required', 'email'],
           'password' => ['required'],
       ]);

       // Kiểm tra thông tin đăng nhập
       if (Auth::attempt($credentials)) {
           // Tạo phiên làm việc mới
           $request->session()->regenerate();

           // Chuyển hướng đến trang chính
           return redirect('/');
       }

       // Nếu đăng nhập không thành công, quay lại trang đăng nhập với thông báo lỗi
       return back()->withErrors([
           'email' => 'Sai thông tin đăng nhập',
       ])->onlyInput('email');


   }
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();//invalidate xoa ss cos tren ht
        return redirect('/');
    }
}
