@extends('layouts.app')

@section('content')

                <div class="tx-white-5 tx-center mg-b-60">{{ __('Reset Password') }}</div>

              
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label for="email" class="form-label fc-outline-dark">{{ __('Email Address') }}</label>

                            <div>
                                <input id="email" type="email" class="form-control fc-outline-dark @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label fc-outline-dark">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control fc-outline-dark @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="form-label fc-outline-dark">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control fc-outline-dark" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group">
                           
                                <button type="submit" class="btn btn-primary btn-block" >
                                    {{ __('Reset Password') }}
                                </button>
                            
                        </div>
                    </form>
              
@endsection
