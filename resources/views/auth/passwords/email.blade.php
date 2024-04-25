@extends('auth.layouts.main')

@section('form')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<h4 class="mb-2">Forgot Password? 🔒</h4>
<p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
<form id="formAuthentication" class="mb-3" method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
            placeholder="Enter your email" value="{{ old('email') }}" required autofocus />
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

<div class="text-center">
    <a href="/login" class="d-flex align-items-center justify-content-center">
        <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
        Back to login
    </a>
</div>
@endsection