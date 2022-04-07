<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request) 
    {
        $data = $request->all(); 
        $checkAuth = Auth::attempt([
            'email' => $data['email'], 
            'password' => $data['password']
        ]); 
        if($checkAuth) {
            return redirect()->route('admin.dashboard')->with('login-success', 'Chào mừng bạn đến với trang admin'); 
        }
        else {
            return redirect()->back()->with('login-error', 'Đăng nhập thất bại vui lòng thử lại'); 
        }
    }

    public function logout () 
    {
        Auth::logout();
        return redirect()->route('admin.login.view');
    }
}
