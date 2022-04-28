@push('css')
    <link href="{{ asset('css/login-register.css') }}" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('content')
<main>
    <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
        <div class="flash_message bg-success text-center py-3 my-0">
            {{ session('flash_message') }}
        </div>
    @endif
    <div class="register-main-container">
        <div class="" id="login-container">
            <div class="contents">
                <div class="title">{{ __('登録内容編集画面') }}</div>
                    <div>
                    <form method="POST" action="{{ route('user.update') }}">                    
                    @csrf
                            <div class="content">
                                <label for="name" class="col-form-label text-md-end">{{ __('お名前') }}</label>
                                
                                <div>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $auth->name }}" required autocomplete="name" autofocus>
                                    
                                    @error('お名前')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="content">
                            <div for="avatar" class="col-form-label text-md-right">{{ __('プロフィール画像') }}<p> (サイズは1024Kbyteまで）</p></div>
 
                            <div class="col-md-6">
                                <input id="avatar" type="file" name="avatar" class="@error('avatar') is-invalid @enderror" value="{{ $auth->avatar }}">
                                @error('プロフィール画像')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            
                            <div class="content">
                                <label for="nickname" class="col-form-label text-md-end">{{ __('ニックネーム') }}</label>
                                
                                <div>
                                    <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ $auth->nickname }}" required autocomplete="nickname" autofocus>
                                    
                                    @error('ニックネーム')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> 
                            
                            <div class="content">
                                <label for="email" class="col-form-label text-md-end">{{ __('メールアドレス') }}</label>
                                
                                <div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $auth->email }}" required autocomplete="email">
                                    
                                    @error('メールアドレス')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                                                        
                            <div class="login-end mb-4">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('更新') }}
                                </button>
                            </div>
                        </form>
                        <div class="login-end mb-4">
                            <a href="{{ route('user.index') }}">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('マイページ戻る') }}
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
    @endsection