@extends('layouts.app')

@section('main-content')
<div class="content-wrapper d-flex align-items-center auth px-0">
  <div class="row w-100 mx-0">
    <div class="col-lg-4 mx-auto">
      <div class="auth-form-light text-left py-5 px-4 px-sm-5">
        <div class="brand-logo">
          Real time
        </div>
        <h4>Hello! let's get started</h4>
        <h6 class="font-weight-light">Send password reset link.</h6>
        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

        <form class="pt-3" method="POST" action="{{ route('password.email') }}">
            @csrf
          <div class="form-group">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="mt-3">
            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
            Send Password Reset Link
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
