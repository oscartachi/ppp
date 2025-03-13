@extends('layouts.app')

@section('content')
<div class="row justify-content-center w-100">
    <div class="col-lg-7 col-md-9 col-sm-12"> <!-- Más ancho en pantallas grandes -->
        <div class="card border-0 shadow-lg rounded-4" style="min-height: 600px;"> <!-- Aumenta la altura -->
            <div class="card-header text-white text-center fw-bold py-3" 
                 style="background: linear-gradient(135deg,rgb(11, 160, 71),rgb(11, 160, 71)); border-radius: 10px 10px 0 0;">
                {{ __('Login') }}
            </div>

            <div class="card-body p-6"> <!-- Más padding para hacerla más larga -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="form-label fw-semibold">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control rounded-3 border-light shadow-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control rounded-3 border-light shadow-sm @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <div class="form-check d-flex justify-content-center align-items-center">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label ms-2" for="remember" style="font-size: 1rem; color: #333;">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="d-grid mt-4">
                        <button type="submit" class="btn text-white fw-bold rounded-3" 
                                style="background: linear-gradient(135deg,rgb(8, 153, 102),rgb(8, 153, 102)); transition: 0.3s;">
                            {{ __('Login') }}
                        </button>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}" style="color: rgb(11, 160, 71); font-size: 1.1rem; text-decoration: none; margin-top: 10px; display: inline-block;">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection