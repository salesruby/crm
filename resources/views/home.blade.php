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

{{--@if (session('status'))--}}
    {{--<div class="alert alert-success" role="alert">--}}
        {{--{{ session('status') }}--}}
    {{--</div>--}}
{{--@endif--}}

@endsection
