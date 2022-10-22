@extends('layouts.core.base')

@section('extra-css')
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
@endsection

@push('extra-js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript" src="{{ asset('js/init.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('app.map_key') }}" async defer></script>
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
                    <li class="breadcrumb-item active">Google map Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="d-flex align-items-center">
                <div data-anim='flicker' class="pe-1 mb-3 mb-xl-0">
                        <button type="button" class="btn btn-outline-inverse-info btn-icon-text">
                            Route Upload
                            <i class="mdi mdi-printer btn-icon-append"></i>                          
                        </button>
                </div>
                <div data-anim='pulse' class="pe-1 mb-3 mb-xl-0">
                        <button type="button" class="btn btn-outline-inverse-info btn-icon-text">
                            Route Upload
                            <i class="mdi mdi-printer btn-icon-append"></i>                          
                        </button>
                </div>
                <div data-anim='wobble' class="pe-1 mb-3 mb-xl-0">
                        <button type="button" class="btn btn-outline-inverse-info btn-icon-text">
                            Route Upload
                            <i class="mdi mdi-printer btn-icon-append"></i>                          
                        </button>
                </div>
                <div class="pe-1 mb-4 mb-xl-0">
                        <button type="button" class="btn btn-outline-inverse-info btn-icon-text">
                            Route Upload
                            <i class="mdi mdi-printer btn-icon-append"></i>                          
                        </button>
                </div>
                <div class="pe-1 mb-4 mb-xl-0">
                        <button type="button" class="btn btn-outline-inverse-info btn-icon-text">
                            Route Upload
                            <i class="mdi mdi-printer btn-icon-append"></i>                          
                        </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-12 grid-margin stretch-card">
            <div id="map" style="width: 1900px; height:900px;"></div>
        </div>
    </div>
</div>
@endsection