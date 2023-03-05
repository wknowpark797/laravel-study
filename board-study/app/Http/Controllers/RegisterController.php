<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    // 회원가입 페이지
    public function index() {
        return view('auth.register');
    }
}
