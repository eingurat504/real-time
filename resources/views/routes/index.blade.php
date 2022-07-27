@extends('layouts.core.base')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Routes</h4>
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
                @foreach($routes as $route) 
                <tr>
                    <td>{{ $route->name }}</td>
                    <td>{{ $route->short_code }}</td>
                    <td>{{ $route->origin_id }}</td>
                    <td>{{ $route->destination_id }}</td>
                    <td>{{ $route->created_at }}</td>
                    <td>{{ $route->updated_at }}</td>
                    <td class="text-center"> . </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection