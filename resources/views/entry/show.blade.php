@extends('layouts.core.base')

@section('content')
<div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Route Info</h4>
                        <table class="table no-wrap">
                            <tbody>
                            <tr>
                                <td class="text-gray">Route name</td>
                                <td> {{ $route->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Short Code</td>
                                <td> {{ $route->short_code }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Destination</td>
                                <td> {{ $route->destination_id }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Origin</td>
                                <td> {{ $route->origin_id }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Status</td>
                                <td>
                                    @if($route->status == 0 )
                                        <span class="badge badge-info">Active</span>
                                    @else
                                        <span class="badge badge-danger">InActive</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-gray">Distance(KM)</td>
                                <td>{{ $route->distance }}</td>
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
                                <td class="text-gray">Speed</td>
                                <td>{{ $route->speed }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Description</td>
                                <td>{{ $route->description }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Created At</td>
                                <td>{{ $route->created_at }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Updated At</td>
                                <td>{{ $route->updated_at }}</td>
                            </tr>
                            </tbody>
                        </table>
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
@endsection