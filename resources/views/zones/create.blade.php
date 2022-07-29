@extends('layouts.core.base')

@section('content')
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
@endsection