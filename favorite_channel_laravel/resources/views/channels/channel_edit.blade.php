@push('css')
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('content')
<main>
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
    </div>
</main>
@endsection