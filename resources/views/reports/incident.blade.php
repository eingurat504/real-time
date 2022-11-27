@extends('layouts.core.base')

@section('extra-css')
    <!-- <link rel="stylesheet" type="text/css" href="css/demo.css" /> -->
@endsection

@push('extra-js')
    <script src="{{ asset('pages/js/incident/report/report.js')}}"></script>
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
                    <li class="breadcrumb-item active">Incidents Report</li>
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
                        <a href="{{ route('locations.create') }}" class="btn btn-outline-inverse-info btn-icon-text">
                            Register
                            <i class="mdi mdi-plus btn-icon-append"></i>                          
                        </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-4">
        <form id="incident_report" method="POST" action="{{ route('incidents.report') }}">
            @csrf
            <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <div class="form-group col-lg-2 col-md-3 col-sm-4 col-xs-12">
                            <label>Date from:</label>
                            <input class="form-control form-control @error('latitude') is-invalid @enderror date date-time-picker"
                                    type="datetime" name="date_from" id="date_from"
                                    data-value="{{ old('date_from') }}"
                                    data-date-format="YYYY-MM-DD HH:ss:[00]" required/>
                            @if ($errors->has('date_from'))
                                <span class="help-block">
                                    {{ $errors->first('date_from') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group col-lg-2 col-md-3 col-sm-4 col-xs-12">
                            <label>Date to:</label>
                            <input class="form-control form-control @error('date_to') is-invalid @enderror date date-time-picker"
                                    type="datetime" name="date_to" id="date_to"
                                    data-value="{{ old('date_to') }}"
                                    data-date-format="YYYY-MM-DD HH:ss:[00]" required/>
                            @if ($errors->has('date_to'))
                                <span class="help-block">
                                    {{ $errors->first('date_to') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group col-lg-2 col-md-3 col-sm-4 col-xs-12">
                            <label>Latitude</label>
                            <input type="text" name="latitude" id="latitude" required
                                class="form-control @error('latitude') is-invalid @enderror"
                                value="{{ old('latitude') }}" placeholder="{{ __('Latitude') }}"/>
                            @error('latitude')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                     
                        <!-- <div class="row"> -->
                            <div class="form-group col-lg-2 col-md-3 col-sm-4 col-xs-12">
                               <label>&nbsp;</label>
                                <button type="submit"
                                        class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">
                                    {{ __('+ DOWNLOAD') }}
                                </button>
                            </div>
                        <!-- </div> -->
                        </div>
                    </div>
                </div>
        </form>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Incidents</h4>
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
                          
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection