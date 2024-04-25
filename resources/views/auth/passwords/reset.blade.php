@extends('auth.layouts.main')

@section('form')
<form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-floating mb-3">
        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
            value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
        <label for="floatingName">Email</label>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required
            autocomplete="password" autofocus>
        <label for="floatingName">password</label>

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password_confirmation"
            required autocomplete="password" autofocus>
        <label for="floatingName">password</label>

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <button type="submit" class="w-100 btn btn-lg btn-primary mb-3">
        {{ __('Reset Password') }}
    </button>

</form>

<div class="text-center">
    <a href="/login" class="d-flex align-items-center justify-content-center">
        <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
        Back to login
    </a>
</div>
@endsection