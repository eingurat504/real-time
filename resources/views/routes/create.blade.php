@extends('layouts.core.base')

@section('content')
<form method="POST" action="{{ route('routes.store') }}">
    @csrf
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Route Info</h4>
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
                        <label>Starting Location</label>
                        <input type="text" name="start_location" id="start_location" required
                            class="form-control @error('start_location') is-invalid @enderror"
                            value="{{ old('start_location') }}" placeholder="{{ __('Start Location') }}"/>
                        @error('start_location')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>End Location</label>
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
                        <label>Speed</label>
                        <input type="integer" name="speed" id="speed" required
                            class="form-control @error('speed') is-invalid @enderror"
                            value="{{ old('speed') }}" placeholder="{{ __('speed') }}"/>
                        @error('speed')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Distance</label>
                        <input type="integer" name="distance" id="distance" required
                            class="form-control @error('distance') is-invalid @enderror"
                            value="{{ old('distance') }}" placeholder="{{ __('distance') }}"/>
                        @error('distance')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                        
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" name="description" id="description" required
                            class="form-control @error('description') is-invalid @enderror" rows="4"
                            value="{{ old('description') }}" placeholder="{{ __('Description') }}">
                        </textarea>
                        @error('description')
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