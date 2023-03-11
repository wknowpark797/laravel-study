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
        /**
         * view 라우트
         * view(URI, 뷰 파일의 이름, view에 제공할 데이터들의 배열);
         */
    }

    // 게시글 작성 페이지
    public function create() {
        return view('board.create');
    }

    // 게시글 추가하기
    /**
     * 의존성 주입 : 
     * 의존객체는 라라벨의 서비스 컨테이너에 의해서 자동으로 주입된다.
     * 
     * TODO: 서비스 컨테이너
     */
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
    /**
     * 파라미터와 의존성 주입 : 
     * 의존 객체 뒤에 라우트 파라미터를 나열해야 한다.
     */
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
