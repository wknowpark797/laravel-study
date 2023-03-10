@extends('layouts.app')

@section('content')

    <h2>Board Create</h2>

    {{-- 유효성 검사 --}}
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{route('boards.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">제목 입력</label>
            <input type="text" id="title" name="title">
        </div>

        <div>
            <label for="content">내용 입력</label>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
        </div>

        <div>
            <label for="picture">파일 업로드</label>
            <input type="file" id="picture" name="picture">
        </div>

        <button type="submit">추가</button>
        
        <a href="{{route('boards.index')}}">
            <button type="button">목록</button>
        </a>
    </form>

@endsection