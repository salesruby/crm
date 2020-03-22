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
                <span class="badge badge-success">Opened</span> <strong>{{$lead->created_at}}</strong>
            </div>
        </div>
    </div>
    @foreach($lead->deals as $deal)
        <div class="lead-product">
            <div class="panel panel-default">
                <div class="row panel-heading">
                    <h5 class="panel-title col-md-9">
                        {{$deal->product->name}}

                        {{$deal->status->name}}

                    </h5>
                    <div class="pull-right col-md-3">
                        <a class="btn btn-info" data-toggle="collapse" data-target="#chat{{$deal->product->id}}" >Show</a>
                        <a class="btn btn-warning"
                           href="{{ route('chats.create', array($lead->id, $deal->product->id))}}">Chat</a>
                        <a class="btn btn-outline-success"
                           href="{{ route('product_status.edit', array($lead->id, $deal->product->id))}}">Status</a>
                    </div>
                </div>
                <div id="chat{{$deal->product->id}}" class="chat-summary-table panel-collapse collapse col-xs-10 col-md-10">
                    <div class=" panel-body ">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">S/N</th>
                                    <th scope="col">Summary</th>
                                    <th scope="col">Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($deal->product->chats as $chat)
                                    <tr>
                                        <td>{{$chat->summary}}</td>
                                        <td>{{$chat->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection