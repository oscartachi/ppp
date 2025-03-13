@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg" style="background: linear-gradient(145deg,rgba(3, 254, 3, 0),rgba(4, 239, 63, 0));">
                <div class="card-header text-center" style="background-color: #2C6B2F; color: white; font-size: 1.5rem; font-weight: bold; border-top-left-radius: 25px; border-top-right-radius: 25px; padding: 20px;">
                    {{ __('Login') }}
                </div>

                <div class="card-body text-center" style="background-color: #f9f9f9; padding: 40px; border-bottom-left-radius: 25px; border-bottom-right-radius: 25px;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-4">
                            <div class="col-12">
                                <label for="email" class="form-label" style="font-size: 1.1rem; color: #333;">
                                    {{ __('Email Address') }}
                                </label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="border-radius: 15px; border: 2px solid #ddd; padding: 12px; font-size: 1.1rem; transition: all 0.3s ease;">
                                @error('email')
                                    <span class="invalid-feedback" role="alert" style="color: #f44336; font-size: 1rem;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-12">
                                <label for="password" class="form-label" style="font-size: 1.1rem; color: #333;">
                                    {{ __('Password') }}
                                </label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="border-radius: 15px; border: 2px solid #ddd; padding: 12px; font-size: 1.1rem; transition: all 0.3s ease;">
                                @error('password')
                                    <span class="invalid-feedback" role="alert" style="color: #f44336; font-size: 1rem;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="form-check d-flex justify-content-center align-items-center">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label ms-2" for="remember" style="font-size: 1rem; color: #333;">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success" style="background-color: #4CAF50; border-color: #4CAF50; border-radius: 30px; font-size: 1.2rem; padding: 12px 25px; width: 100%; transition: background-color 0.3s ease;">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #4CAF50; font-size: 1.1rem; text-decoration: none; margin-top: 10px; display: inline-block;">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection