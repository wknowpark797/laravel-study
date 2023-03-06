@extends('layouts.app')

@section('content')

    <h2>로그인</h2>

    {{-- 유효성 검사 --}}
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{route('auth.login.attempt')}}" method="post">
        @csrf
        <div>
            <label for="email">이메일</label>
            <input type="email" id="email" name="email">
        </div>

        <div>
            <label for="password">비밀번호</label>
            <input type="password" id="password" name="password">
        </div>

        <button type="submit">로그인</button>

        <a href="{{URL::previous()}}">
            <button type="button">취소</button>
        </a>
    </form>

@endsection