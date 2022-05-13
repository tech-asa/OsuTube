<header>
    <!-- ヘッダータイトル -->
    <div class="header-contents">
        <h1 class="header-title"><a href="/">Osu<span>Tube</span></a></h1>
    </div>

    <!-- ヘッダーログアウト機能 -->
    <div class="header-logout non-responsive">
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

    @if (Route::has('login'))
    @auth
    <div class="header-logout responsive-var">
        <button class="btn-menu" id="js-humberger">
            <div id=js-bar1></div>
            <div id=js-bar2></div>
            <div id=js-bar3></div>
        </button>
    </div>
    @endauth
    @endif   

    <!-- メニュー変化 -->
        <nav class="menu-list responsive-var">
            <ul>
                @if (Route::has('login'))
                @auth
                <a href="{{ route('user.index') }}">
                    <li>マイページ</li>
                </a>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input type="submit" value="ログアウト">
                    </form>
                </li>
                @endauth
                @endif   
            </ul>
        </nav>
</header>
