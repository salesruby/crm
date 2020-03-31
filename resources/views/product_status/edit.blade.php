@extends('layouts.app')

@section('page-title-row')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Lead Status</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="{{ route('leads.index') }}">Leads</a></li>
                    <li class="breadcrumb-item"><a href="{{route('leads.show', $lead_id)}}">Lead Deals</a>
                    </li>
                    <li class="breadcrumb-item active">Lead Status</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('product_status.store')}}">
        @csrf

        <div class="row">

            <input type="hidden" name="expectation" value="{{ $price}}">
            <input type="hidden" name="lead_id" value="{{ $lead_id}}">
            <input type="hidden" name="product_id" value="{{ $product_id}}">
            <input type="hidden" name="user_id" value="{{ $user_id}}">

             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="status_id">Status:</label>
                    <select name="status_id">
                        @foreach($statuses as $status)
                            <option value="{{$status->id}}">{{$status->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

@endsection