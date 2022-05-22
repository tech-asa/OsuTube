@push('css')
    <link href="{{ asset('css/channel.css') }}" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('title', 'OsuTube | チャンネル検索結果一覧')
 
@section('content')
<main>
    <!-- 検索モーダル -->
    <div id="js-modal-background"></div>
    <div class="search-modal" id="js-search-modal">
        <div class="modal-header">
            <h4 class="modal-title">SEARCH</h4>
            <p class="modal-subtitle">気になりそうな配信者を探してみよう！</p>
        </div>
        <form class="categories" action="{{ route('channel.index') }}" method="GET">
            @csrf
            <div class="category">
                <h5 class="category-title">ジャンル</h5>
                <select class="form-select form-select-sm"  aria-label=".form-select-sm example" id="Genre" name="genre">
                    <option value="">-- 指定無し --</option>
                    <option value="エンタメ">エンタメ</option>
                    <option value="ビジネス・学び">ビジネス・学び</option>
                    <option value="バラエティ">バラエティ</option>
                    <option value="商品紹介・レビュー">商品紹介・レビュー</option>
                    <option value="ゲーム実況">ゲーム実況</option>
                    <option value="料理・レシピ">料理・レシピ</option>
                    <option value="メイク・ファッション">メイク・ファッション</option>
                    <option value="ハウツー・雑学">ハウツー・雑学</option>
                    <option value="健康・フィットネス">健康・フィットネス</option>
                    <option value="アウトドア">アウトドア</option>
                    <option value="夫婦・カップル">夫婦・カップル</option>
                    <option value="ペット・生き物">ペット・生き物</option>
                    <option value="音楽">音楽</option>
                    <option value="ギャンブル・娯楽">ギャンブル・娯楽</option>
                    <option value="Vtuber">Vtuber</option>
                    <option value="大食い">大食い</option>
                    <option value="ラジオ">ラジオ</option>
                    <option value="ブログ">ブログ</option>
                    <option value="BGM">BGM</option>
                    <option value="その他">その他</option>
                </select>
            </div>
            <div class="category">
                <h5 class="category-title">主な投稿動画</h5>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="streaming-method" name="streaming_method">
                    <option value="">-- 指定無し --</option>
                    <option value="Live配信">Live配信</option>
                    <option value="編集動画">編集動画</option>
                    <option value="ショート動画">ショート動画</option>
                    <option value="その他">その他</option>
                </select>
            </div>
            <div class="category">
                <h5 class="category-title">性別</h5>
                <select class="form-select form-select-sm"  aria-label=".form-select-sm example" id="gender" name="gender">
                    <option value="">-- 指定無し --</option>
                    <option value="男性">男性</option>
                    <option value="女性">女性</option>
                    <option value="複数人">複数人</option>
                    <option value="その他">その他</option>
                </select>
            </div>
            <div class="category">
                <h5 class="category-title">声質</h5>
                <select class="form-select form-select-sm"  aria-label=".form-select-sm example" id="voice" name="voice">
                    <option value="">-- 指定無し --</option>
                    <option value="高め">高め</option>
                    <option value="普通">普通</option>
                    <option value="低め">低め</option>
                    <option value="機械音声(指定無し)">機械音声(指定無し)</option>
                    <option value="機械音声(高め)">機械音声(高め)</option>
                    <option value="機械音声(普通)">機械音声(普通)</option>
                    <option value="機械音声(低め)">機械音声(低め)</option>
                    <option value="その他">その他</option>
                </select>
            </div>
            <div class="category">
                <h5 class="category-title">配信者情報</h5>
                <select class="form-select form-select-sm"  aria-label=".form-select-sm example" id="distributor" name="distributor">
                    <option value="">-- 指定無し --</option>
                    <option value="音声のみ">音声のみ</option>
                    <option value="本人顔出し">本人顔出し</option>
                    <option value="2Dモデル">2Dモデル</option>
                    <option value="Vtuber">Vtuber</option>
                    <option value="その他">その他</option>
                </select>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto search-buttom">
                <button class="btn btn-outline-success" type="submit">検索</button>
            </div>
        </form>
    </div>

    <!-- メイン部分 -->
    <div class="contents">
        <div class="search-header">
            <h5 class="search-result-text">検索結果</h5>
            @if(!isset($channels[0]))
            <h4>条件に当てはまる投稿がありませんでした。</h4>
            <p>お手数ですが検索条件を変更の上、再度検索ください。</p>
            @else
            <p>以下の配信者の方が条件にヒットしました。</p>
            @endif
            <button id="js-search" type="button" class="btn btn-success">条件を変えてもう一度検索</button>
        </div>

        <div class="main-content">

            <!-- サイドバー -->
            <div class="user-infomations">
                <div class="register-contents">
                    <h4 class="title">ユーザー情報</h4>
                    @if (Route::has('login'))
                    @auth
                    <div class="user-image">
                        <img src="{{ asset('storage/images/'.$auth->avatar) }}" alt="">
                    </div>
                    <div class="register-content">
                        <h5>ニックネーム</h5>
                        <p>{{ $auth->nickname }}</p>
                    </div>
                    <div class="register-content">
                        <h5>これまでの投稿件数</h5>
                        <p>{{ $channel_count }}件</p>
                    </div>
                    <div class="edit-button">
                        <a href="{{ route('user.index') }}"><button type="button" class="btn btn-outline-primary">マイページ</button></a>
                    </div>
                    @else
                    <div class="edit-button">
                        <a href="{{ route('login') }}"><button type="button" class="btn btn-outline-primary non-login">ログインする</button></a>
                    </div>                    
                    @if (Route::has('register'))
                    <div class="edit-button">
                        <a href="{{ route('register') }}"><button type="button" class="btn btn-outline-primary non-login">新規登録する</button></a>
                    </div>                    
                    @endif
                    @endauth
                    @endif    
                </div>   
                <p class="channel-info">チャンネル名をクリックすると<br>チャンネル画面に移動できます！</p>
            </div>

            <!-- チャンネル一覧部分 -->
            <div class="channel-content">
            @foreach ($channels as $channel)
                <div class="content">
                    <div class="update-time">
                        <p>更新日時:<span>{{ \App\Helpers\helper::convert_to_fuzzy_time($channel->updated_at) }}</span></p>
                    </div>
                    <div class="edit-user">
                        <div class="edit-user-status">
                            <div class="edit-user-image">
                                <img src="{{asset('storage/images/'.$channel->user->avatar)}}" class="d-block rounded-circle mb-3">                   
                            </div>
                             <div class="edit-user-nickname">
                                <p>{{ $channel->user->nickname }}</p>
                            </div>
                        </div>
                        <div class="balloon1-left">
                            <p>{{ $channel->comment }}</p>
                        </div>
                    </div>
                    <div class="bg-red oblique-gloss solid-shadow channel" onClick="location.href='https://www.youtube.com/channel/{{ $channel->url }}'">
                        <div class="channel-image">
                            @if ($channel->gender === '男性')
                            <img src="img/man.png" alt="">
                            @elseif ($channel->gender === '女性')
                            <img src="img/woman.png" alt="">
                            @elseif ($channel->gender === '複数人')
                            <img src="img/many.png" alt="">
                            @else ($channel->gender === 'その他')
                            <img src="img/other.png" alt="">
                            @endif
                        </div>
                        <div class="channel-status">
                            <h4>{{ $channel->name }}</h4>
                            <div class="categories">
                                <p class="genre-category"><span>ジャンル: </span>{{ $channel->genre }}</p>
                                <p class="streaming-method-category"><span>主な投稿動画: </span>{{ $channel->streaming_method }}</p>
                                <p class="gender-category"><span>性別: </span>{{ $channel->gender }}</p>
                                <p class="voice-category"><span>声質: </span>{{ $channel->voice }}</p>
                                <p class="distributor-category"><span>配信者情報: </span>{{ $channel->distributor }}</p>
                            </div>
                        </div>
                    </div>
                </div>  
                @endforeach
            </div>
        </div>
    </div>
</main>
<!-- Scripts -->
<script src="{{ asset('js/channel.js') }}"></script>
@endsection