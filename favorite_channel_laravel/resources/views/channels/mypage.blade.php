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
                        <img src="{{ asset('storage/images/'.$auth->avatar) }}" alt="">
                    </div>
                    <div class="register-content">
                        <h5>お名前</h5>
                        <p>{{ $auth->name }}</p>
                    </div>
                    <div class="register-content">
                        <h5>ニックネーム</h5>
                        <p>{{ $auth->nickname }}</p>
                    </div>
                    <div class="register-content">
                        <h5>メールアドレス</h5>
                        <p>{{ $auth->email }}</p>
                    </div>
                    <div class="edit-button">
                        <a href="{{ route('user.edit') }}"><button type="button" class="btn btn-outline-primary">編集</button></a>
                    </div>
                </div>
            </div>
            
            <div class="channel-infomations">
                <div class="channel-content">
                @foreach ($channels as $channel)
                    <div class="content">
                        <div class="update-time">
                            <p>更新日時:<span>{{ \App\Helpers\helper::convert_to_fuzzy_time($channel->updated_at) }}</span></p>
                        </div>
                        <p class="user-comment">あなたのコメント</p>
                        <div class="edit-user">
                            <div class="comment">
                                <p>{{ $channel->comment }}</p>
                            </div>
                        </div>
                        <div class="bg-red oblique-gloss solid-shadow channel">
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
                                <a href="https://www.youtube.com/channel/{{ $channel->url }}">{{ $channel->name }}</a>
                                <div class="categories">
                                    <p class="genre-category"><span>ジャンル: </span>{{ $channel->genre }}</p>
                                    <p class="streaming-method-category"><span>主な投稿動画: </span>{{ $channel->streaming_method }}</p>
                                    <p class="gender-category"><span>性別: </span>{{ $channel->gender }}</p>
                                    <p class="voice-category"><span>声質: </span>{{ $channel->voice }}</p>
                                    <p class="distributor-category"><span>配信者情報: </span>{{ $channel->distributor }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="report">
                            <a href="{{ route('channel.edit', $channel->id) }}">
                                <button type="button" class="btn btn-outline-primary">編集する</button>
                            </a>
                        </div>
                    </div>  
                @endforeach  
                </div>
            </div>
        </div>
    </section>

</main>
@endsection