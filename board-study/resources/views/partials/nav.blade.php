<nav>
    <a href="{{route('home')}}">홈</a>
    <a href="{{route('boards.index')}}">게시판</a>

    @guest()
        <a href="{{route('auth.register.index')}}">회원가입</a>
        <a href="{{route('auth.login.index')}}">로그인</a>
    @endguest

    @auth()
        <span>{{auth()->user()->name}} 님 안녕하세요</span>
        <form action="{{route('auth.logout')}}" method="post">
            @csrf
            <button type="submit">로그아웃</button>
        </form>
    @endauth
    
</nav>