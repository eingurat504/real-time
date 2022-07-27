@extends('layouts.app')

@section('main-content')
<div class="content-wrapper d-flex align-items-center auth px-0">
  <div class="row w-100 mx-0">
    <div class="col-lg-4 mx-auto">
      <div class="auth-form-light text-left py-5 px-4 px-sm-5">
        <div class="brand-logo">
          <img src="{{ asset('images/logo.svg') }}" alt="logo">
        </div>
        <h4>Hello! let's get started</h4>
        <h6 class="font-weight-light">Sign in to continue.</h6>
        <form class="pt-3" method="POST" action="{{ route('login') }}">
          <div class="form-group">
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Username">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="mt-3">
            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                {{ __('SIGN IN') }}
            </button>
          </div>
          <div class="my-2 d-flex justify-content-between align-items-center">
            <div class="form-check">
              <label class="form-check-label text-muted">
                <input type="checkbox" class="form-check-input">
                Keep me signed in
              </label>
            </div>
            @if (Route::has('password.request'))
                <a class="auth-link text-black" href="{{ route('password.request') }}">
                    {{ __('Forgot Password?') }}
                </a>
            @endif
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
