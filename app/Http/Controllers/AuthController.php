<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('pages.login'); 
    }

    public function login(Request $request)
    {
        $user = User::where('user_name', $request->user_name)->first();

        if ($user) {
            if ($request->user_password === $user->user_password) {
                // Đăng nhập thành công
                return redirect()->intended('home');
            }
        }

        // Đăng nhập thất bại
        return redirect()->back()->with('message', 'Tên đăng nhập hoặc mật khẩu không đúng.');
    }
}