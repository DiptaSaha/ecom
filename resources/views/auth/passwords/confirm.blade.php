@extends('layouts.admin-login-templete')

@section('body')
                   
                    <div class="tx-white-5 tx-center mg-b-60"> {{ __('Please confirm your password before continuing.') }}</div>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group">
                            <label for="password" class="form-label fc-outline-dark">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control fc-outline-dark @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-info btn-block">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                        </div>
                    </form>
@endsection
