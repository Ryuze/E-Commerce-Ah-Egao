@extends('layouts.index')

@section('title')
    <title>Ah-Egao | Login</title>
@endsection

@section('body')
    <div class="container-fluid content" style="background-color: #e9e9e9; margin-top: -20px;">
        <!-- product -->
        <div class="container">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="container form-item">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    <div>
                        <p>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </p>
                    </div>

                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    <div>
                        <p>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </p>
                    </div>

                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <p>
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </p>
                        </div>
                    </div>

                    <div>
                        <p>
                            <button type="submit" class="btn btn-danger form-control">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </p>
                    </div>                    
                </div>
            </form>
        </div>
    </div>
@endsection