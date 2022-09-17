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
                        <li class="breadcrumb-item active">Routes</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <form method="POST" action="{{ route('routes.update', $route->id) }}">
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
                                        value="{{ old('route_name', $route->route_name) }}" placeholder="{{ __('Route name') }}"/>
                                    @error('route_name')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Short Code</label>
                                    <input type="text" name="short_code" id="short_code" required
                                        class="form-control @error('short_code', $route->short_code) is-invalid @enderror"
                                        value="{{ old('short_code') }}" placeholder="{{ __('Short Code') }}"/>
                                    @error('short_code')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Starting Location</label>
                                    <select class="form-control form-control-lg @error('start_location') is-invalid @enderror" id="start_location" name="start_location">
                                    <option value="">Choose location</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->start_location }}"
                                                {{ old('start_location') == $location->start_location ? 'selected' : '' }}>{{ $location->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('start_location')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="end_location">End Location</label>
                                    <select class="form-control form-control-lg @error('end_location') is-invalid @enderror" id="end_location" name="end_location">
                                    <option value="">Choose location</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->end_location }}"
                                                {{ old('end_location') == $location->end_location ? 'selected' : '' }}>{{ $location->name }}
                                            </option>
                                        @endforeach
                                    </select>
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
                                    <input type="number" name="speed" id="speed" required
                                        class="form-control @error('speed') is-invalid @enderror"
                                        value="{{ old('speed', $route->speed) }}" placeholder="{{ __('speed') }}"/>
                                    @error('speed')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Distance</label>
                                    <input type="number" name="distance" id="distance" required
                                        class="form-control @error('distance') is-invalid @enderror"
                                        value="{{ old('distance', $route->distance) }}" placeholder="{{ __('distance') }}"/>
                                    @error('distance')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                    
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea type="text" name="description" id="description" required
                                        class="form-control @error('description') is-invalid @enderror" rows="4"
                                        value="{{ old('description') }}" placeholder="{{ __('Description') }}">{{ old('description', $route->description) }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <a href="{{ route('routes.index') }}"
                                        class="btn btn-block btn-light font-weight-medium auth-form-btn">
                                            {{ __('BACK') }}
                                        </a>
                                    </div>
                                    <div class="col-lg-6">
                                        <button type="submit"
                                                class="btn btn-block btn-success font-weight-medium auth-form-btn">
                                            {{ __('UPDATE') }}
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