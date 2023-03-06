@extends('layouts.app')

@section('content')

    <h2>{{$board->title}}</h2>
    <p>작성자 : {{$board->nickname}}</p>
    <p>작성 날짜 : {{$board->created_at}}</p>
    <div>
        {{$board->content}}
    </div>

    <a href="{{route('boards.edit', $board->id)}}">
        <button type="button">수정</button>
    </a>

    <form action="{{route('boards.destroy', $board->id)}}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit">삭제</button>
    </form>

    <a href="{{route('boards.index')}}">
        <button type="button">목록</button>
    </a>

@endsection