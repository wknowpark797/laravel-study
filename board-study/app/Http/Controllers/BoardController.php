<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Board;

class BoardController extends Controller
{
    /**
     * 게시판 목록 페이지
     */
    public function index() {
        return view('board.index', ['boards'=>Board::all()]);
    }
}
