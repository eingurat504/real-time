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
                        <li class="breadcrumb-item"><a href="#">Operations</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('locations.index') }}">Location Points</a></li>
                        <li class="breadcrumb-item active"> <a href="{{ route('locations.show', $location->id) }}">{{ $location->name }}</a></li>
                        <li class="breadcrumb-item active">Update</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <form method="POST" action="{{ route('locations.store') }}">
            @csrf
            <div class="row">
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Location point Info</h4>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" required
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $location->name) }}" placeholder="{{ __('Location Name') }}"/>
                                @error('name')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Short Code</label>
                                <input type="text" name="short_code" id="short_code" required
                                    class="form-control @error('short_code') is-invalid @enderror"
                                    value="{{ old('short_code', $location->short_code) }}" placeholder="{{ __('Short Code') }}"/>
                                @error('short_code')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Location Type</label>
                                <select class="form-control form-control-lg @error('location_type') is-invalid @enderror" id="location_type" name="location_type">
                                <option value="">Choose location type</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}"
                                            {{ old('location_type',$location->location_type_id) == $type->id ? 'selected' : '' }}>{{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('location_type')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Configuration Info</h4>
                            <div class="form-group">
                                <label>Latitude</label>
                                <input type="text" name="latitude" id="latitude" required
                                    class="form-control @error('latitude') is-invalid @enderror"
                                    value="{{ old('latitude', $location->latitude) }}" placeholder="{{ __('Latitude') }}"/>
                                @error('latitude')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Longitude</label>
                                <input type="text" name="longitude" id="longitude" required
                                    class="form-control @error('longitude') is-invalid @enderror"
                                    value="{{ old('longitude', $location->longitude) }}" placeholder="{{ __('Longitude') }}"/>
                                @error('longitude')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea type="text" name="address" id="address" required
                                    class="form-control @error('address') is-invalid @enderror" rows="4" placeholder="{{ __('Address') }}">{{ old('address', $location->address) }}</textarea>
                                @error('address')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="{{ route('locations.index') }}"
                                    class="btn btn-block btn-light btn-lg font-weight-medium auth-form-btn">
                                        {{ __('BACK') }}
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
@endsection