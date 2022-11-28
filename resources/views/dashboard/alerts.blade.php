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
                    <li class="breadcrumb-item active">Alerts Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Alerts</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Vehicle/Container</th>
                                <th>Device</th>
                                <th>Entry No</th>
                                <th>category</th>
                                <th>Event</th>
                                <th>Updated At</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                          
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection