@extends('layouts.app')

@section('content')

<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="backend/images/img-01.png" alt="IMG">
                </div>
                <!--  login -->
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title">
                        Login
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input id="email" class="input100 @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" name="email" placeholder="Email" required autocomplete="email" autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input id="password" class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required  autocomplete="current-password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input style="margin:0 -1.3rem;" class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            {{ __('Login') }}
                        </button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                    <div class="text-center p-t-136">
                        <a class="txt2" href="#">
                            @if (Route::has('register'))
                                <li class="nav-item" onclick="OnRegister()" style="display: flex;align-items: center;">
                                    <!-- <a style="margin-left: 5rem;" class="nav-link" href="{{ route('register') }}">{{ __('Create your Account') }}</a> -->
                                    <a style="margin-left: 5rem;" class="nav-link" href="{{ route('register') }}">{{ __('Create your Account') }}</a>
                                    <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                                </li>
                            @endif
                            
                        </a>
                    </div>
                </form>
                <!-- end login -->
                <!-- register -->
               <!--  <form class="login100-form-register validate-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <span class="login100-form-title">
                        Register
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input id="name" class="input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="name" autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input id="password" class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required  autocomplete="current-password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input id="password-confirm" class="input100" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            {{ __('Register') }}
                        </button>
                    </div>

                    <div class="text-center p-t-136" style="width: 300px;height: 100px;">
                        <a class="txt2" href="#">
                            @if (Route::has('register'))
                                <li class="nav-item" onclick="OnLogin()" style="display: flex;align-items: center; margin: -6.5rem 0rem !important;">
                                    <a style="margin-left: 10rem;" class="nav-link" href="#">{{ __('Login') }}</a>
                                    <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                                </li>
                            @endif
                            
                        </a>
                    </div>
        
                </form> -->
                <!-- end register -->
            </div>
        </div>
    </div>

@endsection
