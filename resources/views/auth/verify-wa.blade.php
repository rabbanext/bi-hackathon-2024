@extends('auth.layouts.main')

@section('form')
<div class="section-title mt-5">
    <h2>Register</h2>
    <p>Verification</p>
</div>
<div class="section-content">
    <h3 class="text-center">Verify Your WhatsApp Number</h3>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }} <strong>{{ Auth::user()->nowa }}</strong>
        </div>
    @endif
    <?php
        $phoneNumber = Auth::user()->nowa;
        if (substr($phoneNumber, 0, 1) === '0') {
            $phoneNumber = '0' . substr($phoneNumber, 1);
        } elseif (substr($phoneNumber, 0, 1) === '8') {
            $phoneNumber = '0' . $phoneNumber;
        }
    ?>
    <form action="{{ route('verify.submit') }}" method="post">
        @csrf
        <label for="otp">Enter OTP sent to {{ $phoneNumber }}:</label>
        <input type="text" id="nowa" name="nowa" value="{{ Auth::user()->nowa }}" hidden>

        <div class="form-floating mb-3">
            <input class="form-control @error('otp') is-invalid @enderror" id="otp" type="text" name="otp"
                required autofocus>
            <label for="otp">OTP</label>
        </div>

        <button type="submit" class="w-100 btn btn-primary mb-3">
            Verify
        </button>
    </form>

    <form action="{{ route('resend.otp') }}" method="post">
        @csrf
        <input type="hidden" name="nowa" value="{{ Auth::user()->nowa }}">
        <button type="submit" class="w-100 btn btn-primary mb-3">
            Resend OTP
        </button>
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
