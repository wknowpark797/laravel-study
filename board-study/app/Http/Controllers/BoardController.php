<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Board;

class BoardController extends Controller
{
    /**
     * 권장되는 컨트롤러 액션명 참고
     */


    // 게시판 목록 페이지
    public function index() {
        return view('board.index', ['boards'=>Board::all()]);
    }

    // 게시글 작성 페이지
    public function create() {
        return view('board.create');
    }

    // 게시글 추가하기
    public function store(Request $request) {
        $request = $request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);

        $board = new Board();
        $board->nickname = 'admin';
        $board->title = $request->input('title');
        $board->content = $request->input('content');
        $board->save();

        return redirect()->route('boards.index');
    }

    // 게시글 상세 페이지
    public function show($id) {
        $board = Board::where('id', $id)->first();
        return view('board.show', compact('board'));
    }

}
