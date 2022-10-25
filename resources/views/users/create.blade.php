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
                    <li class="breadcrumb-item active"><a href="#">Add</a></li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <form method="POST" action="{{ route('location_types.store') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Location Type Info</h4>
                                <div class="form-group">
                                    <label for="name">Name: </label>
                                    <input type="text" name="name" id="name" required
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" placeholder="{{ __('name') }}"/>
                                    @error('name')
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