@extends('layouts.core.base')

@section('content')
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
                            value="{{ old('name', $type->name) }}" placeholder="{{ __('name') }}"/>
                        @error('name')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea type="text" name="address" id="address" required
                            class="form-control @error('address') is-invalid @enderror" rows="4" placeholder="{{ __('Address') }}">{{ old('address', $type->address) }}
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
                                {{ __('+ UPDATE') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection