@push('css')
    <link href="{{ asset('css/post-list.css') }}" rel="stylesheet">
@endpush

@extends('layouts.app')
 
@section('content')
<main>
    <div class="contents">
        <div class="search-header">
            <h5 class="search-result-text">検索結果</h5>
            <p>以下の配信者の方が条件にヒットしました。</p>
            <a href=""><button type="button" class="btn btn-success">条件を変えてもう一度検索</button></a>
        </div>
        @foreach ($channels as $channel)
        <div class="content">
            <div class="update-time">
                <p>更新日時:<span>{{ $channel->updated_at }}</span></p>
            </div>
            <div class="edit-user">
                <div class="edit-user-status">
                    <img src="img/default_user_icon.png" alt="">
                    <div class="edit-user-nickname">
                        <p>ニックネーム</p>
                    </div>
                </div>
                <div class="balloon1-left">
                    <p>{{ $channel->comment }}</p>
                </div>
            </div>
            <div class="bg-red oblique-gloss solid-shadow channel">
                <div class="channel-image">
                    <img src="img/youtube_image.jpg" alt="">
                </div>
                <div class="channel-status">
                    <a href="">{{ $channel->name }}</a>
                    <div class="categories">
                        <p class="genre-category"><span>ジャンル:</span>エンタメ</p>
                        <p class="streaming-method-category"><span>主な投稿動画:</span>エンタメ</p>
                        <p class="gender-category"><span>性別:</span>エンタメ</p>
                        <p class="voice-category"><span>声質:</span>エンタメ</p>
                        <p class="distributor-category"><span>配信者情報:</span>エンタメ</p>
                    </div>
                </div>
            </div>
            <div class="report">
                <button type="button" class="btn btn-outline-danger">通報する</button>
            </div>
        </div>  
        @endforeach  
    </div>
</main>
@endsection