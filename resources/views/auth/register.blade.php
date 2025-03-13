@extends('layouts.app')

@section('content')
    <div class="row justify-content-center w-100">
        <div class="col-lg-7 col-md-9 col-sm-12"> <!-- Más ancho en pantallas grandes -->
            <div class="card border-0 shadow-lg rounded-4" style="min-height: 600px;"> <!-- Aumenta la altura -->
                <div class="card-header text-white text-center fw-bold py-3" 
                     style="background: linear-gradient(135deg,rgb(11, 160, 71),rgb(11, 160, 71)); border-radius: 10px 10px 0 0;">
                    {{ __('Register') }}
                </div>

                <div class="card-body p-6"> <!-- Más padding para hacerla más larga -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control rounded-3 border-light shadow-sm @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control rounded-3 border-light shadow-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control rounded-3 border-light shadow-sm @error('password') is-invalid @enderror" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="form-label fw-semibold">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control rounded-3 border-light shadow-sm" name="password_confirmation" required>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn text-white fw-bold rounded-3" 
                                    style="background: linear-gradient(135deg,rgb(8, 153, 102),rgb(8, 153, 102)); transition: 0.3s;">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
