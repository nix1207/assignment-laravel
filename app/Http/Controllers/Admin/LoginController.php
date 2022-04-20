<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * @param Request $request
     */
    public function index(Request $request) 
    {
        $data = $request->all(); 
        $checkAuth = Auth::attempt([
            'email' => $data['email'], 
            'password' => $data['password']
        ]); 
        
        if($checkAuth) {
          $checkUserStatus =  User::where('email', $data['email'])->first(); 
          if($checkUserStatus->status == 0){
            return redirect()->route('admin.login.view')->with('login-fail', 'Tài khoản chưa được cấp quyền để vào admin');
          }
          elseif($checkUserStatus->status == 1) {
            return redirect()->route('admin.dashboard')->with('login-success', 'Chào mừng bạn đến với trang admin'); 
          }
        }
        else {
            return redirect()->back()->with('login-error', 'Tài khoản mật khẩu không chính xác'); 
        }
    }

    /**
     * 
     */
    public function logout () 
    {
        Auth::logout();
        return redirect()->route('admin.login.view');
    } 

    public function login () 
    {
      if(auth()->check() && auth()->user()->status == 1) {
        return redirect()->route('admin.dashboard');
      }
      return view('admin.login'); 
    }
}
