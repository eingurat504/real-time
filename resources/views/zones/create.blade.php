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
                        <li class="breadcrumb-item"><a href="{{ route('zones.index') }}">Zones</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <form method="POST" action="{{ route('zones.store') }}">
            @csrf
            <div class="row">
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Zone Info</h4>
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
                                    <label>Locations</label>
                                    <select class="form-control form-control-lg @error('location_point_id') is-invalid @enderror" id="location_type" name="location_type">
                                    <option value="">Choose location</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}"
                                                {{ old('location_point_id') == $location->id ? 'selected' : '' }}>{{ $location->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('location_point_id')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            <div class="form-group">
                                <label>Import Zone: </label>
                                <input type="file" id="zone_xls" name="zone_xls" value="{{ old('zone_xls') }}"/>
                                @if ($errors->has('zone_xls'))
                                    <span class="help-block">
                                        {{ $errors->first('zone_xls') }}
                                    </span>
                                @endif
                                @error('description')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description: </label>
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
                                    <a href="{{ route('zones.index') }}"
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
@endsection