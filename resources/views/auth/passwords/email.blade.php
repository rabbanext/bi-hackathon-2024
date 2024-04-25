@extends('auth.layouts.main')

@section('form')
<div class="section-title mt-5">
    <h2>Reset Password</h2>
    <p>Reset Password</p>
</div>
<div class="section-content">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <h4 class="mb-2">Forgot Password? 🔒</h4>
    <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
    <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-floating mb-3">
            <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email"
                value="{{ old('email') }}" placeholder="Enter your email address" required autofocus>
            <label for="floatingEmail">Email</label>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary d-grid w-100">
            {{ __('Send Password Reset Link') }}
        </button>
    </form>
</div>
<div class="text-center mt-4">
    <a href="/login" class="d-flex align-items-center justify-content-center text-info">
        <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
        Back to login
    </a>
</div>
@endsection