@extends('layouts.core.base')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../index.html">UI Operations</a></li>
    <li class="breadcrumb-item active">Projects</li>
</ol>
<form method="POST" action="{{ route('routes.store') }}">
    @csrf
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Route Info</h4>

                    <div class="form-group">
                        <label class="control-label col-lg-3 col-md-4 col-sm-6 col-xs-12">Name</label>
                        <label class="control-label col-lg-6 col-md-4 col-sm-6 col-xs-12">
                            {{ $route->name }}
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3 col-md-4 col-sm-6 col-xs-12">Code</label>
                        <label class="control-label col-lg-6 col-md-4 col-sm-6 col-xs-12">
                            {{ $route->short_code }}
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3 col-md-4 col-sm-6 col-xs-12">Start Location</label>
                        <label class="control-label col-lg-6 col-md-4 col-sm-6 col-xs-12">
                            {{ $route->name }}
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3 col-md-4 col-sm-6 col-xs-12">End Location</label>
                        <label class="control-label col-lg-6 col-md-4 col-sm-6 col-xs-12">
                            {{ $route->name }}
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3 col-md-4 col-sm-6 col-xs-12">Speed</label>
                        <label class="control-label col-lg-6 col-md-4 col-sm-6 col-xs-12">
                            {{ $route->speed }}
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3 col-md-4 col-sm-6 col-xs-12">Distance</label>
                        <label class="control-label col-lg-6 col-md-4 col-sm-6 col-xs-12">
                            {{ $route->distance }}
                        </label>
                    </div>
                   
                    <div class="form-group">
                        <label class="control-label col-lg-3 col-md-4 col-sm-6 col-xs-12">Name</label>
                        <label class="control-label col-lg-6 col-md-4 col-sm-6 col-xs-12">
                            {{ $route->name }}
                        </label>
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
                            value="{{ old('speed') }}" placeholder="{{ __('speed') }}"/>
                        @error('speed')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Distance</label>
                        <input type="number" name="distance" id="distance" required
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