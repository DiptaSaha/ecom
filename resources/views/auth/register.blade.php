@extends('layouts.admin-login-templete')

@section('body')
<div class="tx-white-5 tx-center mg-b-60">{{ isset($url) ? ucwords($url) : "" }} Register</div>
                    @isset($url)
                        <form method="POST" action="{{ url('register/customer') }}">                       
                    @else
                        <form method="POST" action="{{ route('register') }}">
                    @endisset
                    
                            @csrf

                        <div class="form-group">
                            <label for="name" class="form-label fc-outline-dark">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control fc-outline-dark @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label fc-outline-dark">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control fc-outline-dark @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label fc-outline-dark">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control fc-outline-dark @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="form-label fc-outline-dark">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control fc-outline-dark" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-info btn-block">
                                    {{ __('Register') }}
                                </button>
                        </div>

                        <div class="mg-t-20 tx-center">Already Register? <a href="{{ route('login') }}" class="tx-info">Login Here</a></div>
                    </form>
@endsection
