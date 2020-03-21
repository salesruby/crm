@extends('layouts.app')

@section('content')


    <div class="page-title-box">
        <div class="row">
            <div class="col-sm-11">
                <h2>Lead Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('leads.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        @if($message = Session::get('success'))
            <div class="alert alert-success col-xs-12 col-sm-12 col-md-12">
                <p>{{$message}}</p>
            </div>
        @endif
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $lead->first_name }} {{ $lead->last_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $lead->designation }} at {{$lead->company_name}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <span class="badge badge-success">Opened</span>  <strong>{{$lead->created_at}}</strong>
            </div>
        </div>
    </div>


        @foreach($lead->products as $product)
            <div class="row lead-product">
                <h6 class="col-xs-6 col-sm-6 col-md-4">{{$product->name}}</h6>
                <div class="col-xs-6 col-sm-6 col-md-4">{{$product->description}} {{$product->id}}</div>
                <div class="col-xs-6 col-sm-6 col-md-4">
                    <a class="btn btn-warning" href="{{ route('chats.form', $lead->id)}}">Chat</a>
                    <a class="btn btn-info" href="{{ route('product_status.edit', array($lead->id, $product->id))}}">
                        Status
                    </a>
                </div>
            </div>
                    {{--<div class="table-responsive">--}}
                        {{--<table class="table table-bordered table-hover">--}}
                            {{--<thead>--}}
                            {{--<tr>--}}
                                {{--<th scope="col">S/N</th>--}}
                                {{--<th scope="col">Summary</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td>number</td>--}}
                                    {{--<td>summary</td>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}

        @endforeach
@endsection