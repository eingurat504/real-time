@extends('layouts.core.base')

@section('extra-css')
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
@endsection

@push('extra-js')
    <script src="{{asset('pages/js/zone/zone.js')}}" type="text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('app.map_key') }}" async defer></script>
    <script src="{{asset('pages/js/zone/map.js?1')}}"></script>
@endpush

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
                    <li class="breadcrumb-item active">Zones</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="d-flex align-items-center justify-content-md-end">
                <div class="pe-1 mb-3 mb-xl-0">
                        <button type="button" class="btn btn-outline-inverse-info btn-icon-text">
                            Print
                            <i class="mdi mdi-printer btn-icon-append"></i>                          
                        </button>
                </div>
                <div class="pe-1 mb-3 mb-xl-0">
                        <a href="{{ route('zones.create') }}" class="btn btn-outline-inverse-info btn-icon-text">
                            Register
                            <i class="mdi mdi-plus btn-icon-append"></i>                          
                        </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Short Code</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($zones as $zone) 
                                    <tr>
                                        <td>
                                            <a href="javascript:void(0)" onclick="show_map({{ $zone->id }})">{{ $zone->name }}</a>
                                        </td>
                                        <td>{{ $zone->location_points_id }}</td>
                                        <td>{{ $zone->created_at }}</td>
                                        <td>{{ $zone->updated_at }}</td>
                                        <td class="text-center"> 
                                            <a href="#" class="text-success btn btn-link px-1 dropdown-toggle dropdown-arrow-none" data-bs-toggle="dropdown" id="settingsDropdownsales">
                                            <i class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="settingsDropdownsales">
                                                <a class="dropdown-item">
                                                    <i class="mdi mdi-grease-pencil text-primary"></i>
                                                    Edit
                                                </a>
                                                <a class="dropdown-item">
                                                    <i class="mdi mdi-delete text-primary"></i>
                                                    Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div id="map" style="height:520px;width:100%;"></div>
        </div>
    </div>
</div>
@endsection