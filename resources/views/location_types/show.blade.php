@extends('layouts.core.base')

@section('content')
<div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Location Type Info</h4>
                        <table class="table no-wrap">
                            <tbody>
                            <tr>
                                <td class="text-gray">Name</td>
                                <td>{{ $type->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Address</td>
                                <td>{{ $type->address }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Created At</td>
                                <td>{{ $type->created_at }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Updated At</td>
                                <td>{{ $type->updated_at }}</td>
                            </tr>
                            </tbody>
                        </table>
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="{{ route('location_types.index') }}"
                            class="btn btn-block btn-light btn-lg font-weight-medium auth-form-btn">
                                {{ __('CANCEL') }}
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <a href="{{ route('location_types.edit', $type->id) }}"
                                    class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">
                                {{ __('+ EDIT') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection