@push('css')
    <link href="{{ asset('css/login-register.css') }}" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('content')
<main>
    <div class="main-container">
        <div id="login-container">
            <div class="">
                <div class="contents">
                    <div class="title">{{ __('パスワードリセット') }}</div>
                    
                    <div class="content">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            
                            <div class="mb-4">
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
                            
                            <div class="mb-4">
                                <div class="reset-login-end">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('パスワードリセットを要求する') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
    @endsection
    