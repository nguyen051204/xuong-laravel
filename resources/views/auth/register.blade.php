@extends('client.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header text-center bg-primary text-white">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group mb-4">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">
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
