<?php
// header('Location: http://hacakathon.fekdi.co.id/');
?>
@extends('auth.layouts.main')

@section('form')
<div class="section-title mt-5">
    <h2>Register</h2>
    <p>Register</p>
</div>
<div class="section-content">
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
                <input type="tel" class="form-control @error('nowa') is-invalid @enderror" id="floatingInputGroup1" name="nowa" placeholder="WhatsApp Number" value="{{ old('nowa') }}" inputmode="numeric" pattern="[0-9]*">
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

        <button type="submit" class="w-100 btn btn-lg btn-primary">
            {{ __('Register') }}
        </button>

    </form>

</div>
<p class="text-center mt-4">
    Already have an account? <a href="login" class="text-info">Log in</a>
</p>
@endsection