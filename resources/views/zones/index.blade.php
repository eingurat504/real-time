@extends('layouts.core.base')

@section('content')
<!-- <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">UI Operations</a></li>
    <li class="breadcrumb-item active">zone Points</li>
</ol>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
                <h4 class="card-title">Zones</h4>
                <div class="pull-right">
                        <a href="{{ route('zones.create') }}" class="btn btn-secondary btn-rounded btn-fw">
                        <i class="mdi mdi-plus btn-icon-append"></i>
                            Add</a>
                </div>
            </div>
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
                        <td><a href="{{ route('zones.show', $zone->id) }}">{{ $zone->name }}</a></td>
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
</div> -->
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
                                        <td><a href="{{ route('zones.show', $zone->id) }}">{{ $zone->name }}</a></td>
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
            <div class="card">
                <div class="card-body">
                    cddkdjd
                </div>
            </div>
        </div>
    </div>
</div>
@endsection