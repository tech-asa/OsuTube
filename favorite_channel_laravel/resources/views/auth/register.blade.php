@push('css')
    <link href="{{ asset('css/login-register.css') }}" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('title', 'OsuTube | 新規登録画面')

@section('content')
<main>
    <div class="register-main-container">
        <div class="" id="login-container">
            <div class="contents">
                <div class="title">{{ __('新規登録画面') }}</div>
                    <div>
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">                            
                        @csrf
                            <div class="content">
                                <label for="name" class="col-form-label text-md-end">{{ __('お名前') }}</label><span>(必須)</span>
                                
                                <div>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    
                                    @error('お名前')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="content">
                            <div for="avatar" class="col-form-label text-md-right">{{ __('プロフィール画像') }}
                                <span>(必須)</span>
                                <p>(サイズは1024Kbyteまで)</p>
                            </div>
 
                            <div class="col-md-6">
                                <input id="avatar" type="file" name="avatar" class="@error('avatar') is-invalid @enderror">
                                @error('プロフィール画像')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            
                            <div class="content">
                                <label for="nickname" class="col-form-label text-md-end">{{ __('ニックネーム') }}</label><span>(必須 6文字以内)</span>
                                
                                <div>
                                    <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ old('nickname') }}" required autocomplete="nickname" placeholder="◯◯◯◯◯◯">
                                    
                                    @error('ニックネーム')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> 
                            
                            <div class="content">
                                <label for="email" class="col-form-label text-md-end">{{ __('メールアドレス') }}</label><span>(必須)</span>
                                
                                <div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="example@example">
                                    
                                    @error('メールアドレス')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="content">
                                <label for="password" class="col-form-label text-md-end">{{ __('パスワード') }}</label>
                                
                                <div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    
                                    @error('パスワード')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="content mb-4">
                                <label for="password-confirm" class="col-form-label text-md-end">{{ __('確認用パスワード') }}</label>
                                
                                <div>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>                            
                            <div class="login-end mb-4">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('登録') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
    @endsection
    