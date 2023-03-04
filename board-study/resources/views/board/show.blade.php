@extends('board.layout')

@section('content')

    <h2>{{$board->title}}</h2>
    <p>작성자 : {{$board->nickname}}</p>
    <p>작성 날짜 : {{$board->created_at}}</p>
    <div>
        {{$board->content}}
    </div>

    <a href="{{route('boards.edit', $board->id)}}">
        <button type="button">수정하기</button>
    </a>

@endsection