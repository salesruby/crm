@extends('layouts.app')

@section('content')
@section('page-title-row')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Dashboard</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Dashboard</a></li>
                </ol>
            </div>
        </div>
    </div>
@endsection

<div class="row">
    <div class="col-sm-3 col-xl-3">
        <div class="card dashboard-card">
            <h6 class="dashboard-title">My Info</h6>
            <div><span class="mdi mdi-account"></span></div>
            <div class="form-group">
                <strong>{{$user->email}}</strong>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card dashboard-card">
            <h6 class="dashboard-title">Tasks</h6>
            <div><span class=" mdi mdi-calendar-clock"></span><span class="float-right">{{count($to_do)}}</span></div>
            <div class="form-group">
                <strong>To-do For Today</strong>
{{--                {{$generated_revenue}}--}}
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card dashboard-card">
            <h6 class="dashboard-title">Leads</h6>
            <div><span class="mdi  mdi-account-multiple"></span> <span class="float-right">{{$leads->count()}}</span></div>
            <div class="form-group">
                <strong>No of Leads</strong>
{{--                {{$total_expectation}}--}}
            </div>
        </div>
    </div>

    <div class="col-sm-3 col-xl-3">
        <div class="card dashboard-card">
            <h6 class="dashboard-title">Revenue</h6>
            <div><span class=" mdi  mdi-chart-line"></span><span class="float-right">#{{$generated_revenue}}</span></div>
            <div class="form-group">
                <strong>Generated Revenue</strong>
            </div>
        </div>
    </div>
</div>

{{--@if (session('status'))--}}
    {{--<div class="alert alert-success" role="alert">--}}
        {{--{{ session('status') }}--}}
    {{--</div>--}}
{{--@endif--}}

@endsection
