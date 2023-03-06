@extends('layouts.app')

@section('content')

    <h2>회원가입</h2>

    {{-- 유효성 검사 --}}
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{route('auth.register.store')}}" method="post">
        @csrf
        <div>
            <label for="email">이메일</label>
            <input type="email" id="email" name="email">
        </div>

        <div>
            <label for="password">비밀번호</label>
            <input type="password" id="password" name="password">
        </div>

        <div>
            <label for="password_confirmation">비밀번호 확인</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>

        <div>
            <label for="name">이름</label>
            <input type="text" id="name" name="name">
        </div>

        <button type="submit">가입</button>

        <a href="{{URL::previous()}}">
            <button type="button">취소</button>
        </a>
    </form>

@endsection