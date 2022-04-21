@push('css')
    <link href="{{ asset('css/mypage.css') }}" rel="stylesheet">
@endpush

@extends('layouts.app')
 
@section('content')
<main>
    <h3 class="mypage-title">マイページ</h3>
    <section>
        <div class="infomations">
            <div class="user-infomations">
                <div class="register-contents">
                    <h4 class="title">登録内容</h4>
                    <div class="user-image">
                        <img src="../img/default_user_icon.png" alt="">
                    </div>
                    <div class="register-content">
                        <h5>お名前</h5>
                        <p>ユーザー</p>
                    </div>
                    <div class="register-content">
                        <h5>ニックネーム</h5>
                        <p>ユーザー</p>
                    </div>
                    <div class="register-content">
                        <h5>メールアドレス</h5>
                        <p>ユーザー</p>
                    </div>
                    <div class="edit-button">
                        <button type="button" class="btn btn-outline-primary">編集</button>
                    </div>
                </div>
            </div>
            
            <div class="channel-infomations">
                <div class="channel-content">
                    <div class="content">
                        <div class="update-time">
                            <p>更新日時:<span></span></p>
                        </div>
                        <p class="user-comment">あなたのコメント</p>
                        <div class="edit-user">
                            <div class="comment">
                                <p>あああああああああああああああああああああああああああああああああああああああああああああああ</p>
                            </div>
                        </div>
                        <div class="bg-red oblique-gloss solid-shadow channel">
                            <div class="channel-image">
                                <img src="" alt="">
                            </div>
                            <div class="channel-status">
                                <a href="">チャンネル名</a>
                                <div class="categories">
                                    <p class="genre-category"><span>ジャンル:</span>ジャンル</p>
                                    <p class="streaming-method-category"><span>主な投稿動画:</span>配信</p>
                                    <p class="gender-category"><span>性別:</span>性別</p>
                                    <p class="voice-category"><span>声質:</span>声</p>
                                    <p class="distributor-category"><span>配信者情報:</span>配信者</p>
                                </div>
                            </div>
                        </div>
                        <div class="report">
                            <a href=""></a>
                            <button type="button" class="btn btn-outline-primary">編集する</button>
                        </div>
                    </div>  
                </div>
            </div>
                
        </div>
    </section>
</main>
@endsection