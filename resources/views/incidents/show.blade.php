@extends('layouts.core.base')

@section('content')
<div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Location point Info</h4>
                        <table class="table no-wrap">
                            <tbody>
                            <tr>
                                <td class="text-gray">Location name</td>
                                <td> {{ $location->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Short Code</td>
                                <td> {{ $location->short_code }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Location Type</td>
                                <td> {{ $location->location_type_id }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Status</td>
                                <td>
                                    @if($location->status == 0 )
                                        <span class="badge badge-info">Active</span>
                                    @else
                                        <span class="badge badge-danger">InActive</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-gray">Latitide</td>
                                <td> {{ $location->latitude }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Longitude</td>
                                <td> {{ $location->longitude }}</td>
                            </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Configuration Info</h4>
                        <table class="table no-wrap">
                            <tbody>
                            <tr>
                                <td class="text-gray">Address</td>
                                <td>{{ $location->address }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Created At</td>
                                <td>{{ $location->created_at }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Updated At</td>
                                <td>{{ $location->updated_at }}</td>
                            </tr>
                            </tbody>
                        </table>
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="{{ route('locations.index') }}"
                            class="btn btn-block btn-light btn-lg font-weight-medium auth-form-btn">
                                {{ __('CANCEL') }}
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <a href="{{ route('locations.edit', $location->id) }}"
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