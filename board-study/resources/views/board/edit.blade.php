@extends('layouts.app')

@section('content')

    <h2>Board Edit</h2>

    {{-- 유효성 검사 --}}
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{route('boards.update', $board->id)}}" method="post">
        @method('PATCH')
        @csrf
        <!--
            Form 메서드 Spoofing : 
            HTML form은 put, patch, delete 액션을 지원하지 않는다.
            -> method의 숨겨진 필드를 지정해야 한다.
            -> method 필드로 보내진 값은 HTTP request 메서드를 판별한다.
        -->
        <div>
            <label for="title">제목 입력</label>
            <input type="text" id="title" name="title" value="{{$board->title}}">
        </div>

        <div>
            <label for="content">내용 입력</label>
            <textarea name="content" id="content" cols="30" rows="10">
                {{$board->content}}
            </textarea>
        </div>

        <button type="submit">수정</button>
        
        <a href="{{URL::previous()}}">
            <button type="button">취소</button>
        </a>
    </form>

@endsection