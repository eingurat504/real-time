@extends('layouts.core.base')

@section('content')
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
                            value="{{ old('name') }}" placeholder="{{ __('Location Name') }}"/>
                        @error('name')
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
                        <input type="text" name="location_type" id="location_type" required
                            class="form-control @error('location_type') is-invalid @enderror"
                            value="{{ old('location_type') }}" placeholder="{{ __('Location Type') }}"/>
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
                            <a href="{{ route('locations.index') }}"
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