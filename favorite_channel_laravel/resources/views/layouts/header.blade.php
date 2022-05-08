<header>
    <div class="header-contents">
        <h1 class="header-title"><a href="/">Osu<span>Tube</span></a></h1>
        <!-- <p class="header-subtext"></p> -->
    </div>
    <div class="header-logout">
        @if (Route::has('login'))
        @auth
        <a href="{{ route('user.index') }}">
            <input class="btn btn-outline-primary" type="submit" value="マイページ">
        </a>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <input class="btn btn-outline-primary" type="submit" value="ログアウト">
        </form>
        @endauth
        @endif   
    </div>
</header>
