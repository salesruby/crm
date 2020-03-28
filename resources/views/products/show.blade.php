@extends('layouts.app')
@section('page-title-row')
    <div class="page-title-box">
        <div class="row">
            <div class="col-md-11">
                <h5>Product Details</h5>
            </div>
            <span class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </span>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descriptions:</strong>
                {{ $product->description }}
            </div>
        </div>
    </div>
@endsection
