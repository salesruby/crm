@extends('layouts.app')
@section('page-title-row')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h5>Product Details</h5>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('statuses.index') }}"> Back</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $status->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descriptions:</strong>
                {{ $status->description }}
            </div>
        </div>
    </div>
@endsection
