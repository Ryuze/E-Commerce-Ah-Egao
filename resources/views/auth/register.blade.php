@extends('layouts.index')

@section('title')
    <title>Ah-Egao | Register</title>
@endsection

@section('body')
    <div class="container-fluid content" style="background-color: #e9e9e9; margin-top: -20px;">
        <!-- product -->
        <div class="container">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="container form-item">
                    <div>
                        <p>
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </p>
                    </div>

                    <div>
                        <p>
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </p>
                    </div>

                    <div>
                        <p>
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </p>
                    </div>

                    <div>
                        <p>
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </p>
                    </div>

                    <div>
                        <p>
                            <button type="submit" class="btn btn-danger form-control">
                                {{ __('Register') }}
                            </button>
                        </p>
                    </div>                   
                </div>
            </form>
        </div>
    </div>
@endsection