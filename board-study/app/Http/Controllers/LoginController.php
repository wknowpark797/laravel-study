<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // 로그인 페이지
    public function index() {
        return view('auth.login');
    }

    // 로그인
    public function login(Request $request) {
        $loginInfo = $request->only(['email', 'password']);

        if(auth()->attempt($loginInfo)) {
            return redirect()->route('home');
        } else {
            return redirect()->route('auth.login.index');
        }
    }

    // 로그아웃
    public function logout() {
        auth()->logout();
        return redirect()->route('home');
    }
}
