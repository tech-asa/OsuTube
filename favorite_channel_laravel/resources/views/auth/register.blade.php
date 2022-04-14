@push('css')
    <link href="{{ asset('css/login-register.css') }}" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('content')
<main>
    <div class="register-main-container">
        <div class="" id="login-container">
            <div class="contents">
                <div class="title">{{ __('新規登録画面') }}</div>
                    <div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="content">
                                <label for="name" class="col-form-label text-md-end">{{ __('お名前') }}</label>
                                
                                <div>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="content">
                                <label for="nickname" class="col-form-label text-md-end">{{ __('ニックネーム') }}</label>
                                
                                <div>
                                    <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ old('nickname') }}" required autocomplete="nickname" autofocus>
                                    
                                    @error('nickname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> 
                            
                            <div class="content">
                                <label for="email" class="col-form-label text-md-end">{{ __('メールアドレス') }}</label>
                                
                                <div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    
                                    @error('email')
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
                                    
                                    @error('password')
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
    