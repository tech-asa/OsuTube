@push('css')
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@endpush

@extends('layouts.app')

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

    <!-- 投稿モーダル -->
    <div class="search-modal up-modal" id="js-up-modal">
        <div class="modal-header">
            <h4 class="modal-title">POST</h4>
            <p class="modal-subtitle">あなたの推しを周りの人と共有しよう！</p>
        </div>

        <form class="categories" action="{{ route('channel.store') }}" method="POST">
            @csrf
            @if (Route::has('login'))
                @auth
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                @endauth
            @endif   
            
            <div class="category">
                <h5 class="channel-name">チャンネル投稿</h5>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">投稿したいチャンネル名<span>(必須)</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput1" name="name" placeholder="オススメの配信者チャンネルからコピーして貼り付けてください。">
                @error('チャンネル名')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <p class="category-text">オススメの配信者チャンネルから「https://www.youtube.com/channel/」以降のURLをコピーして貼り付けてください。<span>(必須)</span></p>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">https://www.youtube.com/channel/</span>
                <input type="text" class="form-control @error('url') is-invalid @enderror" id="basic-url" aria-describedby="basic-addon3" name="url">
                @error('URL')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <p class="category-text">下記に配信者の主な特徴を挙げてみよう！</p>
            <div class="category">
                <h5 class="category-title">ジャンル</h5>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="up-Genre" name="genre">
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
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="up-streaming-method" name="streaming_method">
                    <option value="">-- 指定無し --</option>
                    <option value="Live配信">Live配信</option>
                    <option value="編集動画">編集動画</option>
                    <option value="ショート動画">ショート動画</option>
                    <option value="その他">その他</option>
                </select>
            </div>
            <div class="category">
                <h5 class="category-title">性別</h5>
                <select class="form-select form-select-sm"  aria-label=".form-select-sm example" id="up-gender" name="gender">
                    <option value="">-- 指定無し --</option>
                    <option value="男性">男性</option>
                    <option value="女性">女性</option>
                    <option value="複数人">複数人</option>
                    <option value="その他">その他</option>
                </select>
            </div>
            <div class="category">
                <h5 class="category-title">声質</h5>
                <select class="form-select form-select-sm"  aria-label=".form-select-sm example" id="up-voice" name="voice">
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
                <select class="form-select form-select-sm"  aria-label=".form-select-sm example" id="up-distributor" name="distributor">
                    <option value="">-- 指定無し --</option>
                    <option value="音声のみ">音声のみ</option>
                    <option value="本人顔出し">本人顔出し</option>
                    <option value="2Dモデル">2Dモデル</option>
                    <option value="Vtuber">Vtuber</option>
                    <option value="その他">その他</option>
                </select>
            </div>

            <div class="category">
                <h5 class="category-title">紹介コメント</h5>
                <div class="mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" rows="5" placeholder="例:最近新しく始めた配信者で、ツッコミネタが面白い方です！"></textarea>
                </div>
            </div>

            <div class="d-grid gap-2 col-6 mx-auto search-buttom">
                <button class="btn btn-outline-primary" type="submit">投稿</button>
            </div>
        </form>
    </div>

    <!-- サイト紹介モーダル -->
    <div class="introduction-modal" id="js-introduction-modal">
        <div class="introduction-text-box">
            <p class="introduction-text">当サイトは<br>あなたのオススメ配信者を
                <br>周りと簡単に共有でき、検索できる配信者応援サイトです。<br>あなたが応援したい配信者の方を投稿してみましょう！
            </p>
        </div>
    </div>

    <!-- 最初から見える部分 -->
    <div class="main-contents">
        <div class="main-image"></div>
        <div class="main-access">
            <div class="first-introduction">
                <p id="js-introduction">このサイトって？</p>
            </div>
            <div class="contacts">
                <div class="contact green">
                    <h5>マッチする配信者を探してみよう!</h5>
                    <img class="grass" src="img/grass.png" alt="">
                    <br>
                    <button type="button" class="btn btn-success" id="js-search">検索する</button>               
                </div>
                <div class="contact blue">
                    <h5>あなたのイチオシを紹介してみよう!</h5>
                    <img class="star" src="img/star.png" alt="">
                    <br>
                    @if (Route::has('login'))
                    @auth
                    <button type="button" class="btn btn-primary" id="js-up">投稿する</button>
                    @else
                    <button type="button" class="btn btn-primary">
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline login-edit-button">ログインする</a>
                    </button>
                    @if (Route::has('register'))
                    <button type="button" class="btn btn-primary">
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline login-edit-button">新規登録する</a>
                    </button>
                    @endif
                    @endauth
                    @endif       
                </div> 
            </div>      
        </div>
    </div>
    </main>
@endsection