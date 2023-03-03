@extends('board.layout')

@section('content')

    <h2>{{$board->title}}</h2>
    <p>작성자 : {{$board->nickname}}</p>
    <p>작성 날짜 : {{$board->created_at}}</p>
    <div>
        {{$board->content}}
    </div>

@endsection