@push('css')
    <link href="{{ asset('css/login-register.css') }}" rel="stylesheet">
@endpush

@extends('layouts.app')
 
@section('content')
<main>
    <div class="register-main-container">
        <div id="login-container">
            <div class="post-end">

                <p class="end-text">無事投稿が完了しました！</p>
                <div class="home-button">
                    <a href="/"><button class="btn btn-warning">ホーム画面に戻る</button></a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection