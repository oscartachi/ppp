@extends('layouts.app')

@section('content')
<div class="row justify-content-center w-100">
    <div class="col-lg-6 col-md-8 col-sm-12"> <!-- Ajustado para mayor equilibrio en diferentes tamaños de pantalla -->
        <div class="card border-0 shadow-lg rounded-4" style="min-height: 450px;"> <!-- Reducida la altura mínima -->
            <div class="card-header text-white text-center fw-bold py-3" 
                 style="background: linear-gradient(135deg,rgb(11, 160, 71),rgb(11, 160, 71)); border-radius: 10px 10px 0 0;">
                <span style="font-size: 1.8rem;">{{ __('Login') }}</span> <!-- Texto más grande -->
            </div>

            <div class="card-body p-4"> <!-- Ajustado el padding para mejor proporción -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold" style="font-size: 1.2rem;">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control rounded-3 border-light shadow-sm @error('email') is-invalid @enderror" 
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="font-size: 1.2rem;">
                        @error('email')
                            <div class="invalid-feedback" style="font-size: 1.1rem;">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold" style="font-size: 1.2rem;">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control rounded-3 border-light shadow-sm @error('password') is-invalid @enderror" 
                               name="password" required autocomplete="current-password" style="font-size: 1.2rem;">
                        @error('password')
                            <div class="invalid-feedback" style="font-size: 1.1rem;">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-check d-flex justify-content-center align-items-center">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label ms-2" for="remember" style="font-size: 1.2rem; color: #333;">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="d-grid mt-3">
                        <button type="submit" class="btn text-white fw-bold rounded-3" 
                                style="background: linear-gradient(135deg,rgb(8, 153, 102),rgb(8, 153, 102)); transition: 0.3s; font-size: 1.5rem;">
                            {{ __('Login') }} <!-- Texto más grande en el botón -->
                        </button>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link d-block text-center mt-2" 
                           href="{{ route('password.request') }}" 
                           style="color: rgb(11, 160, 71); font-size: 1.2rem; text-decoration: none;">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

