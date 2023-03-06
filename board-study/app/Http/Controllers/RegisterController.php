<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    // 회원가입 페이지
    public function index() {
        return view('auth.register');
    }

    // 회원가입
    public function store(Request $request) {
        $validation = $request->validate([
            'email'=>'required|email',
            'password'=>'required|confirmed',
            'name'=>'required'
        ]);

        $user = new User();
        $user->email = $validation['email'];

        // DB에 저장하는 비밀번호 해쉬 사용하기
        $user->password = Hash::make($validation['password']);
        $user->name = $validation['name'];
        $user->save();

        return redirect()->route('home');
    }
}
