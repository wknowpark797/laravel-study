<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('home');
})->name('home');


Route::middleware('auth')->prefix('boards')->group(function() {

    // 게시판 목록 페이지
    Route::get('/', [BoardController::class, 'index'])->name('boards.index');

    // 게시글 작성 페이지
    Route::get('create', [BoardController::class, 'create'])->name('boards.create');

    // 게시글 추가하기
    Route::post('/', [BoardController::class, 'store'])->name('boards.store');

    // 게시글 상세 페이지
    Route::get('{id}', [BoardController::class, 'show'])->name('boards.show');

    // 게시글 수정 페이지
    Route::get('{id}/edit', [BoardController::class, 'edit'])->name('boards.edit');

    // 게시글 수정하기
    Route::patch('{id}', [BoardController::class, 'update'])->name('boards.update');

    // 게시글 삭제하기
    Route::delete('{id}', [BoardController::class, 'destroy'])->name('boards.destroy');

});


// 회원가입 페이지
Route::get('/auth/register', [RegisterController::class, 'index'])->name('auth.register.index');

// 회원가입
Route::post('/auth/register', [RegisterController::class, 'store'])->name('auth.register.store');

// 로그인 페이지
Route::get('/auth/login', [LoginController::class, 'index'])->name('auth.login.index');

// 로그인
Route::post('/auth/login', [LoginController::class, 'login'])->name('auth.login.attempt');

// 로그아웃
Route::post('/auth/logout', [LoginController::class, 'logout'])->name('auth.logout');