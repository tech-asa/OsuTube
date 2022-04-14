@push('css')
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('content')
<main>
    <div id="js-modal-background"></div>
    <div class="search-modal" id="js-search-modal">
        <div class="modal-header">
            <h4 class="modal-title">SEARCH</h4>
            <p class="modal-subtitle">気になりそうな配信者を探してみよう！</p>
        </div>
        <form class="categories" action="" method="get">
            <div class="category">
                <h5 class="category-title">ジャンル</h5>
                <select class="form-select form-select-sm"  aria-label=".form-select-sm example" id="Genre">
                    <option value="0">-- 選択してください --</option>
                    <option value="1">エンタメ</option>
                    <option value="2">ビジネス・学び</option>
                </select>
            </div>
            <div class="category">
                <h5 class="category-title">主な投稿動画</h5>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="streaming-method">
                    <option value="0">-- 指定無し --</option>
                    <option value="1">Live配信</option>
                    <option value="2">編集動画</option>
                    <option value="3">ショート動画</option>
                    <option value="4">その他</option>
                </select>
            </div>
            <div class="category">
                <h5 class="category-title">性別</h5>
                <select class="form-select form-select-sm"  aria-label=".form-select-sm example" id="gender">
                    <option value="0">-- 指定無し --</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">複数人</option>
                    <option value="4">その他</option>
                </select>
            </div>
            <div class="category">
                <h5 class="category-title">声質</h5>
                <select class="form-select form-select-sm"  aria-label=".form-select-sm example" id="voice">
                    <option value="0">-- 指定無し --</option>
                    <option value="1">高め</option>
                    <option value="2">普通</option>
                    <option value="3">低め</option>
                    <option value="4">機械音声(指定無し)</option>
                    <option value="5">機械音声(高め)</option>
                    <option value="6">機械音声(普通)</option>
                    <option value="7">機械音声(低め)</option>
                    <option value="8">その他</option>
                </select>
            </div>
            <div class="category">
                <h5 class="category-title">配信者情報</h5>
                <select class="form-select form-select-sm"  aria-label=".form-select-sm example" id="distributor">
                    <option value="0">-- 指定無し --</option>
                    <option value="1">音声のみ</option>
                    <option value="2">本人顔出し</option>
                    <option value="3">2Dモデル</option>
                    <option value="4">Vtuber</option>
                    <option value="5">その他</option>
                </select>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto search-buttom">
                <button class="btn btn-outline-success" type="submit">検索</button>
            </div>
        </form>
    </div>
    <div class="search-modal up-modal" id="js-up-modal">
        <div class="modal-header">
            <h4 class="modal-title">POST</h4>
            <p class="modal-subtitle">あなたの推しを周りの人と共有しよう！</p>
        </div>
        <form class="categories" action="" method="post">
            <div class="category">
                <h5 class="channel-name">チャンネル投稿</h5>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">投稿したいチャンネル名</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="オススメの配信者チャンネルからコピーして貼り付けてください。">
                </div>
            <p class="category-text">オススメの配信者チャンネルから「https://www.youtube.com/channel/」以降のURLをコピーして貼り付けてください。</p>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">https://www.youtube.com/channel/</span>
                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
            </div>
            <p class="category-text">下記に配信者の主な特徴を挙げてみよう！</p>

            <div class="category">
                <h5 class="category-title">ジャンル</h5>
                <select class="form-select form-select-sm"  aria-label=".form-select-sm example" id="up-Genre">
                    <option value="0">-- 選択してください --</option>
                    <option value="1">エンタメ</option>
                    <option value="2">ビジネス・学び</option>
                </select>
            </div>
            <div class="category">
                <h5 class="category-title">主な投稿動画</h5>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="up-streaming-method">
                    <option value="0">-- 指定無し --</option>
                    <option value="1">Live配信</option>
                    <option value="2">編集動画</option>
                    <option value="3">ショート動画</option>
                    <option value="4">その他</option>
                </select>
            </div>
            <div class="category">
                <h5 class="category-title">性別</h5>
                <select class="form-select form-select-sm"  aria-label=".form-select-sm example" id="up-gender">
                    <option value="0">-- 指定無し --</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">複数人</option>
                    <option value="4">その他</option>
                </select>
            </div>
            <div class="category">
                <h5 class="category-title">声質</h5>
                <select class="form-select form-select-sm"  aria-label=".form-select-sm example" id="up-voice">
                    <option value="0">-- 指定無し --</option>
                    <option value="1">高め</option>
                    <option value="2">普通</option>
                    <option value="3">低め</option>
                    <option value="4">機械音声(指定無し)</option>
                    <option value="5">機械音声(高め)</option>
                    <option value="6">機械音声(普通)</option>
                    <option value="7">機械音声(低め)</option>
                    <option value="8">その他</option>
                </select>
            </div>
            <div class="category">
                <h5 class="category-title">配信者情報</h5>
                <select class="form-select form-select-sm"  aria-label=".form-select-sm example" id="up-distributor">
                    <option value="0">-- 指定無し --</option>
                    <option value="1">音声のみ</option>
                    <option value="2">本人顔出し</option>
                    <option value="3">2Dモデル</option>
                    <option value="4">Vtuber</option>
                    <option value="5">その他</option>
                </select>
            </div>

            <div class="category">
                <h5 class="category-title">紹介コメント</h5>
                <div class="mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="例:最近新しく始めた配信者で、ツッコミネタが面白い方です！"></textarea>
                </div>
            </div>

            <div class="d-grid gap-2 col-6 mx-auto search-buttom">
                <button class="btn btn-outline-primary" type="submit">投稿</button>
            </div>
        </form>
    </div>
    <div class="search-modal induce-modal" id="js-induce-modal">
        <div class="modal-header">
            <h4 class="modal-title">投稿するにはログインが必要になります。</h4>
        </div>
        <!-- ログインフォーム -->
        <form>
            <div class="mt-3 mb-2">
                <label for="exampleInputEmail1" class="form-label">メールアドレス</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="◯◯◯◯◯@gmail.com" aria-describedby="emailHelp" value="">
                <div id="emailHelp" class="form-text">メールアドレスは他人に公開されません。</div>
            </div>
            <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">パスワード</label>
                <input type="password" class="form-control" id="exampleInputPassword1" value="">
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" class="btn btn-warning">ログイン</button>
            </div>
            <p class="edit-text">アカウントをお持ちでない方は新規登録が必要になります。</p>
            <div class="d-grid gap-2 col-6 mx-auto">
                <a href="{{ route('register') }}">
                    <button type="submit" class="btn btn-warning">新規登録画面へ</button>
                </a>
            </div> 
            <p class="edit-text">新規登録はおよそ1分程度で完了できます。</p>
        </form>
    </div>
    <div class="introduction-modal" id="js-introduction-modal">
        <div class="introduction-text-box">
            <p class="introduction-text">当サイトは<br>未来を紡ぐ、金の卵な配信者を
                <br>周りと簡単に共有でき、検索できる配信者応援サイトです。<br>あなたが応援したい配信者の方を投稿してみましょう！
            </p>
        </div>
    </div>

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