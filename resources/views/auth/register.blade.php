<?php
// header('Location: https://hackathon.fekdi.co.id/');
?>
@extends('auth.layouts.main')

@section('form')
<div class="section-title mt-5">
    <p>Register</p>
</div>
<div class="section-content">
    @php
        use Carbon\Carbon;
        $openDate = Carbon::parse("2026-06-05 15:00:00");
    @endphp

    @if (now()->greaterThanOrEqualTo($openDate))


    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-floating mb-3">
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                value="{{ old('name') }}" placeholder="name" autocomplete="name" required autofocus>
            <label for="floatingName">Name</label>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            @if ($errors->has('username'))
            <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>

        <div class="form-floating mb-3">
            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                value="{{ old('email') }}" placeholder="email" autocomplete="email" required autofocus>
            <label for="floatingEmail">Email</label>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">+62</span>
            <div class="form-floating flex-grow-1">
                <input 
                    type="tel" 
                    class="form-control @error('nowa') is-invalid @enderror" 
                    id="floatingInputGroup1" 
                    name="nowa" 
                    placeholder="WhatsApp Number" 
                    value="{{ old('nowa') }}" 
                    inputmode="numeric" 
                    pattern="8[0-9]{7,11}" 
                    oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/^0/, '')"
                >
                <label for="floatingInputGroup1">WhatsApp Number</label>
                @error('nowa')
                @if($message == 'The nowa has already been taken.')
                <div class="invalid-feedback" role="alert">
                    <strong>The WhatsApp Number has already been taken.</strong>
                </div>
                @else
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @enderror
            </div>
        </div>
        
        <div class="form-floating mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                placeholder="password" required autofocus>
            <label for="floatingPassword">Password</label>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="password_confirmation" placeholder="password"
                autocomplete="new-password" required autofocus>
            <label for="floatingPassword">{{ __('Confirm Password') }}</label>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
            <label class="form-check-label" for="terms">
                Saya setuju dengan <a href="/terms" target="_blank">syarat dan ketentuan</a>
            </label>
            @error('terms')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <button type="submit" class="w-100 btn btn-lg btn-primary">
            {{ __('Register') }}
        </button>

    </form>

    @else
    <div class="alert alert-warning mt-4 text-center">
        <strong>Pendaftaran sudah berakhir.</strong> Kami menghargai setiap partisipasi yang telah diberikan. Sampai jumpa di kesempatan berikutnya!
    </div>
    @endif
</div>
<p class="text-center mt-4">
    Already have an account? <a href="login" class="text-info">Log in</a>
</p>
@endsection