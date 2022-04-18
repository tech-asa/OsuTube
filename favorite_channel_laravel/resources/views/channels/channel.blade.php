@push('css')
    <link href="{{ asset('css/post-list.css') }}" rel="stylesheet">
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

    <div class="contents">
        <div class="search-header">
            <h5 class="search-result-text">検索結果</h5>
            <p>以下の配信者の方が条件にヒットしました。</p>
            <button id="js-search" type="button" class="btn btn-success">条件を変えてもう一度検索</button>
        </div>
        @foreach ($channels as $channel)
        <div class="content">
            <div class="update-time">
                <p>更新日時:<span>{{ \App\Helpers\helper::convert_to_fuzzy_time($channel->updated_at) }}</span></p>
            </div>
            <div class="edit-user">
                <div class="edit-user-status">
                    <img src="{{asset('storage/images/'.$channel->user->avatar)}}" class="d-block rounded-circle mb-3">                    <div class="edit-user-nickname">
                    <p>{{ $channel->user->nickname }}</p>
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
                    <a href="https://www.youtube.com/channel/{{ $channel->url }}">{{ $channel->name }}</a>
                    <div class="categories">
                        <p class="genre-category"><span>ジャンル:</span>{{ $channel->genre }}</p>
                        <p class="streaming-method-category"><span>主な投稿動画:</span>{{ $channel->streaming_method }}</p>
                        <p class="gender-category"><span>性別:</span>{{ $channel->gender }}</p>
                        <p class="voice-category"><span>声質:</span>{{ $channel->voice }}</p>
                        <p class="distributor-category"><span>配信者情報:</span>{{ $channel->distributor }}</p>
                    </div>
                </div>
            </div>
            <div class="report">
                <a href=""></a>
                <button type="button" class="btn btn-outline-danger">通報する</button>
            </div>
        </div>  
        @endforeach  
    </div>
</main>
    <!-- Scripts -->
    <script src="{{ asset('js/channel.js') }}"></script>
@endsection