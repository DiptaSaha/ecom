@extends('layouts.admin-login-templete')

@section('body')

                <div class="tx-white-5 tx-center mg-b-60">{{ __('Reset Password') }}</div>

              <div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="form-label fc-outline-dark">{{ __('Email Address') }}</label>

                            <div>
                                <input id="email" type="email" class="form-control fc-outline-dark @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                          
                        </div>
                    </form>
                </div>
          
@endsection
