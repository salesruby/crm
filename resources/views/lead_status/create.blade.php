@extends('layouts.app')

@section('content')

    <div class="page-title-box">
        <div class="row">
            <h5 class="col-sm-11 ">Move Lead to Next Stage</h5>
            <span class="pull-right">
                <a class="btn btn-primary" href="{{ route('leads.index') }}"> Back</a>
            </span>
        </div>
    </div>

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

    <form method="POST" action="{{route('lead_status.store')}}">
        @csrf

        <div class="row">

            <input type="hidden" name="lead_id" value="{{ $id }}">

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