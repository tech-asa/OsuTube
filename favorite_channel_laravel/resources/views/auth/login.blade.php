@push('css')
    <link href="{{ asset('css/login-register.css') }}" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('content')
<main>
    <div class="main-container">
        <div id="login-container">
            <div class="contents">
                <div class="title">{{ __('ログイン') }}</div>  
                    <div class="">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf         
                            <div class="content">
                                <label for="email" class="col-form-label text-md-end">{{ __('メールアドレス') }}</label>
                                
                                <div class="">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="content">
                                <label for="password" class="col-form-label text-md-end">{{ __('パスワード') }}</label>
                                
                                <div class="">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3 content">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        
                                        <label class="form-check-label remember" for="remember">
                                            {{ __('パスワードを記憶') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="login-end mb-4">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('ログイン') }}
                                </button>
                                <!-- <br>
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('パスワードを忘れてしまった場合') }}
                                </a>
                                @endif -->
                            </div>
                        </form>
                        <div class="new-edit mb-4">
                            <p class="edit-text">アカウントをお持ちでない方は新規登録が必要になります。</p>
                            <a href="{{ route('register') }}"><button class="btn btn-warning">新規登録画面へ</button></a>
                            <p class="edit-text">新規登録はおよそ1分程度で完了できます。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
    @endsection
    