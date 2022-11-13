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
                        <li class="breadcrumb-item active">Update</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">User Info</h4>
                                <div class="form-group">
                                    <label for="first_name">First Name: </label>
                                    <input type="text" name="first_name" id="first_name" required
                                        class="form-control @error('first_name') is-invalid @enderror"
                                        value="{{ old('first_name', $user->first_name) }}" placeholder="{{ __('First name') }}"/>
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name: </label>
                                    <input type="text" name="last_name" id="last_name" required
                                        class="form-control @error('last_name') is-invalid @enderror"
                                        value="{{ old('last_name', $user->last_name) }}" placeholder="{{ __('Last name') }}"/>
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="username">Username: </label>
                                    <input type="text" name="username" id="username" required
                                        class="form-control @error('username') is-invalid @enderror"
                                        value="{{ old('username', $user->username) }}" placeholder="{{ __('Username') }}"/>
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Email: </label>
                                    <input type="text" name="email" id="email" required
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email', $user->email) }}" placeholder="{{ __('email') }}"/>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">User Info</h4>
                                <div class="form-group">
                                    <label for="phone_number">Phone number: </label>
                                    <input type="text" name="phone_number" id="name" required
                                        class="form-control @error('phone_number') is-invalid @enderror"
                                        value="{{ old('phone_number', $user->phone_number) }}" placeholder="{{ __('phone_number') }}"/>
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select type="text" name="status" id="status" required
                                        class="form-control @error('status') is-invalid @enderror">
                                        <option value="0">Active</option>
                                        <option value="1">InActive</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea type="text" name="address" id="address" required
                                        class="form-control @error('address') is-invalid @enderror" rows="4" placeholder="{{ __('Address') }}">{{ old('address', $user->address) }}
                                    </textarea>
                                    @error('address')
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