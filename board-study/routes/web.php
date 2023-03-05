<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', function () {
    return view('welcome');
});

// 게시판 목록 페이지
Route::get('/boards', [BoardController::class, 'index'])->name('boards.index');

// 게시글 작성 페이지
Route::get('/boards/create', [BoardController::class, 'create'])->name('boards.create');

// 게시글 추가하기
Route::post('/boards', [BoardController::class, 'store'])->name('boards.store');

// 게시글 상세 페이지
Route::get('/boards/{id}', [BoardController::class, 'show'])->name('boards.show');

// 게시글 수정 페이지
Route::get('/boards/{id}/edit', [BoardController::class, 'edit'])->name('boards.edit');

// 게시글 수정하기
Route::patch('/boards/{id}', [BoardController::class, 'update'])->name('boards.update');

// 게시글 삭제하기
Route::delete('/boards/{id}', [BoardController::class, 'destroy'])->name('boards.destroy');

// 회원가입 페이지
Route::get('/auth/register', [RegisterController::class, 'index'])->name('auth.register.index');