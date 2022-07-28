@extends('layouts.core.base')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../index.html">UI Operations</a></li>
    <li class="breadcrumb-item active">Location Points</li>
</ol>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
                <h4 class="card-title">Location Points</h4>
                <div class="pull-right">
                        <a href="{{ route('locations.create') }}" class="btn btn-secondary btn-rounded btn-fw">
                        <i class="mdi mdi-plus btn-icon-append"></i>
                            Add
</a>
                </div>
            </div>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Short Code</th>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($locations as $location) 
                    <tr>
                        <td><a href="{{ route('locations.show', $location->id) }}">{{ $location->name }}</a></td>
                        <td>{{ $location->short_code }}</td>
                        <td>{{ $location->origin_id }}</td>
                        <td>{{ $location->destination_id }}</td>
                        <td>{{ $location->created_at }}</td>
                        <td>{{ $location->updated_at }}</td>
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
@endsection