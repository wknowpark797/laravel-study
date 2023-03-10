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
        $validation = $request->validate([
            'picture'=>'image|mimes:jpeg,jpg,png,gif,svg',
            'title'=>'required',
            'content'=>'required'
        ]);

        $board = new Board();
        $board->user_id = auth()->user()->id;
        $board->nickname = auth()->user()->name;
        $board->title = $validation['title'];
        $board->content = $validation['content'];

        // 파일 업로드
        if($request->hasFile('picture')) {
            $fileName = time().'_'.$request->file('picture')->getClientOriginalName();
            $path = $request->file('picture')->storeAs('public/images', $fileName);
            $board->image_name = $fileName;
            $board->image_path = $path;
        }

        $board->save();

        return redirect()->route('boards.show', $board->id);
    }

    // 게시글 상세 페이지
    public function show($id) {
        $board = Board::where('id', $id)->first();
        return view('board.show', compact('board'));
    }

    // 게시글 수정 페이지
    public function edit($id) {
        $board = Board::where('id', $id)->first();
        return view('board.edit', compact('board'));
    }

    // 게시글 수정하기
    public function update(Request $request, $id) {
        $validation = $request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);

        $board = Board::where('id', $id)->first();
        $board->title = $validation['title'];
        $board->content = $validation['content'];
        $board->save();

        return redirect()->route('boards.index');
    }

    // 게시글 삭제하기
    public function destroy($id) {
        $board = Board::where('id', $id)->first();
        $board->delete();
        
        return redirect()->route('boards.index');
    }

}
