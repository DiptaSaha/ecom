@extends('layouts.admin-login-templete')

@section('body')

<div class="tx-white-5 tx-center mg-b-60">{{ isset($url) ? ucwords($url) : "" }} Login</div>

                @isset($url)
                    <form method="POST" action="{{ url('login/customer') }}">                       
                @else
                    <form method="POST" action="{{ route('login') }}">
                @endisset
                  
                        @csrf
                        <div class="form-group"> 
                                <input type="email" class="form-control fc-outline-dark @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your username" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                        </div>
                        <div class="form-group">                         
                                <input type="password" class="form-control fc-outline-dark @error('password') is-invalid @enderror" name="password" placeholder="Enter your password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror         
                        </div>
                        {{-- <div class="form-group">                       
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                        </div> --}}

                        <div class="form-group">    
                            @if (Route::has('password.request'))
                             <a class="btn btn-link mg-r-10" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                           @endif                   
                                <button type="submit" class="btn btn-info btn-block">
                                    {{ __('Login') }}
                                </button>
                        </div>
                       
                        <div class="mg-t-20 tx-center">Not yet a member? <a href="{{ route('register') }}" class="tx-info">Sign Up</a></div>
                    </form>
@endsection
