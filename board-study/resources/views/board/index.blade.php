@extends('layout')

@section('content')

    <h2>Board List</h2>

    <table>
        <thead>
            <tr>
                <th>글번호</th>
                <th>작성자</th>
                <th>글제목</th>
                <th>작성날짜</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($boards as $board)
                <tr>
                    <td>{{$board->id}}</td>
                    <td>{{$board->nickname}}</td>
                    <td>
                        <a href="{{route('boards.show', $board->id)}}">{{$board->title}}</a>
                    </td>
                    <td>{{$board->created_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        <a href="{{route('boards.create')}}">
            <button type="button">글쓰기</button>
        </a>
    </div>

@endsection