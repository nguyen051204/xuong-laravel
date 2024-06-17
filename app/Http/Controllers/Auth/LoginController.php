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
    return view('auth.login');
   }
   public function login(Request $request)//validate
   {
       $credentials = $request->validate([
           'email' => ['required', 'email'],
           'password' => ['required'],
       ]);

       if (Auth::attempt($credentials)) {
           $request->session()->regenerate();

           return redirect()->intended('/home');
       } // truy cap csdl kt du lieu dung k
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
