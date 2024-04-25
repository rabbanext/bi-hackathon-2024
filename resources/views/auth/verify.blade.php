@extends('auth.layouts.main')

@section('form')
<div class="section-title mt-5">
    <h2>Register</h2>
    <p>Verification</p>
</div>
@if (session('resent'))
<div class="alert alert-success" role="alert">
    {{ __('A fresh verification link has been sent to your email address.') }}
</div>
@endif
<div class="section-content">
    <h3 class="text-center">Verify Your Email Address</h3>

    <p class="text-center">
        {{ __('Before proceeding, please check your email for a verification link.') }}
    </p>

    <form class="text-center my-5" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="btn btn-primary">{{ __('click here to
            request another') }}</button>
    </form>
    <p class="text-center p-0">
        <a class="text-danger" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bx bx-power-off"></i>
            <span class="align-middle">{{ __('Logout') }}</span>
        </a>
    </p>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>
@endsection