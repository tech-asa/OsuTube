@push('css')
    <link href="{{ asset('css/channel_edit.css') }}" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('title', 'OsuTube | チャンネル編集画面')

@section('content')
<main>
    <!-- 投稿モーダル -->
    <div class="search-modal up-modal" id="js-up-modal">
        <div class="modal-header">
            <h4 class="modal-title">POST</h4>
            <p class="modal-subtitle">あなたの推しを周りの人と共有しよう！</p>
        </div>

        <form class="categories" action="{{ route('channel.update',$channel->id) }}" method="POST">
            @csrf
            @if (Route::has('login'))
                @auth
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                @endauth
            @endif   
            
            <div class="category">
                <h5 class="channel-name">チャンネル更新</h5>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">更新したいチャンネル名<span>(必須)</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput1" name="name" placeholder="オススメの配信者チャンネルからコピーして貼り付けてください。" value="{{ $channel->name }}">
                @error('チャンネル名')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <p class="category-text">オススメの配信者チャンネルから「https://www.youtube.com/channel/」以降のURLをコピーして貼り付けてください。<span>(必須)</span></p>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">https://www.youtube.com/channel/</span>
                <input type="text" class="form-control @error('url') is-invalid @enderror" id="basic-url" aria-describedby="basic-addon3" name="url" value="{{ $channel->url }}">
                @error('URL')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <p class="category-text">下記に配信者の主な特徴を挙げてみよう！</p>
            <div class="category">
                <h5 class="category-title">ジャンル</h5><h6>現在：{{ $channel->genre }}</h6>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="up-Genre" name="genre" value="{{ $channel->genre }}">
                    <option value="指定無し">-- 指定無し --</option>
                    <option @if(old('genre') === 'エンタメ') selected @endif value="エンタメ">エンタメ</option>
                    <option @if(old('genre') === 'ビジネス') selected @endif value="ビジネス・学び">ビジネス・学び</option>
                    <option @if(old('genre') === 'バラエティ') selected @endif value="バラエティ">バラエティ</option>
                    <option @if(old('genre') === '商品紹介・レビュー') selected @endif value="商品紹介・レビュー">商品紹介・レビュー</option>
                    <option @if(old('genre') === 'ゲーム実況') selected @endif value="ゲーム実況">ゲーム実況</option>
                    <option @if(old('genre') === '料理・レシピ') selected @endif value="料理・レシピ">料理・レシピ</option>
                    <option @if(old('genre') === 'メイク・ファッション') selected @endif value="メイク・ファッション">メイク・ファッション</option>
                    <option @if(old('genre') === 'ハウツー・雑学') selected @endif value="ハウツー・雑学">ハウツー・雑学</option>
                    <option @if(old('genre') === '健康・フィットネス') selected @endif value="健康・フィットネス">健康・フィットネス</option>
                    <option @if(old('genre') === 'アウトドア') selected @endif value="アウトドア">アウトドア</option>
                    <option @if(old('genre') === '夫婦・カップル') selected @endif value="夫婦・カップル">夫婦・カップル</option>
                    <option @if(old('genre') === 'ペット・生き物') selected @endif value="ペット・生き物">ペット・生き物</option>
                    <option @if(old('genre') === '音楽') selected @endif value="音楽">音楽</option>
                    <option @if(old('genre') === 'ギャンブル・娯楽') selected @endif value="ギャンブル・娯楽">ギャンブル・娯楽</option>
                    <option @if(old('genre') === 'Vtuber') selected @endif value="Vtuber">Vtuber</option>
                    <option @if(old('genre') === '大食い') selected @endif value="大食い">大食い</option>
                    <option @if(old('genre') === 'ラジオ') selected @endif value="ラジオ">ラジオ</option>
                    <option @if(old('genre') === 'ブログ') selected @endif value="ブログ">ブログ</option>
                    <option @if(old('genre') === 'BGM') selected @endif value="BGM">BGM</option>
                    <option @if(old('genre') === 'その他') selected @endif value="その他">その他</option>
                </select>
            </div>
            <div class="category">
                <h5 class="category-title">主な投稿動画</h5><h6>現在：{{ $channel->streaming_method}}</h6>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="up-streaming-method" name="streaming_method">
                    <option value="指定無し">-- 指定無し --</option>
                    <option @if(old('streaming_method') === 'Live配信') selected @endif value="Live配信">Live配信</option>
                    <option @if(old('streaming_method') === '編集動画') selected @endif value="編集動画">編集動画</option>
                    <option @if(old('streaming_method') === 'ショート動画') selected @endif value="ショート動画">ショート動画</option>
                    <option @if(old('streaming_method') === 'その他') selected @endif value="その他">その他</option>
                </select>
            </div>
            <div class="category">
                <h5 class="category-title">性別</h5><h6>現在：{{ $channel->gender }}</h6>
                <select class="form-select form-select-sm"  aria-label=".form-select-sm example" id="up-gender" name="gender">
                    <option value="指定無し">-- 指定無し --</option>
                    <option @if(old('gender') === '男性') selected @endif value="男性">男性</option>
                    <option @if(old('gender') === '女性') selected @endif value="女性">女性</option>
                    <option @if(old('gender') === '複数人') selected @endif value="複数人">複数人</option>
                    <option @if(old('gender') === 'その他') selected @endif value="その他">その他</option>
                </select>
            </div>
            <div class="category">
                <h5 class="category-title">声質</h5><h6>現在：{{ $channel->voice }}</h6>
                <select class="form-select form-select-sm"  aria-label=".form-select-sm example" id="up-voice" name="voice">
                    <option value="指定無し">-- 指定無し --</option>
                    <option @if(old('voice') === '高め') selected @endif value="高め">高め</option>
                    <option @if(old('voice') === '普通') selected @endif value="普通">普通</option>
                    <option @if(old('voice') === '低め') selected @endif value="低め">低め</option>
                    <option @if(old('voice') === '機械音声(指定無し)') selected @endif value="機械音声(指定無し)">機械音声(指定無し)</option>
                    <option @if(old('voice') === '機械音声(高め)') selected @endif value="機械音声(高め)">機械音声(高め)</option>
                    <option @if(old('voice') === '機械音声(普通)') selected @endif value="機械音声(普通)">機械音声(普通)</option>
                    <option @if(old('voice') === '機械音声(低め)') selected @endif value="機械音声(低め)">機械音声(低め)</option>
                    <option @if(old('voice') === 'その他') selected @endif value="その他">その他</option>
                </select>
            </div>
            <div class="category">
                <h5 class="category-title">配信者情報</h5><h6>現在：{{ $channel->distributor }}</h6>
                <select class="form-select form-select-sm"  aria-label=".form-select-sm example" id="up-distributor" name="distributor">
                    <option value="指定無し">-- 指定無し --</option>
                    <option @if(old('distributor') === '音声のみ') selected @endif value="音声のみ">音声のみ</option>
                    <option @if(old('distributor') === '本人顔出し') selected @endif value="本人顔出し">本人顔出し</option>
                    <option @if(old('distributor') === '2Dモデル') selected @endif value="2Dモデル">2Dモデル</option>
                    <option @if(old('distributor') === 'Vtuber') selected @endif value="Vtuber">Vtuber</option>
                    <option @if(old('distributor') === 'その他') selected @endif value="その他">その他</option>
                </select>
            </div>

            <div class="category">
                <h5 class="category-title">紹介コメント<span>(必須)100文字以内</span></h5><p>現在：{{ $channel->comment }}</p>
                <div class="mb-3">
                    <textarea class="form-control @error('comment') is-invalid @enderror" id="exampleFormControlTextarea1" name="comment" rows="5" value="{{ $channel->comment }}"></textarea>
                </div>
            </div>

            <div class="d-grid gap-2 col-6 mx-auto search-buttom">
                <button class="btn btn-outline-primary" type="submit">更新</button>
            </div>
        </form>
        <div class="d-grid gap-2 col-6 mx-auto back-buttom">
            <a href="{{ route('user.index') }}">
                <button type="submit" class="btn btn-outline-primary">
                    {{ __('マイページ戻る') }}
                </button>
            </a>
        </div>
    </div>
</main>
@endsection