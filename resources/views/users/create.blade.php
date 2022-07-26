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
                    <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">User Info</h4>
                                <div class="form-group">
                                    <label for="first_name">First Name: </label>
                                    <input type="text" name="first_name" id="first_name" required
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('first_name') }}" placeholder="{{ __('first_name') }}"/>
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name: </label>
                                    <input type="text" name="last_name" id="name" required
                                        class="form-control @error('last_name') is-invalid @enderror"
                                        value="{{ old('last_name') }}" placeholder="{{ __('last_name') }}"/>
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="username">Username: </label>
                                    <input type="text" name="username" id="name" required
                                        class="form-control @error('username') is-invalid @enderror"
                                        value="{{ old('username') }}" placeholder="{{ __('username') }}"/>
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email: </label>
                                    <input type="text" name="email" id="name" required
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" placeholder="{{ __('email') }}"/>
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
                                        value="{{ old('phone_number') }}" placeholder="{{ __('phone_number') }}"/>
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
                                        class="form-control @error('address') is-invalid @enderror" rows="4"
                                        value="{{ old('address') }}" placeholder="{{ __('Address') }}">
                                    </textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <a href="{{ route('location_types.index') }}"
                                        class="btn btn-block btn-light btn-lg font-weight-medium auth-form-btn">
                                            {{ __('CANCEL') }}
                                        </a>
                                    </div>
                                    <div class="col-lg-6">
                                        <button type="submit"
                                                class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">
                                            {{ __('+ CREATE') }}
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