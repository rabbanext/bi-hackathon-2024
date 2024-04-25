@extends('auth.layouts.main')

@section('form')
<div class="section-title mt-5">
    <h2>Login</h2>
    <p>Login</p>
</div>
<div class="section-content">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-floating mb-3">
            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                value="{{ old('email') }}" placeholder="Enter your email address" required autofocus>
            <label for="floatingEmail">Email</label>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required autofocus>
            <label for="floatingPassword">Password</label>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                        ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                @if (Route::has('password.request'))
                <div class="form-group">

                </div>
                @endif
                <a href="{{ route('password.request') }}" class="text-info">
                    Forgot Password?
                </a>
            </div>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">
            {{ __('Log in') }}
        </button>
    </form>

</div>
<p class="text-center mt-4">
    Are you new? <a href="register" class="text-info">Create an account</a>
</p>
@endsection