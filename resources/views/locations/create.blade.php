@extends('layouts.core.base')

@section('content')
<form method="POST" action="{{ route('routes.store') }}">
    @csrf
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Location point Info</h4>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="route_name" id="route_name" required
                            class="form-control @error('route_name') is-invalid @enderror"
                            value="{{ old('route_name') }}" placeholder="{{ __('Route name') }}"/>
                        @error('route_name')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Short Code</label>
                        <input type="text" name="short_code" id="short_code" required
                            class="form-control @error('short_code') is-invalid @enderror"
                            value="{{ old('short_code') }}" placeholder="{{ __('Short Code') }}"/>
                        @error('short_code')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Location Type</label>
                        <input type="text" name="end_location" id="end_location" required
                            class="form-control @error('end_location') is-invalid @enderror"
                            value="{{ old('end_location') }}" placeholder="{{ __('End Location') }}"/>
                        @error('end_location')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Location Type</label>
                        <input type="text" name="end_location" id="end_location" required
                            class="form-control @error('end_location') is-invalid @enderror"
                            value="{{ old('end_location') }}" placeholder="{{ __('End Location') }}"/>
                        @error('end_location')
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
                            value="{{ old('latitude') }}" placeholder="{{ __('Latitude') }}"/>
                        @error('latitude')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" name="longitude" id="longitude" required
                            class="form-control @error('longitude') is-invalid @enderror"
                            value="{{ old('longitude') }}" placeholder="{{ __('Longitude') }}"/>
                        @error('longitude')
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
                            <a href="{{ route('routes.index') }}"
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
@endsection