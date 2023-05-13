@extends('layouts.store.main_page')

@section('content')
    <div class="container">
        <div class="row g-0 mt-5 mb-5 height-100">
            <div class="col-md-6">
                <div class="bg-dark p-4 h-100 sidebar">
                    <ul class="chart-design">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-white h-100">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="p-3 d-flex justify-content-center flex-column align-items-center"> <span
                                class="main-heading">{{ __('Signin To Dokkan ElMansoura') }}</span>
                            <ul class="social-list mt-3">
                                <li>
                                    <a href="{{ route('redirect.google') }}" class="btn btn-danger">
                                        <i class="bi bi-google"></i>
                                    </a>
                                </li>
                            </ul>
                            <div class="form-data">
                                <label for="username">{{ __('Email Address or Phone Number') }}</label>
                                <input class="form-control w-100 @error('username') is-invalid @enderror " id="email"
                                    name="username" value="{{ old('username') }}" required autocomplete="email" autofocus>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-data">
                                <label for="password">{{ __('Password') }}</label>
                                <input class="form-control w-100 @error('password') is-invalid @enderror" id="password"
                                    type="password" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between w-100 align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="signin-btn w-100 mt-2">
                                <button class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
