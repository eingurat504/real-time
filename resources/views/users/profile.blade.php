@extends('layouts.core.base')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-6 mb-4 mb-xl-0">
            <div class="d-lg-flex align-items-center">
                <div>
                    <button type="button" class="btn bg-white btn-icon ms-2">
                        <i class="mdi mdi-format-list-bulleted font-weight-bold text-primary"></i>
                    </button>
                </div>
                <div class="ms-lg-5">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.show', $user->id) }}">{{ $user->first_name }} {{ $user->last_name }}</a></li>
                        <li class="breadcrumb-item active">Update Profile</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <form method="POST" action="{{ route('users.profile') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">User Info</h4>
                                <div class="form-group">
                                    <label class="col-md-4">First Name: </label>
                                    <label class="col-md-4">{{ $user->first_name }} </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">Last Name: </label>
                                    <label class="col-md-4">{{ $user->last_name }} </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">Username: </label>
                                    <label class="col-md-4">{{ $user->username }} </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">Email: </label>
                                    <label class="col-md-4">{{ $user->email }} </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">Phone number: </label>
                                    <label class="col-md-4">{{ $user->phone_number }} </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">Status: </label>
                                    <label class="col-md-4">{{ $user->status }} </label>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-4">Address: </label>
                                    <label class="col-md-4">{{ $user->address }} </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">User Info</h4>
                                <div class="form-group">
                                    <label for="current_password">Current Password: </label>
                                    <input type="text" name="current_password" id="name" required
                                        class="form-control @error('current_password') is-invalid @enderror"
                                        value="{{ old('current_password', $user->current_password) }}" placeholder="{{ __('current_password') }}"/>
                                    @error('current_password')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>new_password</label>
                                    <input type="text" name="new_password" id="new_password" required
                                        class="form-control @error('new_password') is-invalid @enderror" placeholder="{{ __('new_password') }}" />
                                    @error('new_password')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>confirm_password</label>
                                    <input type="text" name="confirm_password" id="confirm_password" required
                                        class="form-control @error('confirm_password') is-invalid @enderror" placeholder="{{ __('confirm_password') }}" />
                                    @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <a href="{{ route('users.index') }}"
                                        class="btn btn-block btn-light btn-lg font-weight-medium auth-form-btn">
                                            {{ __('CANCEL') }}
                                        </a>
                                    </div>
                                    <div class="col-lg-6">
                                        <button type="submit"
                                                class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">
                                            {{ __('+ UPDATE') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection