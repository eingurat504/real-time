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
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                        <li class="breadcrumb-item active">{{ $user->name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User Info</h4>
                        <table class="table no-wrap">
                            <tbody>
                            <tr>
                                <td class="text-gray">Name</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Username</td>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Email</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Created At</td>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Updated At</td>
                                <td>{{ $user->updated_at }}</td>
                            </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Location Type Info</h4>
                        <table class="table no-wrap">
                            <tbody>
                            <tr>
                                <td class="text-gray">Name</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            </tbody>
                        </table>
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="{{ route('users.index') }}"
                            class="btn btn-block btn-light btn-lg font-weight-medium auth-form-btn">
                                {{ __('CANCEL') }}
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <a href="{{ route('users.edit', $user->id) }}"
                                    class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">
                                {{ __('+ EDIT') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection