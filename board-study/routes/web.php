<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;

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

